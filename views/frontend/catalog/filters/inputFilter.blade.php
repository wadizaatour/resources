<div class="pl-0  pr-0 pr-sm-5">
  <h6 class="mt-0 text-capitalize">{{ _l($facet['name']) }}</h6>
  <div class="row">
    <div class="col-sm-12">
      <input type="text" name="{{ $facet['field'] }}" value="{{ request()->input($facet['field']) }}" class="form-control" />
    </div>
  </div>
</div>
<hr />
