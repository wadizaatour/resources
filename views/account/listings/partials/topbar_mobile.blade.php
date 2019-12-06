<div class="d-lg-flex justify-content-lg-between">
<div class="d-flex flex-row bd-highlight d-flex justify-content-center">
  <div class="p-3 mt-2 mb-2 flex-column bd-highlight">
   <a
     href="{{ route('account.listings.'.($loggedInUser->listings->count() > 0 ? 'index' : 'create'), [], false) }}"
     title="@lang('labels.frontend.listings.addCarPart')">
     <img src="{{ asset('images/icons/part.svg') }}" id="parts-icon" class="centred" alt="parts"/>
   </a>

  </div>
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="{{ route('account.cars.index', [], false) }}"
       title="@lang('labels.frontend.listings.addCarPart')">
      <img src="{{ asset('images/icons/car.svg') }}" id="parts-icon" alt="cars"/>
    </a>
  </div>
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="{{ route('account.listings.requests.others', [], false) }}"
       title="@lang('labels.frontend.listings.other')">
      <img src="{{ asset('images/icons/list.svg') }}" id="parts-icon"
           alt="@lang('labels.frontend.listings.other')"/>
    </a>
  </div>
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="{{ route('account.listings.requests', [], false) }}"
       title="@lang('labels.frontend.listings.own')">
      <img src="{{ asset('images/icons/list-my.svg') }}" id="other-icon"
           alt="@lang('labels.frontend.listings.own')"/>
    </a>
  </div>
</div>
<div class="d-flex flex-row bd-highlight justify-content-center">
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="{{ route('account.settings', [], false) }}" title="@lang('labels.frontend.listings.settings')">
      <img src="{{ asset('images/icons/settings-icon.png') }}" id="setting-icon" alt="parts"/>
    </a>
  </div>
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="#" title="@lang('labels.frontend.listings.help')">
      <img src="{{ asset('images/icons/form.svg') }}" id="form-icon" alt="help"/>
    </a>
  </div>
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="#" title="teamviewer">
      <img src="{{ asset('images/icons/teamviewer-icon.png') }}" id="team-view" alt="teamviewer"/>
    </a>
  </div>
  <div class="p-3 mt-2 mb-2 bd-highlight">
    <a href="#" title="Other requests">
      <img src="{{ asset('images/icons/instructions-icon.png') }}" id="video-icon" alt="video"/>
    </a>
  </div>
</div>
</div>
