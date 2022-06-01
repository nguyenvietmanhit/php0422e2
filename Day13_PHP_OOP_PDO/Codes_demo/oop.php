<?php
//oop.php
// - Lập trình hướng đối tượng trong PHP
// - OOP - Object Oriented Programming
// 1 - Các phương pháp lập trình:
// + Lập trình tuyến tính/tuần tự: nghĩ gì code nấy
//VD: tính tổng 2 số
$number1 = 1;
$number2 = 2;
$sum = $number1 + $number2;
echo $sum;
// + Lập trình hướng thủ tục/hướng chức năng: hàm
function sum($number1, $number2) {
    $sum = $number1 + $number2;
    return $sum;
}
$sum1 = sum(1, 2);
echo $sum1; //3
$sum2 = sum(2, 3);
echo $sum2;
// + Lập trình hướng đối tượng:
class Number {
    public $number1;
    public $number2;
    public function sum() {
        $sum = $this->number1 + $this->number2;
        return $sum;
    }
}
$obj_number = new Number();
$obj_number->number1 = 3;
$obj_number->number2 = 4;
$sum = $obj_number->sum();
echo "Tổng = $sum";

// - Tính chất của OOP:
// + Thay đổi hoàn toàn tư duy khi tiếp cận bài toán,lấy đối
//tượng làm trọng tâm để phân tích và xử lý bài toán, còn
//với lập trình thủ tục/chức năng lấy chức năng làm trọng tâm.
// VD: với chức năng đăng nhập thì thủ tục tạo 1 hàm để xử lý,
//tuy nhiên với OOP thì lấy đối tượng user làm trọng tâm, từ đối
//tượng này cần phân tích để tìm thuộc tính và phương thức của nó
// + Giúp code phản ánh đúng thực tế hơn, code dễ mở rộng
// + Website hiện này đều viết dựa trên OOP
// - Các thuật ngữ trong OOP: