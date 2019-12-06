    <div class="card" id="form-selector">
      <div class="card-body">
        <div class="row mt-3 mb-3">
          <div class="col-sm-12 mx-auto">
            <p class="small mb-3 text-muted"><i class="mdi mdi-clock"></i> Type: <strong>{{ ucfirst($listing->pricing_models) }}</strong></p>
            <p class="small mb-3 text-muted" title="{{ $listing->created_at }}"><i class="mdi mdi-clock"></i> {{ __('Posted') }}: {{ $listing->days_ago }}</p>
@if($total)
            <h3 class="mb-3 h2">{{ format_money($total, $listing->currency) }} <i class="widget-indicator fa fa-circle-o-notch p-1 fa-spin float-right" style="display:none"></i></h3>
            <p class=" h6 text-muted">{{ $listing->price_per_unit_display }}</p>
@endif
@if($error)
            <p class="mb-1 mt-1 p-3 text-muted text-center">{{ $error }}</p>
@endif
          </div>
        </div>
      </div>
    </div>
