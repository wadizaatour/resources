    <div class="row">
      <div class="col-sm-12" data-turbolinks="false">
@if($listing->pricingModel)
        @include('account.listings.partials.'.$listing->pricingModel->widget.'_widget')
@endif
      </div>
    </div>
