@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" data-turbolinks="false"
       href="{{ localize_url($localeCode, $attributes ?? [], $translatable ?? null) }}">
        {{ $properties['native'] }}
    </a>
@endforeach
