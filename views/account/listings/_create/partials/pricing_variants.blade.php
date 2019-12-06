@if(is_object($listing->pricingModel) && $listing->pricingModel->can_add_variants)
    <div class="card mb-4">
      <h6 class="card-header bg-white">{{ __('Variations') }}</h6>
      <div class="card-body">
        <div class="repeater-variation-option">
          <div>
            <div class="row mb-2">
              <div class="col-sm-3 small">{{ __('Attribute') }}</div>
              <div class="col-sm-8 small">
                {{ __('Values') }} <i>({{ __('e.g. small, medium, large') }})</i>
              </div>
            </div>
          </div>
          <div data-repeater-list="variations">
@if(!$listing->variant_options)
            <div data-repeater-item>
              <div class="">
                <div class="row mb-2">
                  <div class="col-sm-3">
                    <input type="text" name="name" placeholder="{{ __('e.g. Color') }}" class="form-control" />
                  </div>
                  <div class="col-sm-8">
                    <input type="text" name="options" placeholder="{{ __('e.g. small, medium, large') }}" class="tags" />
                  </div>
                  <div class="col-sm-1">
                    <span data-repeater-delete class="btn btn-link btn-lg">
                      <span class="mdi mdi-close"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
@else
@foreach($listing->variant_options as $variant_name => $variant_option)
            <div data-repeater-item>
              <div>
                <div class="row mb-2">
                  <div class="col-sm-3">
                    <input type="text" name="name" value="{{ $variant_name }}" placeholder="{{ __('e.g. Color') }}" class="form-control form-control-sm" />
                  </div>
                  <div class="col-sm-8">
                    <input type="text" name="options" value="{{ implode(',', $variant_option) }}" placeholder="{{ __('e.g. small, medium, large') }}" class="tags" />
                  </div>
                  <div class="col-sm-1">
                    <span data-repeater-delete class="btn btn-link btn-lg">
                      <span class="mdi mdi-close"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
@endforeach
@endif
          </div>
          <div class="form-group">
            <div class="">
			  <span data-repeater-create class="btn btn-info btn-sm">
				<span class="mdi mdi-plus"></span> {{ __('Add variation') }}
			  </span>
            </div>
          </div>
        </div>
        <div class="card-bodys text-muted text-center border-top pt-1 pb-1 bg-light pl-0 hidden" style="display: none">
          <a href="" class=" small" ic-put-to="{{ route('account.listings.create.update', $listing) }}"><i class="mdi mdi-refresh"></i>{{ __('Update variation list') }}</a>
        </div>
@if($listing->variant_options)
        <div class="card-bodys text-muted text-left border-top-0 pt-0 pb-0 bg-white pl-0">
          <table class="table table-sm">
            <thead class="thead-light">
              <tr>
                <th scope="col">{{ __('Variation') }}</th>
                <th scope="col">{{ __('Additional price') }}</th>
                <th scope="col">{{ __('Stock') }}</th>
              </tr>
            </thead>
            <tbody>
@foreach($listing->variants as $variant)
              <tr>
                <th scope="row">{{ $variant->name }}</th>
                <td>
                  <input type="text" name="variants[{{ $variant->id }}][price]" value="{{ $variant->price }}" placeholder="" class="form-control form-control-sm" />
                </td>
                <td>
                  <input type="text" name="variants[{{ $variant->id }}][stock]" value="{{ $variant->stock }}" placeholder="" class="form-control form-control-sm" />
                </td>
              </tr>
@endforeach
            </tbody>
          </table>
        </div>
@endif
      </div>
    </div>
@endif
