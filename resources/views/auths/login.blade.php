@extends('layouts.auth-layout')

@section('auth-content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="col-4 offset-4">
    <h3 class="login__font-tittle text-center login__form-bottom animate__animated animate__backInRight">Account Log In
    </h3>
    @if ($message = Session::get('failed'))

          <div class="alert alert-failed">

              <p>{{ $message }}</p>

          </div>

    @endif
    <form method="post">
        @csrf
        <!-- Phone input -->
        <div class="form-outline login__form-bottom">
            <input type="text" name="email" id="form2Example1" class="form-control login__border" />
            <label class="form-label login__font" for="form2Example1">Email</label>
        </div>

        <!-- Password input -->
        <div class="form-outline login__form-bottom">
            <input type="password" name="password" id="form2Example2" class="form-control login__border" />
            <label class="form-label login__font" for="form2Example2">Password</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-outline-light btn-block login__form-bottom">Log In</button>

        <!-- Register buttons -->
        <div class="text-center login__color">
            <p>You don't have an account yet? <a href="/auth/register" class="login__font">Register now</a></p>
            <p>Or log in using social media:</p>
            <button type="button" class="btn btn-outline-light btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-outline-light btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-outline-light btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-outline-light btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
</div>
@endsection