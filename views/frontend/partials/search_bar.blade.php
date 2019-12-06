    <div class="pt-3 pb-3 mb-4 border-right-0 border-right-0 border-left-0 border-top-0 bg-light">
      <div class="container-fluid">
        <form method="get" action="{{ route(Settings::get('marketplace_index'), [], false) }}" id="top-search" accept-charset="utf-8" class="form-vertical">
          <div class="row">
            <div class="col-9">
              <div class="row">
                <div class="col-12 col-sm-12 pr-0"> {{-- Settings::get('enable_geo_search') ? 'col-sm-8' : 'col-sm-12' --}}
                  <div class="input-group mb-0">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control" placeholder="@lang('labels.frontend.listings.market')" name="q" type="text" value="{{ request()->input('q') }}" autocomplete="off" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <button class="btn blue-light-bg bord-rad-5 btn-block white-text-color font-montserrat-regular" type="submit">@lang('labels.frontend.listings.search')</button>
            </div>
          </div>
        </form>
      </div>
    </div>
