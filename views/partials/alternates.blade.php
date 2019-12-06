@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <link rel="alternate" href="{{ localize_url($localeCode, $attributes ?? [], $translatable ?? null) }}" hreflang="{{ $localeCode }}" />
@endforeach
