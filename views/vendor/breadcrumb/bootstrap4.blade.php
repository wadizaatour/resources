@if ($breadcrumbs)
    <ol class="custom-breadcrumb mb-0">
@foreach ($breadcrumbs as $breadcrumb)
@if ($breadcrumb->url && !$loop->last)
      <li class="custom-breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
@else
      <li>{{ $breadcrumb->title }}</li>
@endif
@endforeach
    </ol>
@endif
