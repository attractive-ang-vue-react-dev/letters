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
                                        
                                    </thead>
                                </table>
                            @endforeach
                            @else
                                <div class="card-category" style="text-transform:none;">No messages have been sent.</div>
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
                        <a class="btn btn-sm btn-primary" href="/compose">Compose Letter</a>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="chart-area">
                            <label style="font-size:19px;">Send your letter before 5pm EST for same day processing.</label>
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
                    <label style="font-size:19px;">Earn a letter credit by sharing with your friends and family.</label>
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
