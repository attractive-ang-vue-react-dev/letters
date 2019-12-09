@extends('layouts.letters')

@section('content')
  <main role="main" class="content ml-sm-auto  px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Letters</h1>
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
    <div class="wrapper row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="card-category">Sent Letters</h4>

            @foreach($user->all() as $user)
                <div class="card">

                    <div class="row card-body col-sm-12">
                        <div class="col-sm-3">
                            <img src="/user.jpg" style="border-radius:50%; width:50%;" alt="..">
                        </div>
                        <div class="col-sm-9"><h6>{{ $user->first_name}}</h6><h6>{{ $user->created_at }}<br>sent</h6></div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="col-sm-10">
                <h4 class="card-category">Compose Letter</h4>
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-sm btn-primary">Compose Letter</button>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="chart-area">
                                <h6>Send your letter before 5pm EST for same day processing.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 ">
                <h4 class="card-category">Credits</h4>
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row col-sm-12">
                                <div class="col-sm-2"><h6><a class="" href="#">0</a></h6></div>
                                <div class="col-sm-7">
                                    <h6>Free Letter Credits</h6>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <hr>
                            <div class="row col-sm-12">
                                <div class="col-sm-2"><h6><a class="" href="#">0</a></h6></div>
                                <div class="col-sm-7">
                                    <h6>Purchased Letter Credits</h6>
                                </div>
                                <div class="col-sm-3">
                                    <a class="" href="#"><h6>GET MORE</h6></a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <h5 class="card-category">Earn free letters</h5>
                <div class="card">
                    <div class="card-header">
                        <h6>Earn a letter credit by sharing with your friends and family.</h6>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary">Share Link</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


  </main>
@endsection
