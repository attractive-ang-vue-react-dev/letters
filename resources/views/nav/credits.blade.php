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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                        <h4>Select Quantity</h4>
                        </div>
                        <div class="card-body">
                            <div class=" col-sm-2">
                                <select class="form-control" name="quantity" required>
                                    <option>Quantity1</option>
                                    <option >Quantity2</option>
                                    <option >Quantity3</option>
                                </select>
                                <br>
                            </div>
                            <div class="credit-card col-sm-3">
                                <div class="card-header">
                                    <h5>Credit card detail</h5>
                                </div>
                                <hr>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input id="card-number" type="number" class="form-control" name="card-number" placeholder="Card Number" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="month" type="date" class="form-control" name="month" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" name="year" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="cvv" placeholder="CVV" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>3 or 4 digits usually founds on the signature strip</p>
                                        </div>
                                </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12" style="text-align: center;">
                                            <button type="submit" class="btn  btn-sm btn-success col-sm-12"><strong>Proceed</strong></button>
                                            <button type="submit" class="btn  btn-sm btn-primary col-sm-12"><strong>Pay with <i>PayPal</i></strong></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </main>


@endsection
