@extends('layouts.letters')

@section('content')
  <main role="main" class="content ml-sm-auto  px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Profile</h1>
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
    <div class="content">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-category">Bio</h5>
                        </div>
                        <div class="card-body">
                            <form action="/profile/save" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label>Address 1</label>
                                        <input class="form-control" type="text" name="addr_line_1" value="{{ $user->addr_line_1 }}" placeholder="Address Line 1" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <label>Address 2</label>
                                        <input class="form-control" type="text" name="addr_line_2" value="{{ $user->addr_line_2 }}" placeholder="APT/Unit" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <label>City</label>
                                    <input class="form-control" type="text" name="city" value="{{ $user->city }}" placeholder="City" required>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>State</label>
                                    <input class="form-control" type="text" name="state" value="{{ $user->state }}" placeholder="State" required>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" name="postal" value="{{ $user->postal }}" placeholder="ZIP Code" required>
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card card-user">
                        <div class="image"></div>
                        <div class="card-body">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="/login.png" alt="..." >
                                </a>
                                <h5 class="title">{{ $user->first_name }}  {{ $user->last_name }}</h5>
                                <h6 class="title">Member since {{$user->created_at }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="button-container">
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                <i class="fab fa-instagram"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-category">Letter history</h4>
                        </div>
                        <div class="card-body">
                            <!-- @foreach( $user->all() as $user)
                            <div class="row card-body col-sm-12">
                                <div class="col-sm-3">
                                    <img src="/login.png" style="border-radius:50%;" alt="..">
                                </div>
                                <div class="col-sm-9"><p>{{ $user->first_name}}<br>{{ $user->created_at }}<br>Sent</p></div>
                            </div>
                            @endforeach -->
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                            <i class='far fa-clock'></i> Last 7 days
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-category">Connect History</h4>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                            <p>This feature has not yet been enabled.</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                            <i class='far fa-clock'></i> Last 7 days
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-category">Credits</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td><b><a class="" href="#">0</a></b></td>
                                        <td><b>Free Letter Credits</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b><a class="" href="#">0</a></b></td>
                                        <td><b>Purchased Letter Credits</b></td>
                                        <td><b><a class="" href="#">GET MORE</a></b></td>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection
