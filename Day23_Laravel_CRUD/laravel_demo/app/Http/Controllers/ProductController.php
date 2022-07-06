<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //.../public/them-moi-sp
    public function create(Request $request) {
        // Cần tạo cấu trúc thư mục view cho sản phẩm:
        // resources/views
        //                /layouts/main.blade.php
        //                /products/
        //                         /create.blade.php
        //                         /update.blade.php
        //                         /index.blade.php

        // - Controller gọi View: hàm view cơ chế giống hệt
        //hàm render MVC thuần
        return view('products/create');
    }

    public function createSave(Request $request) {
        // - Controller xử lý submit form
        // + Validate form
        $rules = [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric']
        ];
        $messages = [
            'name.required' => 'Tên phải nhập',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giá phải là số'
        ];
        // Validate form:
        $request->validate($rules, $messages);
        // - Controller gọi Model insert dữ liệu:
        // + Laravel có 2 cơ chế truy vấn CSDL:
        // Query Builder: thiên về viết truy vấn thuần
        // Eloquent: dùng model
        // + Insert 1 lần toàn bộ các trường trong form, với điều
        //kiện name của input phải trùng với tên trường
        $datas = $request->all();
        // Fake dữ liệu cho trường avatar, description
        $datas['avatar'] = 'abc.png';
        $datas['description'] = 'description';
        dump($datas);
        $product = Product::create($datas);
        if (!empty($product)) {
            session()->put('success', 'Thêm thành công');
        } else {
            session()->put('error', 'Thêm thất bại');
        }
        return redirect('danh-sach-sp');

    }

    //public/danh-sach-sp
    public function index() {
        // - Controller gọi Model
        // Lấy dữ liệu theo cơ chế phân trang của Laravel
        $products = Product::paginate(1);
        // - Controller gọi View:
        return view('products/index', [
            'products' => $products
        ]);
    }

    //public/sua-sp/3
    public function edit($id) {
        dump($id);
    }
}
