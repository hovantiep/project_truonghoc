@extends('backend.layouts.dashboard')
@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember Password</label>
                    </div>
                </div>
                <a class="btn btn-primary btn-block" href="index.blade.php">Login</a>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.blade.php">Register an Account</a>
                <a class="d-block small" href="forgot-password.blade.php">Forgot Password?</a>
            </div>
        </div>
    </div>
@endsection
