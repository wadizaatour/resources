    <div class="card gray-background border-0 padding-20">
@if($listing->pricing_model_id === 1)
      <span><h4>{{ $listing->user->company->name}}</h4> </span>
      <span>{{ $listing->user->address->first()->street}} {{ $listing->user->address->first()->building_nr}}</span>
      <span>{{ $listing->user->address->first()->postal}} {{ $listing->user->address->first()->city}}</span>
      <span class="pt-2"><a class="gray-text-color" href="{{ $listing->user->company->website}}" target="_blank">Website</a>
    </span>
@else
    <span><h4>{{ $listing->user !== null ? $listing->user->first_name : json_decode($listing->contact)->first_name }} {{ $listing->user !== null ? $listing->user->last_name : json_decode($listing->contact)->last_name }}</h4> </span>
@endif
    <div class="mt-2 mb-2 font-montserrat-regular">
      Neem contact op:
    </div>
    <i class="fa fa-phone p-2" aria-hidden="true">
      <span class="ml-3">{{ $listing->user !== null ? $listing->user->address->first()->phone : json_decode($listing->contact)->phone }}</span>
    </i>
    <i class="fa fa-id-card-o p-2" aria-hidden="true">
      <span class="ml-2">
        <a class="black-text" href="mailto:{{ $listing->user !== null ? $listing->user->email : json_decode($listing->contact)->email }}">{{ $listing->user !== null ? $listing->user->email : json_decode($listing->contact)->email }}</a>
      </span></i>
    </div>
