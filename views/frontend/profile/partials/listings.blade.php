    <div class="row">
	  <div class="col-sm-12">
		<h3 class="h5">{{ __(":name's listings", ['name' => $profile->display_name]) }}</h3>
		<hr />
		<div class="row grid-row">
@foreach($listings as $item)
          <div class="col-6 col-sm-4 mb-3">
            <div class="card ">
              <div style="position: relative">
                <a href="{{ $item->url }}" class="roundeds  border-top image-wrappers text-center">
                  <img class="img-grid-loaders roundeds img-grid card-img-top" src="{{ $item->thumbnail }}?w=300&h=255" alt="{{ $item->title }}">
                </a>
              </div>
              <div class="card-body pt-3 pb-4 p-2">
                <a href="{{ $item->url }}" style="max-height: 40px; display: block;     font-style: normal;" class="truncate h6 card-subtitle mb-2 text-dark" >{{ $item->title }}</a>
                <p class="card-text row mt-0">
                  <span class="col-sm-12 text-danger truncate mb-1">{{ $item->price_formatted }}</span>
                  <small class="col-sm-12 text-muted truncate">{{ $item->short_address }}</small>
                  <small class="col-sm-6 text-muted truncate">{{ $item->user->display_name }}</small>
                </p>
              </div>
            </div>
          </div>
@endforeach
		</div>
		<br /><br />
      </div>
    </div>
