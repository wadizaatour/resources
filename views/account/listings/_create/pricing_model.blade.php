@extends('layouts.frontend')

@section('content')
  @include('frontend.partials.search_bar')
  <h1>Under construction! Not fully working, and alot changes pending.</h1>
  <div class="bg-light window-height" >
    <div class="container-fluid" id="create-content-outer" >
      <div class="mx-auto" id="create-content" style="max-width:576px"> {{-- todo: no inline styles (use css class) --}}
        <div class="row pt-5">
          <div class="col-12">
            <div class="modal-content" data-turbolinks="false">
              <div class="modal-header">
                <h5 class="modal-title">{{ __('Post a listing') }}</h5>
                <button type="button" id="postModal-close" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="#" accept-charset="UTF-8" class="form create-form"
                    @if(request()->input('category') && request()->input('pricing_model'))
                    ic-post-to="{{ route('account.listings.create.store') }}"
                    @else
                    ic-get-from="{{ route('account.listings.create.index') }}"
                    @endif
                    ic-trigger-on="submit" ic-target="#create-content"
                    ic-select-from-response="#create-content" ic-replace-target="false" ic-indicator="#create-spinner">
                <div class="modal-body">
                  @if(request()->input('category'))
                    <div class="page-header ">
                      <div class="row mb-4">
                        <div class="col-sm-12">
                          <span class="badge badge-pill badge-secondary mt-1 mr-2">{{ __('Category') }}: {{ $selected_category->name }} <a href="#" ic-get-from="{{ url()->current() }}" class="small" ic-target="#create-content" ic-select-from-response="#create-content"><i class="mdi mdi-close small text-muted"></i></a></span>
                          <input type="hidden" name="category" value="{{ request()->input('category') }}" />
                          @if(request()->input('pricing_model'))
                            <span class="badge badge-pill badge-secondary mt-1 ">{{ __('Listing type') }}: {{ $selected_pricing_model }} <a href="#" ic-get-from="{{ request()->fullUrlWithQuery(['pricing_model' => null]) }}" class="small" ic-target="#create-content" ic-select-from-response="#create-content"><i class="mdi mdi-close small text-muted"></i></a></span>
                            <input type="hidden" name="pricing_model" value="{{ request()->input('pricing_model') }}" />
                          @endif
                        </div>
                      </div>
                    </div>
                  @endif
                  @if(!request()->input('category'))
                    <div class="form-group mb-4">
                      <label>{{ __('Select a category') }}</label>
                      <select name="category" class="autocomplete form-controls">
                        @foreach($categories as $cat_id => $category)
                          <option value="{{ $cat_id }}">{!! $category !!}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif
                  @if(!request()->input('pricing_model') && request()->input('category'))
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{ __('Listing type') }}</label>
                      <div class="row">
                        <div class="col-sm-12">
                          @foreach($pricing_models as $pricing_model_id => $pricing_model_label)
                            <a href="{{ url()->current() }}&pricing_model={{$pricing_model_id}}"
                               data-turbolinks="false" class="btn btn-outline-primary mb-2 mr-2"
                               ic-get-from="{{ url()->current() }}&pricing_model={{$pricing_model_id}}"
                               ic-target="#create-content"
                               ic-select-from-response="#create-content">{{$pricing_model_label}}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  @endif
                  <div id="create-spinner" class="text-center" style="display:none"> {{-- todo: no inline styles (use css class) --}}
                    <div class="fa fa-spinner fa-spin fa-2x text-muted"></div>
                  </div>
                  @include('frontend.partials.notifications')
                  @if(request()->input('pricing_model'))
                    <div class="form-group has-feedback">
                      <label for="title">{{ __('Title') }}</label>
                      <input type="text" name="title" id="title" required="required" class="form-control" data-minlength="5" />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                      <label>{{ __('Description') }}</label>
                      <textarea name="description_new" id="description_new" style="height:200px"> {{-- todo: no inline styles (use css class) --}}
                        {!! old('description_new') !!}
                      </textarea> {{--
                      <input type="hidden" name="description_new" class="form-control" /> --}}
                      <small id="emailHelp" class="form-text text-muted">{{ __('You can upload images and set your own pricing in the next step.') }}</small>
                    </div>
                  @endif
                </div>
                <div class="modal-footer">
                  @if(request()->input('category') && request()->input('pricing_model'))
                    <button type="submit" class="btn btn-primary">{{ __('Create & continue') }}</button>
                  @else
                    <button type="submit" class="btn btn-primary">{{ __('Continue') }}</button>
                  @endif
                </div>
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
      if($('#postModal').is(':visible')) {
          $('#postModal-close').show();
      } else {
          $('#postModal-close').hide();
      } {{--
      if ($('input[name=description_new]').length) {
        let quill = new Quill('#description_new', {
          placeholder: '',
          theme: 'snow'  // or 'bubble'
        });
        quill.on('editor-change', function (eventName, args) {
          $('input[name=description_new]').val(quill.root.innerHTML);
        });
      } --}}
  </script>
@endpush
