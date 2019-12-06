    <form method="post" action="{{ route('account.settings.update', [], false) }}" enctype="multipart/form-data" class="form-horizontal">
      <div class="card-body border">
        <div class="row">
  @if($loggedInUser->type === 'sell' && $loggedInUser->company()->first() !== null)
          <div class="col">
            <label>@lang('labels.frontend.request.upload_logo')</label>
            <image-avatar image-url="{{ $loggedInUser->company()->first()->thumbnail }}"></image-avatar>
          </div>
          <div class="col">
            <label for="public_introduction">@lang('labels.frontend.request.introduction')</label>
            <textarea class="form-control full-height bord-rad-5" id="public_introduction" name="public_introduction" rows="10" placeholder="public introduction">{{ $loggedInUser->company()->first()->public_introduction }}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label for="company" class="form-label">@lang('validation.attributes.company')</label>
              <input type="text" name="company" id="company" class="{{ $errors->has('company') ? 'form-control is-invalid ' : 'form-control ' }}input" disabled="disabled" value="{{ is_object($loggedInUser->company) ? $loggedInUser->company->name : '' }}" />
@if($errors->has('company'))
              <div class="invalid-feedback"><span>{{ $errors->first('company') }}</span></div>
@endif
            </div>
          </div>
@endif
          <div class="col-lg-4">
            <div class="form-group">
              <label for="first_name" class="form-label">@lang('validation.attributes.name')</label>
              <input type="text" name="first_name" value="{{ $loggedInUser->first_name }}" id="first_name" class="{{ $errors->has('first_name') ? 'form-control is-invalid ' : 'form-control ' }}input" required placeholder="{{ __('validation.attributes.name') }}" />
