    <div>
      <h6 class="mt-0 text-capitalize">{{ _l($facet->name) }}</h6>
      <div class="row">
        <div class="col-sm-12">
          <select name="{{ $facet->field }}" class="form-control">
            <option value="">-- SELECT --</option>
@foreach($facet->options as $option)
            <option value="{{ trim($option->value, '"') }}">{{ trim($option->name, '"') }}</option>
@endforeach
          </select>
        </div>
      </div>
    </div>
    <hr />
