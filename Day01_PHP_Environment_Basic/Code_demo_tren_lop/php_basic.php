<?php
//php_basic.php
//Day01_PHP_Environment_Basic/Code_demo/php_basic.php
// - Comment trong PHP
/**
 * comment nhiều dòng
 */
// Dùng phím tắt Ctrl /
//abcdef
// 1 - Biến: dùng để lưu trữ giá trị, giá trị có thể
//thay đổi bất cứ lúc nào - biến đổi
// + Cú pháp khai báo biến: $<tên-biến> = <giá-trị>
$name = 'manhnv';
$age = 32;
$address = 'Hoài Đức - Hà Nội';
// Hiển thị gì đó ra màn hình: child theme
// 2 extension cài cho trình duyệt: laban và google
//translate
// Hiển thị gì đó ra màn hình:
echo 'Hello World';
echo $name;
echo '<h1>Heading 1</h1>';
// + Quy tắc khai báo biến:
//Bắt buộc ký tự đầu tiên phải là $, theo sau là tên biến
//Tên biến bắt buộc ký tự đầu tiên phải là chữ hoặc _
//Tên biến ko đc chứa các ký tự đặc biệt
//Tên biến nên có tính gợi nhớ, tránh $x $y -> $number1
// PHP là phân biệt hoa thường
//$name;
//$Name;
//name;
//$1name = 'manhnv';
$_name = 'manhnv';
//$*name = 'manhnv';
// + Các kiểu dữ liệu trong PHP:
// - integer/int: kiểu số nguyên
$number1 = 123;
var_dump($number1); //int(123)
// - float/double: kiểu số thực, là số thập phân
$number2 = 1.23;
var_dump($number2); // float(1.23)
// - string: kiểu chuỗi, giá trị đc bao bởi cặp dấu
//nháy đơn hoặc nháy kép
$string1 = 'String 1';
$string2 = "String 2";
$string3 = "Hello 'manhnv' ";
echo $string3;
var_dump($string3); //string
// - Boolean: kiểu đúng sai, chỉ có 2 giá trị true hoặc
//false
$bool1 = true;
$bool2 = false;
$bool3 = TRue;
var_dump($bool1);
// Bốn kiểu dữ liệu integer, float, string, boolean
// là kiểu dữ liệu nguyên thủy
// - null: kiểu dữ liệu đặc biệt, chỉ có 1 giá trị
//duy nhất là null
$n1 = null;
// - array:  kiểu mảng
// - object: kiểu đối tượng
?>