@component('vendor.mail.html.layout')
    {{-- Header --}}
    @slot('header')
        @component('vendor.mail.html.header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @if (isset($subcopy))
        @slot('subcopy')
            @component('vendor.mail.html.subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endif

    {{-- Footer --}}
    @slot('footer')
        @component('vendor.mail.html.footer')
            &copy; {{ date('Y') }} {{ config('app.name') }}. @lang('mails.layout.all_rights_reserved')
        @endcomponent
    @endslot
@endcomponent
