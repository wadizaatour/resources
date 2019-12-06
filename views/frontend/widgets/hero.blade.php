<div style="max-height:380px">
  <div class="row mt-5 mb-0" >
    <div class="col-sm-6 offset-sm-3">
      <h2 class="text-{{ $widget['alignment'] }} pb-2">{{ $widget['title'] }}</h2>
      <p class="text-{{ $widget['alignment'] }} pb-2 text-muted">{{ $widget['metadata'] }}</p>
    </div>
  </div>
  <div class="row mb-5 mt-0" >
    <div class="col-sm-6 offset-sm-3 mt-3">
	  <form action="{{-- route(setting('marketplace_index')) --}}" method="GET" class=" mb-5">
        <div class="input-group mb-5">
		  <div class="input-group-prepend">
		    <button class="btn btn-default bg-white border border-right-0 btn-lg" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
		  </div>
		  <input type="text" name="q" class="border border-left-0 form-control form-control-lg" placeholder="@lang('widgets.hero.looking_for')" aria-label="">
		  <div class="input-group-append">
		    <button class="btn btn-primary btn-lg" type="submit">{{ __('Search') }}</button>
		  </div>
		</div>
      </form>
    </div>
  </div>
</div>
