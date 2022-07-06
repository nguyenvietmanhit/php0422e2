<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Thêm các input trong form mà ko phải tên trường trong bảng
    protected $guarded = ['_token'];
}
