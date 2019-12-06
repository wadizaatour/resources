@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="card no-border">
        <div class="card-header white-bg no-border">
            <ul class="nav nav-tabs  d-flex justify-content-center " role="tablist">
                <li class="d-flex justify-content-center li-size-button m-1" >
                    <a class="bgtt font-montserrat-regular font-unset" data-toggle="tab" href="#profile" role="tab">
                        <h6 class="text-label-position">@lang('labels.user.profile')</h6>
                    </a>
                </li>
                <li class="d-flex justify-content-center li-size-button m-1">
                    <a class="bgtt font-montserrat-regular font-unset" data-toggle="tab" href="#edit" role="tab">
                        <h6 class="text-label-position">@lang('labels.user.edit_profile')</h6>
                    </a>
                </li>
                <li class="d-flex justify-content-center li-size-button m-1">
                    <a class="bgtt font-montserrat-regular font-unset" data-toggle="tab" href="#password" role="tab">
                        <h6 class="text-label-position">@lang('labels.user.change_password')</h6>
                    </a>
                </li>
                @if (config('account.can_delete'))
                    <li class="d-flex justify-content-center li-size-button m-1">
                        <a class="bgtt font-montserrat-regular font-unset" data-toggle="tab" href="#delete" role="tab">
                            <h6 class="text-label-position">@lang('labels.user.delete')</h6>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="card-clock">
            <div class="tab-content p-3 white-bg">
                <div role="tabpanel" class="tab-pane" id="profile">
                    @include('account.settings.profile')
                </div>
                <div role="tabpanel" class="tab-pane" id="edit">
                    @include('account.settings.edit')
                </div>
                <div role="tabpanel" class="tab-pane" id="password">
                    @include('account.settings.password')
                </div>
                @if (config('account.can_delete'))
                    <div role="tabpanel" class="tab-pane" id="delete">
                        @include('account.settings.delete')
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
