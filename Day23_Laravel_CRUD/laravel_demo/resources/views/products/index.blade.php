{{--views/products/index.blade.php--}}
@extends('layouts/main')
@section('page_title', 'Danh sách sp')

@section('content')
    <a href="{{ url('them-moi-sp') }}">Thêm mới sp</a>
    <h2>Danh sách sp</h2>
    <table class="table table-hover">
        <tr>
            <th>Tên</th>
            <th>Giá</th>
            <th></th>
        </tr>
        @foreach($products AS $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }} vnđ</td>
                <td>
                    <a href="sua-sp/{{ $product['id'] }}">Sửa</a>
                    <a href="xoa-sp/{{ $product['id'] }}" onclick="return confirm('Xóa>')">
                        Xóa
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@endsection()
