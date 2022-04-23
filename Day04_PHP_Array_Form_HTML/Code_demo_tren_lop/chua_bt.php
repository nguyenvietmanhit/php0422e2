<?php
// BT: Viết hàm thực hiện
// tính toán cộng trừ nhân chia 2 số bất kỳ
// - Các tham số của hàm nếu có: 3 tham số: 2 số bất
//kỳ + phép tính
// - Hàm này trả về kiểu dữ liệu nào: int / float
// $operation: là tham số phép tính: + - * /
function calculate($number1, $number2, $operation) {
    $result = 0;
    switch ($operation) {
        case '+': $result = $number1 + $number2;break;
        case '-': $result = $number1 - $number2;break;
        case '*': $result = $number1 * $number2;break;
        case '/': $result = $number1 / $number2;break;
    }
    return $result;
}
$res = calculate(1, 2, '+');
var_dump($res); //3