<div class="infinite-scroll">
  <div class="list-row">

@foreach($listings as $item)
  @if($item->is_published !== 0)
      <div class="card mb-3 p-0 border-0">
        <div class="card-body p-3">
@if($item->spotlight)
            <div class="ribbon"><span>{{ __('FEATURED') }}</span></div>
@endif
          <div class="row mb-2">
            <div class="col-sm-4 list-width">
              <div class="border-5">
                <a
                  href="{{ route('frontend.listing.show', ['listing' => $item, 'slug' => str_slug($item->title)], false) }}"
                  class="p-0 text-center" style="display:block">
@if($item->thumbnail !== '')
                    <img class="img-thumbnail-custom padding-10" ssrc="/images/ajax-loader.gif"
                         src="{{ $item->thumbnail }}?w=300&h=255" alt="{{ $item->title }}"/>
@elseif(count($item->photos))
                    <img class="img-thumbnail-custom padding-10" ssrc="/images/ajax-loader.gif"
                         src="{{ $item->photos[1] }}?w=300&h=255" alt="{{ $item->title }}"/>
@endif
                </a>
@if($item->photos !== null && count($item->photos) > 1)
                  <a
                    href="{{ route('frontend.listing.show', ['listing' => $item, 'slug' => str_slug($item->title)], false) }}"
                    style="position:absolute;bottom:0;left:5px;color:#fff;width:100%">
<i class="fa fa-camera" aria-hidden="true"></i> {{ count($item->photos) }}
                  </a>
                @endif
              </div>
            </div>
            <div class="col-lg-5">
              <ul>
                <li class="mt-2">
                  <a
                    href="{{ route('frontend.listing.show', ['listing' => $item, 'slug' => str_slug($item->title)], false) }}"
                    style="display:block"
                    class="h4 mb-0 card-subtitle font-montserrat gray-text-color"
                  >
@if($item->pricing_model_id === 3)
                  {{$item->category->name}}
                <br>  <span class="lightgray-text-color small">
                    {{ str_limit($item->title, 80) }}
                  </span>
@else
                    {{ str_limit($item->title, 80) }}
@endif
                  </a>
                </li>
@if($item->part !== null)
                <li class="mt-4">

                  <span>{{$item->part->car->make->name}}</span>,
                  <span>{{$item->part->car->model->name}}</span>,
                  <span class="lightgray-text-color">@lang('labels.frontend.overview.Type')</span>
                  <span>{{$item->part->car->type->name}}</span>,
                  <span class="lightgray-text-color">@lang('labels.frontend.listings.year')</span>
                  <span> {{$item->part->car->year}}</span>

                </li>
@if($item->pricing_model_id === 1)
                <li class="mt-2">
                  <span class="lightgray-text-color">@lang('labels.account.create.warranty')</span>
                  <span>{{$item->part->warranty_months}} mnd</span>
                </li>
@endif
@endif
              </ul>
            </div>
            <div class="col-lg-3">
@if($item->pricing_model_id === 1)
              <a
                href="{{ route('frontend.listing.show', ['listing' => $item, 'slug' => str_slug($item->title)], false) }}"
                class="h6 font-28 font-montserrat-regular blue-light-color font-weight-bold"
              >
@if($item->show_price === 1)
                {{ $item->price_formatted !== null ? $item->price_formatted : "Op aanvraag" }}
@if($item->vat_sale === 1)
                <span class="fs-13">@lang('labels.frontend.listings.marge')</span>
@endif
@else
                <span class="font-montserrat-regular blue-light-color">Op aanvraag</span>
@endif
              </a>
              <div class="mt-4">
                <span class="lightgray-text-color mt-2">@lang('labels.frontend.listings.supplier')</span></br>
@if($item->user->company !== null)
                <span class="gray-text-color mt-2">
                  {{$item->user->company->name}}
                </span>
@endif
@endif
@if($item->pricing_model_id === 3)
              <div class="mt-4">
                <a class="blue-light-bg btn mt-4 white-text-color arrow-button font-weight-bold p-2"
                   href="{{ route('frontend.listing.show', ['listing' => $item, 'slug' => str_slug($item->title)], false) }}"
                >
                  @lang('labels.frontend.companies.moreInfoRequest')
                </a>
              </div>
@endif

@if($item->pricing_model_id === 1)
                <a class="blue-light-bg btn mt-4 white-text-color arrow-button font-weight-bold p-2"
                   href="{{ route('frontend.listing.show', ['listing' => $item, 'slug' => str_slug($item->title)], false) }}"
                >
                  @lang('labels.frontend.companies.moreInfo')
                </a>
@endif
              </div>
            </div>
          </div>
        </div>
      </div>
@endif
@endforeach
  </div>
  {!! $listings->appends(request()->query())->links() !!}
</div>
<hr>
