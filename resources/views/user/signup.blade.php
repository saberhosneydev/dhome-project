@extends('../layouts.join')

@section('customHeader')
    <link rel="stylesheet" href="{{ asset('css/join.css') }}">
    @endsection


@section('content')
    <div class="row">
        <div class="col offset-2">
            <div class="signBox mb-4 mt-4" style="height: 500px;">
                <div class="row" style="height: inherit;">
                    <div class="col signImage"></div>
                    <div class="col-8 pl-5">
                        <p class="h4 mt-3">SignUp now? Nina</p>
                        <form method="POST" action="/register">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="/login">Already a user ? signIn instead.</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection