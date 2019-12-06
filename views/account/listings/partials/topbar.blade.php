<div>
  @if(auth()->user()->type === 'sell')
    <div class="d-flex flex-row mb-2">
      <div class="flex-between">
        <div class="top-bar-navigation">
          <ul class="mt-2">
            <li>
              <div>
                <a
                  href="{{ route('account.listings.'.($loggedInUser->listings->count() > 0 ? 'index' : 'create'), [], false) }}"
                  title="@lang('labels.frontend.listings.addCarPart')">
                  <img src="{{ asset('images/icons/part.svg') }}" id="parts-icon" alt="parts"/>
                </a>
              </div>
              <div class="text_position_first">
                <label class="font-montserrat gray-text-color font-size-label w-103 text-center">
                  @lang('labels.frontend.listings.addCarPart')
                </label>
              </div>
            </li>
            <li>
              <div>
                <a href="{{ route('account.cars.index', [], false) }}"
                   title="@lang('labels.frontend.listings.addCarPart')">
                  <img src="{{ asset('images/icons/car.svg') }}" id="parts-icon" alt="cars"/>
                </a>
              </div>
              <div>
                <label class="font-montserrat gray-text-color mt-2 font-size-label text-center">
                  @lang('labels.frontend.listings.addDonorCar')
                </label>
              </div>
            </li>
            <li>
              <div class="mb-2">
                <a href="{{ route('account.listings.requests.others', [], false) }}"
                   title="@lang('labels.frontend.listings.other')">
                  <img src="{{ asset('images/icons/list.svg') }}" id="parts-icon"
                       alt="@lang('labels.frontend.listings.other')"/>
                </a>
              </div>
              <div>
                <label class="font-montserrat gray-text-color text-width-75 font-size-label text-center">
                  @lang('labels.frontend.listings.other')
                </label>
              </div>
            </li>
            <li>
              <div class="mb-2">
                <a href="{{ route('account.listings.requests', [], false) }}"
                   title="@lang('labels.frontend.listings.own')">
                  <img src="{{ asset('images/icons/list-my.svg') }}" id="other-icon"
                       alt="@lang('labels.frontend.listings.own')"/>
                </a>
              </div>
              <div>
                <label
                  class="font-montserrat gray-text-color font-size-label text-center">@lang('labels.frontend.listings.own')</label>
              </div>
            </li>
          </ul>
        </div>
        <div class="top-bar-navigation2 mt-1">
          <ul class="mt-2">
            <li>
              <div>
                <a href="{{ route('account.settings', [], false) }}" title="@lang('labels.frontend.listings.settings')">
                  <img src="{{ asset('images/icons/settings-icon.png') }}" id="setting-icon" alt="parts"/>
                </a>

              </div>
              <div>
                <label
                  class="font-montserrat gray-text-color font-size-label text-center">@lang('labels.frontend.listings.settings')</label>
              </div>
            </li>
            <li>
              <div>
                <a href="{{ route('frontend.contact') }}" title="@lang('labels.frontend.listings.help')">
                  <img src="{{ asset('images/icons/form.svg') }}" id="form-icon" alt="help"/>
                </a>
              </div>
              <div>
                <label
                  class="font-montserrat gray-text-color ml-1 font-size-label text-center">@lang('labels.frontend.listings.help')</label>
              </div>
            </li>
            <li>
              <div>
                <a href="#" title="teamviewer">
                  <img src="{{ asset('images/icons/teamviewer-icon.png') }}" id="team-view" alt="teamviewer"/>
                </a>
              </div>
              <div>
                <label
                  class="font-montserrat gray-text-color font-size-label text-center">@lang('labels.frontend.listings.teamviewer')</label>
              </div>
            </li>
            <li>
              <div>
                <a href="#" title="Other requests">
                  <img src="{{ asset('images/icons/instructions-icon.png') }}" id="video-icon" alt="video"/>
                </a>
              </div>
              <div>
                <label class="font-montserrat gray-text-color ml-1 font-size-label text-center">
                  @lang('labels.frontend.listings.instruction')
                  @lang('labels.frontend.listings.video')
                </label>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  @else
    <div class="card flex-between">
      <div class="top-bar-navigation">
        <ul class="mt-2">
          <li>
            <div class="ml-2">

              <a href="{{ route('frontend.request', [], false) }}" title="@lang('labels.frontend.listings.addCarPart')">
                <img src="{{ asset('images/icons/list.svg') }}" class="request-icon" alt="new_request"/>
              </a>
            </div>
            <div class="text_position_first mt-1">
              <label class="font-montserrat gray-text-color font-size-label text-center">
                @lang('labels.frontend.listings.new')
              </label>
            </div>
          </li>
        </ul>
      </div>
      <div class="top-bar-navigation3 mt-1">
        <ul class="mt-1">
          <li>
            <div>
              <a href="{{ route('account.index', [], false) }}" title="@lang('labels.frontend.listings.dashboard')">
                <img src="{{ asset('images/icons/dashboard.svg') }}" id="dashboard-icon" alt="dashboard"/>
              </a>

            </div>
            <div>
              <label
                class="font-montserrat gray-text-color font-size-label text-center">@lang('labels.frontend.listings.dashboard')</label>
            </div>
          </li>
          <li>
            <div>
              <a href="{{ route('account.settings', [], false) }}" title="@lang('labels.frontend.listings.settings')">
                <img src="{{ asset('images/icons/settings-icon.png') }}" id="setting-icon" alt="parts"/>
              </a>

            </div>
            <div>
              <label
                class="font-montserrat gray-text-color font-size-label text-center">@lang('labels.frontend.listings.settings')</label>
            </div>
          </li>
        </ul>
      </div>
    </div>
  @endif
</div>
