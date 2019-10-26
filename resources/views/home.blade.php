@extends('layouts.main')

@section('content')
  <div class="jumbotron bg-blue">
    <div class="container">
      <h1 class="display-5">Start a new letter or continue a draft</h1>
      <a class="btn bg-red" href="/letter/new">Start a new letter</a>
    </div>
  </div>

  <div class="container">
    <h2 class="list-h2">Your Contacts</h2>

    <!-- Recipients -->
    <div class="recp-list">
      <div class="row">
        <div class="col-3">
          John Smith
        </div>

        <div class="col-3">
          Demo County Jail
        </div>

        <div class="col-3">
          June 1, 2018
        </div>

        <div class="col-3">
          <a class="btn btn-secondary" href="/letter/new">Send letter</a>
        </div>
      </div>

      <div class="row">
        <div class="col-3">
          John Smith
        </div>

        <div class="col-3">
          Demo County Jail
        </div>

        <div class="col-3">
          June 1, 2018
        </div>

        <div class="col-3">
          <a class="btn btn-secondary" href="/letter/new">Send letter</a>
        </div>
      </div>


    </div>
    <!-- End Recipients -->

    <div class="row" style="margin-top: 50px; margin-bottom: 100px;">
      <div class="col-lg-2"></div>

      <div class="a-card col-lg-3 bg-blue">
        <div class="card-body">
          <div class="a-card-h">5</div>
          <h5 class="card-title">Free Letters</h5>
          <p class="card-text">We provide you 5 free letter credits per month.</p>
        </div>
      </div>

      <div class="col-lg-2"></div>

      <div class="a-card col-lg-3 bg-red">
        <div class="card-body">
          <div class="a-card-h">+</div>
          <h5 class="card-title">Purchase More Letters</h5>
          <a class="link" href="/letters/refill">Get more</a>
        </div>
      </div>
    </div>





    <h2 class="list-h2">Letter History</h2>

    <!-- Letter History -->
    <div class="recp-list">
      <div class="row">
        <div class="col-3">
          John Smith
        </div>

        <div class="col-3">
          Demo County Jail
        </div>

        <div class="col-3">
          June 1, 2018
        </div>

        <div class="col-3">
          <a class="btn btn-secondary" href="/letter/new">Send letter</a>
        </div>
      </div>
    </div>
    <!-- End Letter History -->
  </div>

  <footer class="footer">
    <div class="bottom">&copy; 2019 Ameelio</div>
  </footer>
@endsection
