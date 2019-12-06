@if(count($errors))
    <div class="alert alert-danger">
@foreach($errors as $error)
      {{ $error }}<br />
@endforeach
    </div>
@elseif(session()->has('alert.message'))
    <div class="alert alert-{{ session()->get('alert.style') }} alert-dismissible fade in show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{ session()->get('alert.message') }}
    </div>
@endif
