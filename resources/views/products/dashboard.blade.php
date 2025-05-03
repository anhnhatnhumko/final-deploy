@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-dashboard">
        <h2>Danh sách sản phẩm</h2>

        <!-- Bộ lọc sản phẩm -->
        <div class="search-filter-container">
            <form method="GET" action="{{ route('products.index') }}" class="filter-form">
                <label for="min_price">Giá từ:</label>
                <input type="number" name="min_price" value="{{ request('min_price') }}" step="0.01">

                <label for="max_price">đến:</label>
                <input type="number" name="max_price" value="{{ request('max_price') }}" step="0.01">

                <label for="category">Loại sản phẩm:</label>
                <input type="text" name="category" value="{{ request('category') }}">

                <button type="submit" class="btn filter-btn">Lọc</button>
                <a href="{{ route('products.index') }}" class="btn reset-btn">Reset</a>
            </form>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="product-container">
            @php $count = 0; @endphp
            @forelse($products as $product)
                @php $count++; @endphp
                <div class="product-card">
                    <img src="{{ asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p class="price">${{ number_format($product->price, 2, '.', ',') }}</p>
                    <p class="category">{{ $product->category }}</p>
                    <div class="actions">
                        <a href="{{ route('products.edit', $product->id) }}" class="edit-btn">Sửa</a>
                    </div>
                </div>
            @empty
                <p class="no-products">Không có sản phẩm nào.</p>
            @endforelse

            @while($count < 4)
                <div class="product-card empty-card"></div>
                @php $count++; @endphp
            @endwhile
        </div>

        <!-- Phân trang (dưới cùng) -->
        <div class="custom-pagination">
    @if ($products->onFirstPage())
        <span class="disabled">← Trước</span>
    @else
        <a href="{{ $products->previousPageUrl() }}{{ request()->getQueryString() ? '&' . http_build_query(request()->except('page')) : '' }}">← </a>
    @endif

    <span>Trang {{ $products->currentPage() }} / {{ $products->lastPage() }}</span>

    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}{{ request()->getQueryString() ? '&' . http_build_query(request()->except('page')) : '' }}"> →</a>
    @else
        <span class="disabled">Tiếp →</span>
    @endif
</div>


        <!-- Nút thêm sản phẩm -->
        <a href="{{ route('products.create') }}" class="floating-btn">
            ➕
        </a>
    </div>
</div>
@endsection
