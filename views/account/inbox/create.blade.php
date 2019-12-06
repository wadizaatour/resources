@extends('layouts.frontend')

@section('content')
    <div id="inbox-message">
      <div class="modal-content">
		<div class="modal-header">
          <h5 class="modal-title" id="inboxModal">
@if(session()->has('conversation_id') && !request()->get('direct'))
            <a href="#" data-turbolinks="false" ic-indicator="#inbox-spinner" ic-select-from-response="#inbox-main" ic-target="#inbox-main" ic-get-from="/account/inbox/{{ session()->get('conversation_id') }}" ic-trigger-on="click"><i class="mdi mdi-chevron-left mr-1" ></i></a>
@else
            <i class="mdi mdi-message-outline mr-1" ></i>
@endif
            {{ __('Send message') }}
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-sm-0" style="min-height:400px" >
          <div class="progress rounded-0 bg-white" id="inbox-spinner" style="position: absolute; width: 100%; margin-top: -10px; display: none">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-10 mx-auto pt-4 pb-4">
              @include('frontend.partials.notifications')
@if(auth()->user()->id === $recipient->id)
              <div class="alert alert-danger" role="alert">
                {{ __('Alert - You cannot send a message to yourself.') }}
              </div>
@else
              <form action="{{ route('account.inbox.index', [], false) }}" ic-post-to="{{ route('account.inbox.index', [], false) }}" ic-indicator="#inbox-spinner" ic-select-from-response="#inbox-main" ic-target="#inbox-main">
                <div class="form-group">
                  <label for="display_name" class="control-label required">{{ __('Send to') }}</label>
                  <input type="text" name="display_name" id="display_name" value="{{ $recipient->display_name }}" disabled="disabled" class="form-control" />
                </div>
                <input type="hidden" name="recipient_id" value="{{ $recipient->id }}" />
                <div class="form-group">
                  <label for="message" class="control-label">{{ __('Message') }}</label>
                  <textarea name="message" id="message" required="required" rows="5" class="form-control">{!! $message !!}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">{{ __('Send message') }}</button>
                @csrf
              </form>
@endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
