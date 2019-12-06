@extends('layouts.frontend')

@section('title', __('labels.frontend.titles.cms'))
@section('body_class', 'page-cms')

@section('content')
    @include('frontend.cms.partials.published-posts')
@endsection
