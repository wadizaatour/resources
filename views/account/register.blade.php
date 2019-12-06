@extends('layouts.frontend')

@section('body_class', 'page-index')

@section('content')
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-12 col-lg-5 mx-auto col-xs-6">
            <p class="title font-montserrat col-md-12">@lang('labels.user.register')</p>
            <div class="card-body">
              <form method="post" action="{{ route('account.register.attempt', [], false) }}">
                <div class="form-group row">
                  <label for="type" class="col-md-12 col-form-label">@lang('validation.attributes.account_type') *</label>
                  <div class="col-md-12 form-group"> {{-- todo: more dynamic checked states, text-click selecting --}}
                    <select name="type" id="type" required="required"  class="form-control request-input ml-0 arrow-select-position light-gray-background font-montserrat-regular bord-rad-5 border-0">
                      <option disabled selected>@lang('forms.registration.select') </option>
                      <option  value="free">@lang('forms.registration.free_account')</option>
                      <option value="sell">@lang('forms.registration.seller_account')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-12 col-form-label">@lang('validation.attributes.email') *</label>
                  <div class="col-md-12">
                    <input id="email" required="required" name="email" type="email" class="form-control input" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-12 col-form-label">@lang('validation.attributes.password') *</label>
                  <div class="col-md-12">
                    <input id="password" required="required" name="password" type="password" value="" class="form-control input" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password_confirmation" class="col-md-12 col-form-label">@lang('validation.attributes.password_confirmation') *</label>
                  <div class="col-md-12">
                    <input id="password_confirmation" required="required" name="password_confirmation" type="password" value="" class="form-control input" />
                  </div>
                </div> {{-- todo (Gregwar captcha)
                <div class="form-group row">
                  <div class="col-md-9 ml-auto">
                     !! Form::captcha()
                  </div>
                </div> --}}
                @csrf
                <div class="form-group row">
                  <div class="col-md-12 ml-auto text-left">
                    <button class="btn btn-primary blueButton">
                      @lang('labels.user.register')
                    </button>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 ml-auto">
                    <label class="col-form-label">* @lang('labels.fields_required')</label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-12 col-lg-7 mx-auto col-xs-6 my-auto">
            <h3 class="title col-md-12 ml-4 font-montserrat pl-0">@lang('labels.user.benefits')</h3>
            <div class="gray-text-color font-montserrat-regular">
              <ol start="1" >
                <li class="li_numbers mt-1">@lang('labels.user.description_1')</li>
                <li class="li_numbers mt-1">@lang('labels.user.description_2')</li>
                <li class="li_numbers mt-1">@lang('labels.user.description_3')</li>
                <li class="li_numbers mt-1">@lang('labels.user.description_4')</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
@endsection

{{--
@push('scripts')
    {!! Captcha::script() !!}
@endpush
--}}
