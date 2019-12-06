@extends('layouts.frontend')

@section('body_class', 'page-inbox')

@section('content')
    <div class="bg-light window-height" >
      <div class="container-fluid" id="inbox-main-outer">
        <div class="mx-auto " id="inbox-main" style="max-width: 576px;">
          <div class="row pt-5">
            <div class="col-12 " style="">
              <div id="inbox-content">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="inboxModal">{{ __('Inbox') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body p-0 " style="min-height: 400px">
                    <div class="progress rounded-0 bg-white" id="inbox-spinner"
                     style="position: absolute; width: 100%; margin-top: -10px; display: none">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
@if(count($inboxes) === 0)
                    <p class="text-muted text-center pt-5">{{ __('Your inbox is currently empty') }}</p>
@else
@foreach($inboxes as $inbox)
                    <div class="pt-0 pb-2 pt-3 hoverable ">
                      <div class="col-12">
                        <div class="row clickable" ic-indicator="#inbox-spinner"
                             ic-get-from="{{ route('inbox.show', $inbox->thread->conversation_id) }}"
                             ic-select-from-response="#inbox-main" ic-target="#inbox-main" ic-replace-target="false">
                          <div class="col-2 text-right">
                            <img src="{{ $inbox->withUser->avatar }}" title="{{ $inbox->withUser->display_name }}" class="rounded-circle" style="width: 42px"/>
                          </div>
                          <div class="col-10">
                            <div class="row">
                              <div class="col-8">
                                <p>
                                  <strong class="font-weight-bold">
@if(!$inbox->thread->is_seen && $inbox->thread->user_id !== auth()->user()->id)
                                    <i class="fa fa-envelope-open-o mr-1 text-danger" aria-hidden="true"></i>
@endif
                                  </strong>
                                  {{ substr($inbox->thread->message, 0, 140) }} <br/>
                                  <small class="text-muted text-align-right">{{ $inbox->thread->created_at->diffForHumans() }}</small>
                                </p>
                              </div>
                              <div class="col-4 text-right">
                                <i style="font-size: 30px" class="mdi mdi-chevron-right text-muted"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
@endforeach
@endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
