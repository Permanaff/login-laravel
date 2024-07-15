
@extends('layout/layout')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-5">
        <div class="mt-5"></div>
        @if (session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau Password Salah! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mt-2"></div>
        
        <div class="card card-login rounded-0 shadow-sm">
            <div class="card-body">
                <form action="{{ url('/') }}" method="POST">
                    @csrf
                    <p class="fs-2 fw-bold my-2 text-center">Login</p>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control rounded-0" id="email" placeholder="Masukkan Email" name='email' value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control rounded-0" id="password" placeholder="Masukkan Password" name='password' required>
                    </div>
    
                    <button class="btn btn-primary w-100 fw-bold my-2" type="submit">Login</button>
                    <p class="text-center my-2">Belum Memiliki Akun? <span><a href="{{ url('register') }}" style="text-decoration: none">Daftar</a></span></p>
                </form>
            </div>
        </div>
    </div>  
</div>
@endsection
