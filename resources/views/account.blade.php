@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
     <div class="card">
      <h5 class="card-header">Account Settings</h5>
      <div class="card-body">

        <form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
          @method('PATCH')
          @csrf

          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Current Password</span>
            </div>
            <input type="text" class="form-control" aria-label="Password" aria-describedby="addon-wrapping" name="password">
          </div>
          <p>Please type your current password before editing any of the values below .</p>
          <br>
          <h4>Change email</h4>
          <hr>
          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Email</span>
            </div>
            <input type="text" class="form-control" aria-label="Email" aria-describedby="addon-wrapping" name="email" value="{{Auth::user()->email}}">
          </div>
          <br>
          <h4>Change password</h4>
          <hr>
          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">New Password</span>
            </div>
            <input type="text" class="form-control" aria-label="Email" aria-describedby="addon-wrapping" name="new_password">
          </div>
          <br>
          <h4>Contact Info</h4>
          <hr>
          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Phone Number 1</span>
            </div>
            <input type="text" class="form-control" aria-label="Email" aria-describedby="addon-wrapping" name="phone_1" value="{{Auth::user()->phone_1}}">
          </div>
          <br>
          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Phone Number 2</span>
            </div>
            <input type="text" class="form-control" aria-label="Email" aria-describedby="addon-wrapping" name="phone_2" value="{{Auth::user()->phone_2}}">
          </div>
          <br>

          <div class="float-right">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
</div>
@endsection
