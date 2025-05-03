@extends('layouts.app')

@section('content')
<div class="page-register-body d-flex align-items-center justify-content-center">
    <div class="card shadow-lg p-4 register-card">
        <h3 class="text-center mb-4 text-primary fw-bold"><i class="bi bi-person-plus"></i> Đăng ký tài khoản</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
        </form>
    </div>
</div>
@endsection
