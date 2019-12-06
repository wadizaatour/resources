{{-- old
    <div>
      <h6 class="mt-0 text-capitalize">{{ _l($facet->name) }}</h6>
      <div class="row">
        <div class="col-5  pr-0 ">
          <input type="text" class="form-control form-control-sm" name="{{ $facet->field }}_min" value="{{ request()->input($facet->field.'_min')}}" />
        </div>
        <div class="col-2 pl-0 pr-0 text-center">
          <p class="form-control-plaintext">{{ __('to') }}</p>
        </div>
        <div class="col-5  pl-0">
          <input type="text" class="form-control form-control-sm" name="{{ $facet->field }}_max" value="{{ request()->input($facet->field.'_max')}}" />
        </div>
      </div>
    </div>
    <hr />
--}}
    <div class="d-flex flex-column">
      <span class="gray-text-color">
        @lang('labels.frontend.overview.price')
      </span>
      <div class="row">
        <div class="form-group col mr-1">
          <input type="number" name="{{ $facet->field }}_min" class="form-control light-gray-background request-input" value="{{ request()->input($facet->field.'_min')}}" placeholder="0 &euro;" />
        </div>
        <div class="form-group col">
          <div class="form-group light-gray-background">
            <input type="number" name="{{ $facet->field }}_max" class="form-control light-gray-background request-input" value="{{ request()->input($facet->field.'_max')}}" placeholder="0 &euro;" />
          </div>
        </div>
      </div>{{-- todo: hmz. how would this be implemented? probally javascript to modify the max value dynamicly?
      <div class="form-check form-check-inline mt-1 mb-1 mr-5">
        <input type="range" name="quantity" min="1" max="10">
      </div> --}}
    </div>
    <hr />
