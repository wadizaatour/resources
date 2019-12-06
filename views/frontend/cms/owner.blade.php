@extends('layouts.frontend')

@section('title', $user->name)
@section('body_class', 'page-cms')

@section('content')
    @include('frontend.cms.partials.published-posts', ['hide_owner' => true])
@endsection
