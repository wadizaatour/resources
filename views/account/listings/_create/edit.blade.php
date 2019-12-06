@extends('layouts.frontend')

@section('body_class', 'page-create')

@section('content')
    @include('frontend.partials.search_bar')
    <div class="bg-light">
      <div class="container-fluid" style="max-width: 970px">
        <div class="col-12s">
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 pl-sm-5 ">
              <div class="row">
                <div class="col-9">
                  <h5 class="text-dark font-montserrat-regular pt-4">{{ __('Editing Listing') }}</h5>
                  <p class="text-muted pt-0 mb-2 font-montserrat-regular">{{ $listing->title }} <a href="{{ $listing->url }}" class="small">(view)</a>
@if(!$listing->is_published)
                    {{ __('unpublished') }}
@endif
                  </p>
                  <div class="mb-3">
@if(is_object($listing->pricingModel))
                    <span class="badge badge-pill badge-secondary ">{{ __('Listing type') }}: {{ $listing->pricingModel->seller_label }}</span>
@endif
                    <span class="badge badge-pill badge-secondary mr-2">{{ __('Category') }}: {{ $listing->category->name }}</span>
                  </div>
                </div>
                <div class="col-3 pt-4">
@if(!$listing->is_published)
                  <form action="{{ route('account.listings.create.update', [$listing], false) }}" method="post" class="form">
                    <input name="_method" type="hidden" value="PUT" />
                    <input type="submit" name="publish" value="{{ __('Publish')  }}" class="btn btn-primary float-right" />
                    @csrf
                  </form>
@else
                  <form action="{{ route('account.listings.create.update', [$listing], false) }}" method="post" class="form">
                    <input name="_method" type="hidden" value="PUT" />
@if($listing->is_verified)
                    <input type="submit" name="draft" value="{{ __('Unpublish') }}" class="btn btn-danger float-right font-montserrat-regular bord-rad-5" />
                    <div class="float-right text-center">
                      <small class="text-muted ">{{ __('Expires') }} {{ date("jS M 'y", $listing->expires_at) }}</small><br />
@if($listing->is_draft)
                      <input type="submit" name="undraft" value="{{ __('Re-enable') }}" class="btn  btn-outline-danger btn-sm" />
@else
                      <input type="submit" name="draft" value="{{ __('Disable') }}" class="btn  btn-outline-danger btn-sm" />
                      <input type="submit" name="renew" value="{{ __('Renew') }}" class="btn  btn-outline-success btn-sm" />
@endif
                    </div>
@else
                    <input type="button" name="draft" value="{{ __('Pending Verification') }}" class="btn  btn-lg btn-danger float-right" style="cursor: default">
@endif
                    @csrf
                  </form>
@endif
                </div>
              </div>
            </div>
            <div class="col-sm-3 d-none d-sm-block">
              <div id="sidebar" class="p-0 mt-0">
                <div class="card w-100 gray-background border-0 bord-rad-5 font-montserrat-regular">
                  <a data-scroll="details_section" class="card-body clickable {{-- todo active(['account.listings.create.edit']) --}}" href="#details_section">
                    <h6 class="card-title mb-1">{{ __('Listing Details') }}</h6>
                    <p class="card-text small">{{ __('Enter the tile, description and location of your listing.') }}</p>
                  </a>
                  <hr>
                  <a data-scroll="images_section" class="card-body clickable" href="#images">
                    <h6 class="card-title mb-1">{{ __('Images') }}</h6>
                    <p class="card-text  small">{{ __('Upload at least one image to make your listing stand out.') }}</p>
                  </a>
                  <hr>
@if(count($listings_form))
                  <a data-scroll="additional_section" class="card-body clickable" href="#additional_information">
                    <h6 class="card-title mb-1">{{ __('Additional Information') }}</h6>
                    <p class="card-text small">{{ __('Enter any relevant characteristics and/or specifications.') }}</p>
                  </a>
                    <hr>
@endif
                  <a data-scroll="pricing_section" class="card-body clickable" href="#pricing_section">
                    <h6 class="card-title mb-1">{{ __('Pricing') }}</h6>
                    <p class="card-text small">{{ __('Set-up pricing and availability for your listing.') }}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-9 col-12 pl-sm-5 border-0">
              @include('frontend.partials.notifications')
              <form action="{{ route('account.listings.create.update', [$listing], false) }}" method="post" class="form">
                <input name="_method" type="hidden" value="PUT" />
                <a id="details_section"></a>
                @include('account.listings.create.partials.details')
                <a id="images_section"></a>
                @include('account.listings.create.partials.images')
@if(count($listings_form))
                <a id="additional_section"></a>
                @include('account.listings.create.partials.additional')
@endif
                <a id="pricing_section"></a>
                @include('account.listings.create.partials.pricing_details')
                @include('account.listings.create.partials.pricing_additional')
                @include('account.listings.create.partials.pricing_shipping')
                @include('account.listings.create.partials.pricing_variants')
                @include('account.listings.create.partials.services')
                <div class="card border-0 bord-rad-5 gray-background mb-4">
                  <div class="card-body">
                    <input type="submit" value="{{ __('Save listing') }}" class="btn blue-light-bg font-montserrat-regular white-text-color bord-rad-5 float-right" />
                  </div>
                </div>
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
    <script>
      function show_tags() {
        $('.tags').each(function (i, obj) {
          if ($(obj)[0].selectize !== undefined) {
            $(obj)[0].selectize.destroy();
          }
        });
        $('.tags').selectize({
          delimiter: ',',
          persist: false,
          create: function (input) {
            return {
              value: input,
              text: input
            }
          }
        });
      }

      $('.repeater-default').repeater({});
      $('.repeater-variation-option').repeater({
        show: function () {
          show_tags();
          $(this).slideDown();
        }
      })
      show_tags();

      $('#sidebar').stick_in_parent({offset_top: 20});
      $('#sidebar').activescroll({
        active: "active",
        offset: 20,
        animate: 1000
      });
    </script>
@endpush
