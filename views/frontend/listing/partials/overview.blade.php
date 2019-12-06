    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="card border-0">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-sm-12">
                <div id="carouselExampleControls" class="carousel slide position-relative" data-interval="false" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="preview-image">
                      <image-slider :photos="{{json_encode($listing->carousel)}}"></image-slider>

                    </div>

                      <div class="purple-background position-text-image opacity-9">
                        @if ( $listing->user === null)
                          <h3 class="white-text-color font-montserrat text-center">@lang('labels.frontend.listings.no_account')</h3>
                        @elseif ( $listing->user->company !== null)
                        @if($listing->pricing_model_id === 1)
                        <h3 class="white-text-color font-montserrat text-center">{{ $listing->user->company->name }}</h3>
                        <h6 class="white-text-color font-montserrat text-center">{{$listing->city}}</h6>
                        @endif

                      @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body mb-5">
            <div class="row">
              <div class="col-lg-12">
                <ul class="nav nav-tabs">
                  <li id="one" style="border:none">
                    <a href="#overzicht" data-toggle="tab" class="font-montserrat gray-text-color d-flex justify-content-center" style="width:70%;border:none;border-bottom:white 1px">@lang('labels.frontend.overview.overview')</a>
                  </li>
                </ul>
                <div class="tab-content" style="background-color:#f0f1e5">
                  <div id="overzicht" class="tab-pane fade in active">
                    <div class="row">
                      <div class="col-lg-12 gray-text-color font-montserrat-regular" id="listing-description">
                        <table class="table mt-2 col-md-12">
                          <tbody id="tablelisting">
                            <tr><td>@lang('labels.frontend.overview.part_name')</td><td>{{ $listing->category->name}}</td></tr>
                            <tr><td>@lang('labels.frontend.overview.description')</td><td>{!! $listing->description !!}</td></tr>
@if($listing->pricing_model_id === 1)
                             <tr><td>@lang('labels.frontend.overview.price')</td><td>
@if($listing->show_price === 1)
                                 {{ $listing->price !== null ? '€ '.$listing->price : 'Op aanvraag' }}
@if($listing->vat_sale === 1)
                                  <span class="small">@lang('labels.frontend.listings.marge')</span>
@endif
@else
                                  <span class="font-montserrat-regular blue-light-color">Op aanvraag</span>
@endif
                              </td></tr>
                            <tr><td>@lang('labels.frontend.request.part') nr.</td><td>P{{$listing->id}}</td></tr>
@endif
@if($listing->pricing_model_id === 3)
                            <tr><td>@lang('labels.frontend.titles.request') nr.</td><td>R{{$listing->id}}</td></tr>
@endif
                            <tr><td>@lang('labels.account.create.article_number')</td><td>{{$listing->part->sku}}</td></tr>

@if($listing->shippingOptions->count())
                            <tr>
                              <td>@lang('labels.frontend.overview.ship_cost')</td>
                              <td>
@foreach($listing->shippingOptions as $shipping_option)
                                {{ $shipping_option->name }}: €  {{ $shipping_option->price }}<br />
@endforeach
                              </td>
                            </tr>
@endif
@if(trim($listing->deposit) !== '')
                            <tr><td>@lang('labels.frontend.overview.deposit')</td><td>€ {{ $listing->deposit }}</td></tr>
@endif
@if($listing->part !== null)
@if($listing->part->warranty_months !== null)
                            <tr><td>@lang('labels.frontend.overview.garantie_months')</td><td>{{$listing->part->warranty_months}}</td></tr>
@endif
@if($listing->part->warranty_comment !== null)
                            <tr><td>@lang('labels.frontend.overview.garantie_description')</td><td>{{$listing->part->warranty_comment}}</td></tr>
@endif
@if($listing->pricing_model_id === 1)
                            <tr><td>@lang('labels.frontend.overview.condition')</td><td>
                                {{ $listing->part->condition === 'used' ?  trans('labels.account.create.used') : trans('labels.account.create.new') }}</td></tr>
@endif
@if($listing->part->particularity_1 !== null || $listing->part->particularity_2 !== null)
                            <tr><td colspan="2"></td></tr>
@if($listing->part->particularity_1 !== null)
                            <tr><td>@lang('labels.frontend.overview.particularity_one')</td><td>{{$listing->part->particularity_1}}</td></tr>
@endif
@if($listing->part->particularity_1 !== null)
                            <tr><td>@lang('labels.frontend.overview.particularity_two')</td><td>{{$listing->part->particularity_2}}</td></tr>
@endif
@endif
                            <tr><td colspan="2"></td></tr>
@if($custom_attributes !== null && count($custom_attributes))
@foreach($custom_attributes as $attribute)
@if(array_key_exists(strtolower($attribute), $part_meta) && trim($part_meta[strtolower($attribute)]['value']) !== '')
                            <tr><td>{{ ucfirst($attribute) }}</td><td>{{ $part_meta[strtolower($attribute)]['value'] }}</td></tr>
@endif
@endforeach
                            <tr><td colspan="2"></td></tr>
@endif

                            <tr><td>@lang('labels.frontend.overview.make')</td><td>{{ $listing->part->car->make->name }}</td></tr>
                            <tr><td>@lang('labels.frontend.overview.model')</td><td>{{ $listing->part->car->model->name }}</td></tr>
                            <tr><td>@lang('labels.frontend.overview.type')</td><td>{{ $listing->part->car->type->name }}</td></tr>
                            <tr><td>@lang('labels.frontend.overview.year')</td><td>{{ $listing->part->car !== null ? $listing->part->car->year : '' }}</td></tr>

@endif

                          </tbody>
                        </table>
                      </div>
                    </div>
@if(property_exists($listing, 'tags') && count($listing->tags))
@foreach($listing->tags as $tag)
                    <span class="badge badge-pill badge-danger font-weight-bold text-uppercase mr-1 pr-3 pl-3 mt-3">{{ $tag }}</span>
@endforeach
@endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

