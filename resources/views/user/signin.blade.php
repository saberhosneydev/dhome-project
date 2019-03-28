@extends('../layouts.join')

@section('customHeader')
<link rel="stylesheet" href="{{ asset('css/join.css') }}">
@endsection


@section('content')
<div class="row">
    <div class="col offset-2">
        <div class="signBox mb-4 mt-4">
            <div class="row" style="height: inherit;">
                <div class="col signImage"></div>
                <div class="col-8 pl-5">
                 <p class="h4 mt-3">Ready to Sign In ? Nina</p>
                 <form method="POST" action="/login">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="/register">Don't have account ? Signup now.</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-2"></div>
</div>

@endsection