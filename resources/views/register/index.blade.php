@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration">
            <form>
                <img class="mb-4 py-2 mx-auto d-block" src="/assets/logo.png" alt="" width="80">
                <h1 class="h3 mb-3 fw-normal text-center">Form Registration</h1>
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="name">
                    <label for="name">Name</label>
                </div>

                <div class="form-floating">
                    <input type="text" name="Username" class="form-control" id="Username" placeholder="Username">
                    <label for="Username">Username</label>
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="name">Email Address</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom" id="password]" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
            <p class="mt-3 mb-2 text-muted text-center">&copy; 2021–2022</p>
        </main>

    </div>
</div>
@endsection