@if($errors->has('first_name'))
              <div class="invalid-feedback"><span>{{ $errors->first('first_name') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label for="last_name" class="form-label">@lang('validation.attributes.last_name')</label>
              <input type="text" name="last_name" value="{{ $loggedInUser->last_name }}" id="last_name" class="{{ $errors->has('last_name') ? 'form-control is-invalid ' : 'form-control ' }}input" required placeholder="{{ __('validation.attributes.last_name') }}" />
@if($errors->has('last_name'))
              <div class="invalid-feedback"><span>{{ $errors->last('last_name') }}</span></div>
@endif
            </div>
          </div>
@if($loggedInUser->type === 'free')
          <div class="col-lg-4">
            <div class="form-group">
              <label for="company_name" class="form-label">@lang('validation.attributes.company')</label>
              <input type="text" name="company_name" value="{{ $loggedInUser->company_name }}" id="company_name" class="{{ $errors->has('company_name') ? 'form-control is-invalid ' : 'form-control ' }}input" required placeholder="{{ __('validation.attributes.company') }}" />
@if($errors->has('company_name'))
                <div class="invalid-feedback"><span>{{ $errors->first('company_name') }}</span></div>
@endif
            </div>
          </div>
@endif
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="email">@lang('validation.attributes.email')</label>
              <input type="email" name="email" value="{{ $loggedInUser->email }}" id="email" class="{{ $errors->has('email') ? 'form-control is-invalid ' : 'form-control ' }}input" required placeholder="{{ __('validation.attributes.email') }}" />
@if($errors->has('email'))
              <div class="invalid-feedback"><span>{{ $errors->first('email') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="phone">@lang('validation.attributes.phone')</label>
              <input type="text" name="phone" value="{{ $loggedInUser->address()->first()->phone }}" id="phone" class="{{ $errors->has('phone') ? 'form-control is-invalid ' : 'form-control ' }}input" required placeholder="{{ __('validation.attributes.phone') }}" />
@if($errors->has('phone'))
              <div class="invalid-feedback"><span>{{ $errors->first('phone') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="mobile">@lang('validation.attributes.mobile')</label>
              <input type="text" name="mobile" value="{{ $loggedInUser->address()->first()->mobile }}" id="mobile" class="{{ $errors->has('mobile') ? 'form-control is-invalid ' : 'form-control ' }}input" placeholder="{{ __('validation.attributes.mobile') }}" />
@if($errors->has('mobile'))
              <div class="invalid-feedback"><span>{{ $errors->first('mobile') }}</span></div>
@endif
            </div>
          </div>
        </div>
@if($loggedInUser->type === 'sell')
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="coc_nr">@lang('validation.attributes.coc_nr')</label>
              <input type="text" name="coc_nr" value="{{ $loggedInUser->company->coc_nr }}" id="coc_nr" class="{{ $errors->has('coc_nr') ? 'form-control is-invalid ' : 'form-control ' }}input" required />
@if($errors->has('coc_nr'))
              <div class="invalid-feedback"><span>{{ $errors->first('coc_nr') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="vat_nr">@lang('validation.attributes.vat_nr')</label>
              <input type="text" name="vat_nr" value="{{ $loggedInUser->company->vat_nr }}" id="vat_nr" class="{{ $errors->has('vat_nr') ? 'form-control is-invalid ' : 'form-control ' }}input" required />
@if($errors->has('vat_nr'))
              <div class="invalid-feedback"><span>{{ $errors->first('vat_nr') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="website">@lang('validation.attributes.website')</label>
              <input type="text" name="website" value="{{ $loggedInUser->company->website }}" id="website" class="{{ $errors->has('website') ? 'form-control is-invalid ' : 'form-control ' }} input" required />
@if($errors->has('website'))
              <div class="invalid-feedback"><span>{{ $errors->first('website') }}</span></div>
@endif
            </div>
          </div>
        </div>
@endif
        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="form-group mb-0">
              <label class="form-label" for="street">@lang('forms.onboarding.street')</label>
              <input type="text" name="street" value="{{ $loggedInUser->address()->first()->street }}" id="street" class="{{ $errors->has('street') ? 'form-control is-invalid' : 'form-control' }} input" required />
@if($errors->has('street'))
              <div class="invalid-feedback"><span>{{ $errors->first('street') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="building_nr">@lang('forms.onboarding.building_nr')</label>
              <input type="text" name="building_nr" value="{{ $loggedInUser->address()->first()->building_nr }}" id="building_nr" class="{{ $errors->has('building_nr') ? 'form-control is-invalid' : 'form-control' }} input" required />
@if($errors->has('building_nr'))
              <div class="invalid-feedback"><span>{{ $errors->first('building_nr') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="postal">@lang('forms.onboarding.postal')</label>
              <input type="text" name="postal" value="{{ $loggedInUser->address()->first()->postal }}" id="postal" class="{{ $errors->has('postal') ? 'form-control is-invalid' : 'form-control' }} input" required />
@if($errors->has('postal'))
              <div class="invalid-feedback"><span>{{ $errors->first('postal') }}</span></div>
@endif
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-label" for="city">@lang('forms.onboarding.city')</label>
              <input type="text" name="city" value="{{ $loggedInUser->address()->first()->city }}" id="city" class="{{ $errors->has('city') ? 'form-control is-invalid' : 'form-control' }} input" required />
@if($errors->has('city'))
              <div class="invalid-feedback"><span>{{ $errors->first('city') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="form-group mb-0">
              <label class="form-label" for="state">@lang('forms.onboarding.province')</label>
              <select name="state" id="state" class="{{ $errors->has('state') ? 'form-control is-invalid' : 'form-control' }} mr-left-select input" required>
                <option value=""></option>
@foreach($states as $code => $state)
                <option value="{{ $code }}"{!! $code === $loggedInUser->address()->first()->state ? ' selected="selected"' : '' !!}>{{ $state }}</option>
@endforeach
              </select>
@if($errors->has('state'))
              <div class="invalid-feedback"><span>{{ $errors->first('state') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="form-group mb-0">
              <label class="form-label" for="country">@lang('validation.attributes.country')</label>
@if(count($countries) > 0)
              <select name="country" id="country" class="{{ $errors->has('country') ? 'form-control is-invalid' : 'form-control' }} mr-left-select input" required>
                <option value=""></option>
@foreach($countries as $cca3 => $country)
                <option value="{{ $cca3 }}"{{ $cca3 === $loggedInUser->address()->first()->country ? ' selected="selected"' : '' }}>{!! $country !!}</option>
@endforeach
              </select>
@endif
@if($errors->has('country'))
              <div class="invalid-feedback"><span>{{ $errors->first('country') }}</span></div>
@endif
            </div>
          </div>
        </div>
@if($loggedInUser->type === 'sell')
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label class="form-label" for="iban">@lang('forms.onboarding.iban')</label>
              <input type="text" name="iban" value="{{ $loggedInUser->company->iban }}" id="iban" class="{{ $errors->has('iban') ? 'form-control is-invalid' : 'form-control' }} input" required />
@if($errors->has('iban'))
              <div class="invalid-feedback"><span>{{ $errors->first('iban') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label class="form-label" for="bic">@lang('validation.attributes.bic')</label>
              <input type="text" name="bic" value="{{ $loggedInUser->company->bic }}" id="bic" class="{{ $errors->has('bic') ? 'form-control is-invalid' : 'form-control' }} input" required />
@if($errors->has('bic'))
              <div class="invalid-feedback"><span>{{ $errors->first('bic') }}</span></div>
@endif
            </div>
          </div>
        </div>
@endif

@if($loggedInUser->type === 'sell')
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label class="form-label" for="type">@lang('forms.onboarding.type')</label>
              <div class="form-group row mt-2 ml-1">
                <div class="form-check col form-check-inline align-middle">
                  <input type="checkbox" name="type[]" value="disassembly"{{ in_array('disassembly', json_decode($loggedInUser->company->type)) ? ' checked="checked"' : '' }} id="disassembly" class="form-check-input" />
                  <label for="disassembly" class="form-check-label dashboardFontSize">@lang('forms.onboarding.disassembly')</label>
                </div>
                <div class="form-check col form-check-inline align-middle">
                  <input type="checkbox" name="type[]" value="garage"{{ in_array('garage', json_decode($loggedInUser->company->type)) ? ' checked="checked"' : '' }}  id="garageCompany" class="form-check-input" />
                  <label for="garageCompany" class="form-check-label dashboardFontSize">@lang('forms.onboarding.garageCompany')</label>
                </div>
                <div class="form-check col form-check-inline align-middle">
                  <input type="checkbox" name="type[]" value="revision"{{ in_array('revision', json_decode($loggedInUser->company->type)) ? ' checked="checked"' : '' }}  id="revisionCompany" class="form-check-input" />
                  <label for="revisionCompany" class="form-check-label dashboardFontSize">@lang('forms.onboarding.revisionCompany')</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
{{--          {{     dd(explode(',', $loggedInUser->company->affiliated_with))}}--}}
              <label class="form-label" for="affiliated_with">@lang('forms.onboarding.affiliatedWith')</label>
              <multi-select :items="{{ json_encode(explode(',', $loggedInUser->company->affiliated_with)) }}"></multi-select>
            </div>
          </div>
        </div>
@endif
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-0">
              <label class="form-label" for="locale">@lang('validation.attributes.locale')</label>
              <select name="locale" id="locale" class="{{ $errors->has('locale') ? 'form-control is-invalid' : 'form-control' }} mr-left-select input" required>
@foreach ($locales as $code => $name)
                <option value="{{ $code }}"{!! $code === $loggedInUser->locale ? ' selected="selected"' : '' !!}>{{ $name }}</option>
@endforeach
              </select> {{-- might be nicer to use selectize.js, or alt (like chosen, select2) for select elements --}}
@if($errors->has('locale'))
              <div class="invalid-feedback"><span>{{ $errors->first('locale') }}</span></div>
@endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-0">
              <label class="form-label" for="timezone">@lang('validation.attributes.timezone')</label>
              <select name="timezone" id="timezone" class="{{ $errors->has('timezone') ? 'form-control is-invalid' : 'form-control' }} mr-left-select input" required>
@foreach (array_combine(array_values($timezones), $timezones) as $code => $name)
                <option value="{{ $code }}"{!! $code === $loggedInUser->timezone ? ' selected="selected"' : '' !!}>{{ $name }}</option>
@endforeach
              </select>
@if($errors->has('timezone'))
              <div class="invalid-feedback"><span>{{ $errors->first('timezone') }}</span></div>
@endif
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-left  white-bg">
        <button class="btn btn-primary blue-light-bg font-montserrat-regular">@lang('buttons.update')</button>
      </div>
      {{ method_field('PATCH') }}
      @csrf()
    </form>
