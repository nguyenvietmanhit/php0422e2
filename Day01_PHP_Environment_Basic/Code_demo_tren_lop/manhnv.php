<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d-m-Y H:i:s');
// Cách chạy code PHP, localhost tương đương với
//thư mục htdocs của xampp
// http://localhost/php0422e3_demo/manhnv.php
// Kiến thức PHP căn bản:
// 1 - Biến: là vùng nhớ của máy tính để lưu trữ giá
//trị, giá trị có thể thay đổi đc
// Cú pháp khai báo biến:
$name = 'manhnv';
// Quy tắc khai báo tên biến:
// + Tên biến chỉ có thể bắt đầu bằng chữ hoặc _
// $1name = '';
// + Tên biến nên có ý nghĩa
$address = 'hn';
$age = 32;
//$x = 1;
//$y = 2;
$number1 = 1;
$number2 = 2;
// + Tên biến ko đc chứa ký tự đặc biệt
//$*name = 'manhnv';
// + PHP phân biệt hoa thường với biến:
$name = 'manhnv';
$naMe = 'manhnv';
// 2 - Kiểu dữ liệu trong PHP:
// Extension: laban + google translate
// + integer: số nguyên
$number1 = 123;
$number2 = -123;
var_dump($number1); //int(123)
// + float: số thực
$number1 = 1.23;
var_dump($number1);//float(1.23)
// + string: chuỗi, được bao bởi nháy đơn hoặc kép
$string1 = 'string 1';
$string2 = "123";
var_dump($string2);
//+ boolean: đúng / sai, chỉ gồm 2 giá trị true / false
$bool1 = true;
$bool2 = false;
var_dump($bool1); //bool(true)
// -> Kiểu dữ liệu integer, float, string, boolean
//gọi là kiểu dữ liệu nguyên thủy
// + null: chỉ có 1 giá trị duy nhất là null
$n1 = null;
// + array: kiểu mảng
// + object: kiểu đối tượng
?>
