@extends('layouts.frontend')

@section('body_class', 'page-contact')

@section('content')
    @if(!empty($message))
    {!! $message !!}
    @endif
@endsection
