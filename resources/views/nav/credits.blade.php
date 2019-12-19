@extends('layouts.letters')

@section('content')
  <main role="main" class="content ml-sm-auto  px-4">
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
    <div class="content">
        <div class="wrapper row">
            <form method="POST" action="{{ route('register') }}" class="container-fluid">
                @csrf
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body" style="padding-bottom: 5%;">
                            
                            <div class="card-body">
                                <div class="credit-card col-sm-4">
                                    <div class="card-header">
                                        <h4>Select Option</h4>
                                    </div>
                                    <div class="form-check">
                                        <p class="h6 form-check-label" for="radio1">
                                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Single Credits(1 Letter)&nbsp;&#8226;<span style="color:#2CA8FF;">$1</span>
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="card-number" type="number" class="form-control" name="card-number" placeholder="0" style="background-color:#F3F3F3;margin-left:20%;width:125px;" required>
                                    </div>
                                    <div class="form-check">
                                        <p class="h6 form-check-label" for="radio2">
                                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Unlimited Credits&nbsp;&#8226;<span style="color:#2CA8FF;">$10/per month</span>
                                        </p>
                                    </div>
                                    <div class="card-header">
                                        <h5>Select Payment Method</h5>
                                    </div>
                                    <hr>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="">Cardholder Name</label>
                                            <input id="card_name" type="text" class="form-control" name="card_name" placeholder="Cardholder Name" style="background-color:#F3F3F3;" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="">Card Number</label>
                                            <input id="card-number" type="number" class="form-control" name="card-number" placeholder="Card Number" style="background-color:#F3F3F3;" required>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label class="">Expiration Date</label>
                                            <input type="text" class="form-control" name="date" style="background-color:#F3F3F3;" placeholder="MM/YY" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="">CVV</label>
                                            <input type="text" class="form-control" name="cvv" placeholder="CVV" style="background-color:#F3F3F3;" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12" style="text-align: center;">
                                            <button type="submit" class="btn  btn-sm btn-success col-sm-12"><strong>Proceed</strong></button>
                                            <button type="submit" class="btn  btn-sm btn-primary col-sm-12"><strong>Pay with <i>PayPal</i></strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </div>

  </main>


@endsection
