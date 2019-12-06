@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <a href="{{ route('backend.subscriptions.index') }}" class="mb-1"><i class="fa fa-angle-left" aria-hidden="true"></i> back</a>
@if(!$form->getModel())
    <h2 class="mt-xxs">Creating subscription plan</h2>
@else
    <h2 class="mt-xxs">Editing subscription plan</h2>
@endif
    <br />
    @include('alert::bootstrap')

    {!! form($form) !!}
@endsection
