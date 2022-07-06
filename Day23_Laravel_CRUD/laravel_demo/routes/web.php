<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// routes/web.php
// - Khai báo các url
// - Route có sẵn: get, post, put, delete
// Laravel quy định các chức năng thì sẽ sử dụng các phương thức
//tương ứng nào -> tuân theo chuẩn RESTFul API
// get: hiển thị thông tin
// post: insert vào db
// put: update db
// delete: xóa db
// - API: là giao thức giúp các nền tảng khác nhau có thể giao
//tiếp đc với nhau, sử dụng kiểu dữ liệu JSON
// + CẦn 2 route cho chức năng thêm mới sp:
Route::get('them-moi-sp',
    [ProductController::class, 'create']);
Route::post('insert-sp',
    [ProductController::class, 'createSave']);

Route::get('/', function () {
    return view('welcome');
});

// - Route liệt kê sp
Route::get('danh-sach-sp',
    [ProductController::class, 'index']);

// - Route hiển thị form cập nhật:
Route::get('sua-sp/{id}', [ProductController::class, 'edit']);
