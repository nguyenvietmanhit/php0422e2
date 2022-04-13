<?php
//function.php
// Demo 1 số hàm có sẵn của PHP xử lý chuỗi, số,
//và thời gian
// - Hàm thao tác với chuỗi
// + Nối chuỗi trong PHP: .
$str1 = 'Hello';
$str2 = ' manhnv';
echo $str1 . $str2; //Hello manhnv
// + Trả về độ dài của chuỗi:
$length = strlen('abc'); //3
// + Trả về chuỗi ký tự hoa
$str = 'hello manhnv';
$result = strtoupper($str); //HELLO MANHNV
// + Trả về chuỗi ký tự thường
$str = 'MANHNV';
$result = strtolower($str); //manhnv
// + Viết hoa ký tự đầu tiên của chuỗi
$str = 'hello manhnv';
$result = ucfirst($str); //Hello manhnv
// + Tìm kiếm và thay thế chuỗi:
$str = 'hello abc abc abc';
$search = 'abc';
$replace = 'def';
$result = str_replace($search, $replace, $str);
//hello def def def
// - Hàm thao tác với số:
// + Kiểm tra phải kiểu số hay ko:
$number = '12345';
$result = is_numeric($number); //
var_dump($result);
// + Kiểm tra số nguyên
$result = is_int(12.3); //false
// + Làm tròn số dựa theo phần thập phân
$result = round(14.78); //15
$result = round(14.78, 1); //14.8
var_dump($result);
// + Làm tròn lên số nguyên gần nhất
$result = ceil(-1.67);//-1
// + Làm tròn xuống số nguyên gần nhất
$result = floor(1.37); //1
// + Tìm max, min
$result = min(2, 4, 3); //2
$result = max(1, 2, 3); //3
// + Format định dạng số:
echo number_format(1000000);
echo "<br />";
echo number_format(4000000,
    0, '.', '.');
// - Hàm thao tác với thời gian:
// + Set múi giờ:
date_default_timezone_set('Asia/Ho_Chi_Minh');
// + Format thời gian hiện tại:
echo date('d-m-Y H:i:s');
// + Trả về số giây tính từ thời điểm hiện tại so
//với 01-01-1970
echo time(); //