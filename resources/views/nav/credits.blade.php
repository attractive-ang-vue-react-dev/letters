@extends('layouts.letters')

@section('content')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Credits</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          {{-- <button class="btn btn-sm btn-outline-secondary">Share</button> --}}
          <i class="fas fa-money-bill" style="font-size: 2em;"></i> <b style="font-size: 2em; margin: 10px;">{{ $user->credit }}</b>
          {{-- <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
        </div>
        {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button> --}}
      </div>
    </div>

    <p>For <b>one</b> credit, you can send <b>one</b> letter. You get <b>five</b> credits on the first of every month. In the future, we hope to be able to give more than that but we are limited at this time.</p>

    <p>You can purchase more credits by clicking the <i>Purchase Credits</i> button below.</p>

    <a class="btn btn-lg btn-primary" href="#">Purchase Credits</a><br>
    <br>

    <p>If you are truly unable to afford the small price we charge for Letter Credits, then please contact us at the email below.</p>

    <p><b style="font-size: 24px;">team@ameelio.com</b></p>

  </main>
@endsection
