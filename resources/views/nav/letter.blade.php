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
        <div class="col-md-5">
            <h4 class="card-category">Sent Letters</h4>


                <div class="card">
                    <div class=" card-body">
                        @if (count($contacts) > 1 )
                            @foreach($contacts->all() as $c)
                                <table class="table">
                                    <thead>
                                        <!-- <tr>
                                            <td>
                                                <div class=" logo-image">
                                                    <h3 style="text-transform: uppercase;">{{ $user->facility_name}} </h3>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <h6>{{ $user->first_name}}<br>{{ $user->created_at }}<br>Sent</h6>
                                                </div>
                                            </td>
                                        </tr> -->
                                    </thead>
                                </table>
                            @endforeach
                            @else
                                <div class="card-category">You didn't send any message.</div>
                            @endif
                            <hr>
                        <i class='far fa-clock'></i> Last 7 days
                    </div>
                </div>

        </div>
        <div class="col-md-6">
            <div class="col-md-10 ">
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
            <div class="col-md-10">
                <h4 class="card-category">Credits</h4>
                <div class="card">
                    <div class="card-header"></div>
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
                                    <td><b><a class="" href="/credits">GET MORE</a></b></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
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
