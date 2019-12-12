@extends('layouts.letters')

@section('content')
  <main role="main" class="content ml-sm-auto  px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Review</h1>
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
            <div class="row col-sm-12">
                <div class="col-sm-4">
                    <h4>Recipient</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row card-body col-sm-12">
                                <div class="logo-image">
                                    <h3 style="text-transform: uppercase;"></h3>
                                </div>
                                <div class="col-sm-9">
                                    <h6>
                                        {{ $user_data['sent'] }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <h4>Sender</h4>
                    <div class="card">
                        <form action="/send" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row card-body col-sm-12">
                                    <div class="col-sm-3">
                                       <div class="logo-image">
                                           <h3 style="text-transform: uppercase;">{{ $user->facility_name }}</h3>
                                       </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <h6>{{ $user-> first_name }} {{ $user-> last_name }}</h6>
                                        <h6>{{ $user-> addr_line_1 }},{{ $user-> addr_line_2 }}, {{ $user-> city }}, {{ $user-> state }}, {{ $user->facility_name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row col-sm-12">
                <div class="col-sm-4">
                    <h4>Message</h4>
                    <div class="card">
                        <form action="/send" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row card-body">
                                    <div class="col-sm-3">
                                        <img src="/login.png" alt="..">
                                    </div>
                                    <div class="col-sm-9">
                                        <h6>
                                        {{ $user_data['content'] }}
                                        </h6>
                                        <hr>
                                        <h6>From: {{ $user-> first_name }} {{ $user-> last_name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="col-sm-4">
                    <h4>Photo</h4>
                    <div class="card">
                        <form action="/send" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="card-chart col-sm-12">
                                   <img src="/{{ $user_data['delivered'] }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row col-sm-9">
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    <a class="btn btn-sm btn-primary" href="/compose">Back</a>
                    <a class="btn btn-sm btn-primary" href="/sent"><i class="fa fa-paper-plane"></i> Send</a>
                </div>
            </div>
            <div class="col-lg-10"></div>
        </div>
    </div>

  </main>
@endsection
