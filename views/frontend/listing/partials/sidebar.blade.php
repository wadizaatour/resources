@if($listing->pricingModel)
  @widget('Order.'.$listing->pricingModel->widget.'Widget', [], $listing)
@endif
