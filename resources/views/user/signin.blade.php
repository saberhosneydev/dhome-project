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
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/join/signup">Don't have account ? Signup now.</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>

@endsection