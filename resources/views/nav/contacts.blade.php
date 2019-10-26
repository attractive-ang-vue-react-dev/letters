@extends('layouts.letters')

@section('content')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Contacts</h1>
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

    @if(count($contacts) > 0)
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Inmate Number</th>
              <th scope="col">Full Name</th>
              <th scope="col">Facility</th>
              <th scope="col">...</th>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $c)
              <tr>
                <th scope="row">{{ $c->inmate_number }}</th>
                <td>{{ $c->first_name }} {{ $c->middle_name }} {{ $c->last_name}}</td>
                <td>{{ $c->facility_name }}</td>
                <td>
                  <a class="btn btn-sm btn-primary" href="/letter/compose/{{ $c->id }}">Send letter</a>
                  <a class="btn btn-sm btn-danger" href="/contacts/remove/{{ $c->id }}" onclick="return confirm('Are you sure?');">Remove</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p>You haven't added any contacts.</p>
    @endif

    <hr>

    <h2>Add new contact</h2>

    <form action="/contacts/add" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-4">
          <input class="form-control" name="first_name" placeholder="First Name">
        </div>

        <div class="col-lg-4">
          <input class="form-control" name="middle_name" placeholder="Middle">
        </div>

        <div class="col-lg-4">
          <input class="form-control" name="last_name" placeholder="Last Name">
        </div>

      </div>

      <div class="row">
        <div class="col-lg-6">
          <input class="form-control" name="inmate_number" placeholder="Inmate Number">
        </div>

        <div class="col-lg-6">
          <input class="form-control" name="facility_name" placeholder="Facility Name">
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <input class="form-control" name="facility_address" placeholder="Facility Address">
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <input class="form-control" name="facility_city" placeholder="Facility City">
        </div>

        <div class="col-lg-3">
          <input class="form-control" name="facility_state" placeholder="Facility State">
        </div>

        <div class="col-lg-3">
          <input class="form-control" name="facility_postal" placeholder="Facility Postal">
        </div>

      </div>

      <button class="btn btn-sm btn-primary" type="submit">Add new contact</button>

    </form>
  </main>
@endsection
