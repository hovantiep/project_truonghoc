@extends('backend.layouts.dashboard')
@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <div class="text-center mt-4 mb-5">
                <h4>Forgot your password?</h4>
                <p>Enter your email address and we will send you instructions on how to reset your password.</p>
            </div>
            <form>
                <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp"
                           placeholder="Enter email address">
                </div>
                <a class="btn btn-primary btn-block" href="login.blade.php">Reset Password</a>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.blade.php">Register an Account</a>
                <a class="d-block small" href="login.blade.php">Login Page</a>
            </div>
        </div>
    </div>
@endsection
