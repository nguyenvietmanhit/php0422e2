<!--basic_3.php-->
<?php
// 1 - Toán tử:
// 1 + 2 = 3
// số 1 và số 2 gọi là toán hạng
// dấu + là toán tử
// + Toán tử số học
// Cộng +
$number1 = 5;
$number2 = 2;
$result1 = $number1 + $number2;//7
// Trừ -
$result2 = $number1 - $number2; //3
// Nhân *
$result3 = $number1 * $number2; //10
// Chia /
$result4 = $number1 / $number2; //2.5
// Chia lấy phần dư %
$result5 = $number1 % $number2; //1
// Tăng giảm tích lũy ++ --
$age = 32;
++$age; //Tăng lên 1
var_dump($age); //33
// Ví dụ:
// ++ -- đứng sau thì chưa tăng vội, mà phải đi qua mới tăng
// ++ -- đứng trước thì tăng luôn
$number = 5;
$sum = $number++ * $number++;
//   =     5     *    6 = 30
$number = 2;
$sum = --$number - $number++ - ++$number;
//  =      1     -    1      -      3

$x = 5;
$sum = $x++ * ++$x + 2 * --$x % 2;
//   =   5  *   7  + 2 *   6  %  2 = 35
// 35 30 37 30 33

// + Toán tử so sánh: so sánh các biểu thức và trả
//về kiểu boolean
$number1 = 1;
$number2 = 2;
// So sánh bằng ==
$result1 = $number1 == $number2; //false
// So sánh khác !=
$result2 = $number1 != $number2; //true
// So sánh lớn hơn >
$result3 = $number1 > $number2; //false
// So sánh lớn hơn hoặc bằng >=
$result4 = $number1 >= $number2; //false
// So sánh nhỏ hơn <
// So sánh nhỏ hơn hoặc bằng <=
// + Toán tử logic: kết hợp các biểu thức điều kiện
// - Toán tử và AND &&
// true && true = true
// false && true = false
// true && false = false
// false && false = false
$number1 = 2;
$number2 = 3;
$result1 = ($number1 != 0) && ($number2 <= 3); // true
// - Toán tử hoặc OR ||
// true || true = true
// true || false = true
// false || true = true
// false || false  = false
$number = 1;
$result1 = ($number1 > 0) || ($number1 == 2); //true
// - Toán tử phủ định NOT !
// !true = false
// !false = true
$number = 2;
$result1 = !($number == 2); //false
// - Toán tử gán:
// Phép gán =
$number = 2;
// Cộng tích lũy: +=
$number += 3; //$number = $number + 3 = 5
// Trừ tích lũy -=
$number -= 2; //$number = $number - 2 = 3
// Nhân tích lũy *=
$number *= 3; //$number = $number * 3 = 9
// Chia tích lũy /=
$number /= 3; //number = number / 3 = 3
// Chia lấy dư tích lũy %=
$number %= 2; //number = number % 2 = 1


?>