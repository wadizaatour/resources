{{ Form::open(['route' => ['account.password.change'], 'class' => 'form-horizontal card', 'method' => 'PATCH']) }}
  <div class="card-body">
    <div class="form-group row">
      <label for="old_password" class="col-md-4 col-form-label">@lang('validation.attributes.old_password')</label>
      <div class="col-md-8">
        {{ Form::pPassword('old_password', ['required', 'placeholder' => __('validation.attributes.old_password')]) }}
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-md-4 col-form-label">@lang('validation.attributes.new_password')</label>
      <div class="col-md-8">
        {{ Form::pPassword('password', ['required', 'placeholder' => __('validation.attributes.new_password'), 'data-toggle' => 'password-strength-meter']) }}
      </div>
    </div>
    <div class="form-group row">
      <label for="password_confirmation" class="col-md-4 col-form-label">@lang('validation.attributes.password_confirmation')</label>
      <div class="col-md-8">
        {{ Form::pPassword('password_confirmation', ['required', 'placeholder' => __('validation.attributes.password_confirmation')]) }}
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-8 ml-auto">
        <button class="btn btn-primary blue-light-bg font-montserrat-regular">@lang('buttons.update')</button>
      </div>
    </div>
  </div>
{{ Form::close() }}
