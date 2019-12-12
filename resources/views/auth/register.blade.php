@extends('layouts.main')

@section('content')





<div class="logo">
  <img src="/logo.png">
</div>

<h1 class="sub-logo">Letters</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="login-form">
                <div class="form-container">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-header col-sm-12" style="text-align:center;">
                            <img src="/login.png" id="profile-img-tag" style="width: 20%;border-radius:50%;">
                            <div class="state">
                                <input type="file" name="file" id="file" accept="image/gif, image/jpeg, image/png" name="image" id="file"  class="inputfile" />
                                <label for="file">Choose Image</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="addr_line_1" type="text" class="form-control @error('addr_line_1') is-invalid @enderror" name="addr_line_1" value="{{ old('addr_line_1') }}" required autocomplete="addr_line_1" autofocus placeholder="Address Line 1">
                                @error('addr_line_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="addr_line_2" type="text" class="form-control @error('addr_line_2') is-invalid @enderror" name="addr_line_2" value="{{ old('addr_line_2') }}" autocomplete="addr_line_2" autofocus placeholder="Address Line 2">
                                @error('addr_line_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="City">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus placeholder="State">
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="postal" type="text" class="form-control @error('postal') is-invalid @enderror" name="postal" value="{{ old('postal') }}" required autocomplete="postal" autofocus placeholder="ZIP Code">

                                @error('postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12" style="text-align: center;">
                                <button type="submit" class="btn  btn-sm btn-danger col-md-12" style="margin-left:0px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                <a href="/login">Already have an account?</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-12">
                </div>
            </div>
            <div class="col-md-12">
                <a class="btn btn-sm btn-primary"style="margin-left:6%; margin-right:6%;width: 87%;background-color: white; color:#2c2c2c;"href="/">
                <img src="google.svg" style="width:8%;">
                Sign Up with Google</a>
                <p style="margin-left:6%; margin-right:6%;font-size:14px; color:white;text-align:center;">By creating an account, you agree to the Terms of Service, and Privacy Policy.</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function(){
        readURL(this);
    });
</script>

@endsection
