@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-3">

        <main class="form-signin">
            <form>
                <img class="mb-4 py-2 mx-auto d-block" src="/assets/logo.png" alt="" width="80">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
            <p class="mt-3 mb-2 text-muted text-center">&copy; 2021–2022</p>
        </main>

    </div>
</div>
@endsection