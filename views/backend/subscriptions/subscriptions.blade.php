@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <a href="{{ route('backend.subscriptions.index', [], false) }}" class="mb-1"><i class="fa fa-angle-left" aria-hidden="true"></i> back</a>
    <h2>Membership Subscriptions</h2>
    <br />
    @include('backend.subscriptions.menu')
    @include('alert::bootstrap')

@if($subscriptions !== null && count($subscriptions))
    <table class="table table-sm ">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Title</th>
          <th scope="col">User</th>
          <th scope="col">Period</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
@foreach($subscriptions as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ str_limit($item->membership_plan->name, 40) }}</td>
          <td>{{ $item->user->email }}</td>
          <td>{{ $item->period }}</td>
          <td>{{ $item->created_at }}</td>
        </tr>
@endforeach
      </tbody>
    </table>
    {{ $subscriptions->appends(app('request')->except('page'))->links() }}
@else
    No active subscriptions.
@endif
@endsection
