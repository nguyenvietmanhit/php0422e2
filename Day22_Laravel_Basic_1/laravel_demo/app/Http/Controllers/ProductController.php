<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //.../public/them-moi-sp
    public function create() {
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
}
