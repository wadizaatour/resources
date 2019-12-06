<div class="image-purple gray-background d-flex justify-content-center padding-20">
  <div class="container row">
    <div class="col-lg-4 col-md-4">
      <a href="{{ URL::route('frontend.request') }}">
         <img class="img-size w-120-ipad" src="{{ asset('images/carparts/'.$link1) }}" alt="car part request" />
      </a>
    </div>
    <div class="col-lg-4 col-md-4">
      <a href="{{ URL::route('frontend.catalog.search') }}">
          <img class="img-size w-120-ipad" src="{{ asset('images/carparts/'.$link2) }}" alt="car parts stock" />
      </a>
    </div>
    <div class="col-lg-4 col-md-4">
      <a href="{{ URL::route('frontend.companies.index') }}">
         <img class="img-size w-120-ipad" src="{{ asset('images/carparts/'.$link3) }}" alt="companies" />
      </a>
    </div>
  </div>
</div>
