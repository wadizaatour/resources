<div class="container">

  @if($loggedInUser !== null && auth()->user()->type === 'sell' && $listing->pricing_model_id === 3 )

  <form method="post" action="{{ route('frontend.listing.contact', [$listing, $listing->slug], false) }}">
    <div class="gray-background w-100 bord-rad-5">
      <h2 class="purple-text-color font-montserrat p-4">@lang('forms.onboarding.contact')</h2>

      <div class="p-4">
       <ul>
         <li>
           <label for="price">Prijs *</label>
           <input type="text" name="price" id="price" value="" class="form-control p-3 white-bg border-0 bord-rad-5   pl-10-px" required="required" />
         </li>
         <li class="mt-3">
           <label for="message">@lang('forms.onboarding.message') *</label>
           <textarea name="message" id="message" class="form-control white-bg border-0 bord-rad-5{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="7" required="required">{{ $v['message'] }}</textarea>
         </li>
       </ul>

        <div class="form-check mt-2 mb-4">
          <input type="checkbox" name="send_copy" id="send_copy" {{ $v['send_copy'] === 'on' ? 'checked="checked" ' : ' ' }}class="form-check-input" />
          <label class="form-check-label ml-1" for="send_copy">@lang('forms.onboarding.copyConfirm')</label>
          <button type="submit" class="blue-light-bg btn white-text-color float-right mb-4 btn-large font-montserrat-regular btn-size">@lang('forms.request.send')</button>
        </div>
      </div>
    </div>
    @csrf
  </form>
@endif
</div><br />
