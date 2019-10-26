@extends('layouts.letters')

@section('content')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Your Profile</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          {{-- <button class="btn btn-sm btn-outline-secondary">Share</button> --}}
          {{-- <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
        </div>
        {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button> --}}
      </div>
    </div>

    <form action="/profile/save" method="POST">
      @csrf

      <div class="row">
        <div class="col-lg-6">
          <input class="form-control" type="text" name="first_name" value="{{ $user->first_name }}" placeholder="First Name">
        </div>

        <div class="col-lg-6">
          <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name">
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <input class="form-control" type="text" name="addr_line_1" value="{{ $user->addr_line_1 }}" placeholder="Address Line 1">
        </div>

        <div class="col-lg-6">
          <input class="form-control" type="text" name="addr_line_2" value="{{ $user->addr_line_2 }}" placeholder="APT/Unit">
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <input class="form-control" type="text" name="city" value="{{ $user->city }}" placeholder="City">
        </div>

        <div class="col-lg-3">
          <input class="form-control" type="text" name="state" value="{{ $user->state }}" placeholder="State">
        </div>

        <div class="col-lg-3">
          <input class="form-control" type="text" name="postal" value="{{ $user->postal }}" placeholder="ZIP Code">
        </div>
      </div>

      <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
    </form>

  </main>
@endsection
