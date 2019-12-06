@extends('layouts.frontend')

@section('title', $tag->name)
@section('body_class', 'page-cms')

@section('content')
    @include('frontend.cms.partials.published-posts')
@endsection
