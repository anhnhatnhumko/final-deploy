@extends('layouts.app')

@section('content')
<div class="page-add-product">
<h2>Thêm sản phẩm</h2>

<form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
    @csrf
    <label for="name">Tên sản phẩm:</label>
    <input type="text" id="name" name="name" required>

    <label for="price">Giá:</label>
    <input type="number" id="price" name="price" required>

    <label for="category">Danh mục:</label>
    <input type="text" id="category" name="category" required>

    <label for="description">Mô tả:</label>
    <textarea id="description" name="description"></textarea>

    <label for="stock">Số lượng:</label>
    <input type="number" id="stock" name="stock" required>

    <label for="image">Hình ảnh:</label>
    <input type="file" id="image" name="image" required>

    <button type="submit">Thêm sản phẩm</button>
</form>
</div>
@endsection
