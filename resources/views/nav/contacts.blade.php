@extends('layouts.letters')

@section('content')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

  <main role="main" class="content  ml-sm-auto  px-4">
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
    <div class="wrapper">
        <div class="row">
            @if ($errors->any())
                <div class="container">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(count($contacts) > 0)

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="/contacts/search" method="POST">
                                    @csrf
                                    <div class="searchbar">
                                        <input type="text" class="form-control" name="filter" required autocomplete="filter" placeholder="Start typing a recipient's name or inmate number">
                                        <button type="submit" class="btn  btn-primary search_icon" id="search_btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-category">Contacts</div>
                        <hr>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th class="card-category">Inmate Number</th>
                                    <th class="card-category">Full Name</th>
                                    <th class="card-category">Facility</th>
                                    <th class="card-category">...</th>
                                </tr>
                            </thead>
                            </div>

                            <div class="card-chart">
                                <tbody>
                                @if(count($contacts) > 0)
                                    @foreach($contacts as $c)
                                        <tr>
                                            <td>{{ $c->inmate_number }}</td>
                                            <td>{{ $c->first_name }} {{ $c->middle_name }} {{ $c->last_name}}</td>
                                            <td>{{ $c->facility_name }}</td>
                                            <td class="row col-sm-6">
                                                <a class="btn btn-sm btn-primary" href="/compose">Letter</a>
                                                <a class="btn btn-sm btn-danger" href="/contacts/remove/{{ $c->id }}" onclick="return confirm('Are you sure?');">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <div class="col-sm-1">{{ $contacts->links() }}</div>
                                @else
                                <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <p>You haven't any contact yet.</p>
                                        </div>
                                    </div>
                                </div> -->
                                @endif
                                </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
            @else

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div style="color: red;font-size:20px;">You haven't added any contact yet. Please add a new one.</div>
                    </div>
                </div>
            </div>
            @endif
            <hr>
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-category">Add new contact</h4>
                        <div class="card-chart">
                            <form action="/contacts/add" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                    <input class="form-control" name="first_name"  placeholder="First Name" required>
                                    </div>

                                    <div class="col-lg-4">
                                    <input class="form-control" name="middle_name" placeholder="Middle" required>
                                    </div>

                                    <div class="col-lg-4">
                                    <input class="form-control" name="last_name" placeholder="Last Name" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                    <input type="text"class="form-control" name="inmate_number" placeholder="Inmate Number" required>
                                    </div>

                                    <div class="col-lg-6">
                                    <input class="form-control" name="facility_name" placeholder="Facility Name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                    <input class="form-control" name="facility_address" placeholder="Facility Address" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                    <input class="form-control" name="facility_city" placeholder="Facility City" required>
                                    </div>

                                    <div class="col-lg-3">
                                    <input class="form-control" name="facility_state" placeholder="Facility State" required>
                                    </div>

                                    <div class="col-lg-3">
                                    <input type="number" class="form-control" name="facility_postal" placeholder="Facility Postal" required>
                                    </div>

                                </div>
                                <hr>
                                <button class="btn btn-sm btn-primary" type="submit">Add new contact</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection
