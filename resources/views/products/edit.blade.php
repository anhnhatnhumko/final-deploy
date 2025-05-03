@extends('layouts.app')

@section('content')
<div class="page-content-edit">
    <div class="dashboard-nav">Sửa sản phẩm</div>

    <div class="container">
        <h2 class="title">Chỉnh sửa sản phẩm</h2>

        <form action="{{ route('products.update', [$product->id]) }}" method="POST" enctype="multipart/form-data" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Giá ($):</label>
                <input type="number" step="0.01" name="price" class="form-input" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group">
                <label for="category">Loại sản phẩm:</label>
                <input type="text" name="category" class="form-input" value="{{ old('category', $product->category) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" class="form-input" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="stock">Số lượng:</label>
                <input type="number" name="stock" class="form-input" value="{{ old('stock', $product->stock) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" name="image" class="form-file">
                @if ($product->image)
                    <div class="product-image">
                        <p>Ảnh hiện tại:</p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh hiện tại" width="150px">
                    </div>
                @endif
            </div>

            <div class="button-group">
                <button type="submit" class="btn update">Cập nhật</button>
            </div>
        </form>

        <!-- Nút Xóa -->
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form" onsubmit="return confirmDelete();">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn delete">Xóa sản phẩm</button>
        </form>

        <a href="{{ route('products.index') }}" class="back-link">Quay lại</a>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
}
</script>
@endsection
