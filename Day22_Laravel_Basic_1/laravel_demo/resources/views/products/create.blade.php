{{--resources/views/products/create.blade.php--}}
@extends('layouts/main')

@section('page_title', 'Form thêm mới sản phẩm')

@section('content')
    <h2>Form thêm mới sp</h2>
    <form method="post" action="{{ url('insert-sp') }}">
        @csrf
        Tên sp:
        <input type="text" name="name" value="" />
        <br />
        Giá sp:
        <input type="text" name="price" value="" />
        <br />
        <input type="submit" name="submit" value="Lưu sp" />
        <a href="{{ url('danh-sach-sp') }}">Về trang danh sách</a>
    </form>
@endsection()
