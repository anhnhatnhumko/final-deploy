@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    {{ __('Trang chủ') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <p class="fs-5 text-muted">
                        {{ __('Cảm ơn bạn đã lựa chọn chúng tôi!') }}
                    </p>
                    <p class="mb-0">
                        {{ __('Để xem danh sách sản phẩm, vui lòng truy cập vào trang Sản phẩm từ menu bên trái.') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
