<!--php_basic_2.php-->
<?php
// TIẾP TỤC PHP CƠ BẢN
// 1/ Ép kiểu (cast) dữ liệu: dùng từ khóa là tên kiểu
//dữ liệu trước giá trị cần ép:
$value = 123; // kiểu integer
$var1 = (float) $value; //123
var_dump($var1);
$var2 = (string) $value; //123
// 2 - Hằng
// + Là biến dùng để lưu trữ giá trị, tuy nhiên giá trị
// sẽ ko thể thay đổi sau khi đc sinh ra
// + Nên viết hoa hằng
define('PI', 3.14);
echo PI; //3.14
const AGE = 32; //ưu tiên cách này hơn
// AGE = 100; // báo lỗi gán lại giá trị cho hằng
// + Một số hằng có sẵn trong PHP:
echo __LINE__; // hiển thị dòng code đang gọi tới hằng
echo '<br />';
echo __FILE__; // đường dẫn tuyệt đối/ vật lý
// tới file hiện tại đang gọi
echo '<br />';
echo __DIR__; // đường dẫn tuyệt đối tới thư mục cha
//gần nhất chứa file hiện tại đang gọi hằng
// + Hàm:
// - Là tập các dòng code dùng để xử lý logic nào đó
// - Tính chất quan trọng nhất của hàm là sử dụng lại
// VD: Tính tổng 2 số:
$number1 = 2;
$number2 = 3;
$sum1 = $number1 + $number2; //5

$number1 = 1;
$number2 = 2;
$sum2 = $number1 + $number2; //3

$number1 = 5;
$number2 = 6;
$sum3 = $number1 + $number2; //11
// + Cú pháp khai báo:
// Tên hàm có quy tắc đặt tên như tên biến
function show() {
    echo 'Hàm show';
}
// Cần gọi hàm:
show();
// Quy tắc đặt tên theo kiểu con lạc đà - camel case
function checkNameOfMe() {

}
// + Phân loại hàm:
// - Hàm có sẵn:
var_dump('abc');
echo date('d-m-Y H:i:s');
// - Hàm tự định nghĩa: có 3 kiểu
// + Hàm ko có tham số, ko có giá trị trả về
function hide() {
    echo 'Hàm hide';
}
hide(); //Hàm hide
// + Hàm có tham số, ko có giá trị trả về
// VD: Viết hàm hiển thị tên của ai đó
// Cách xác định tham số: là biến chưa xác định rõ ràng
//giá trị thật của nó khi khai báo hàm
function showName($name) {
    echo "Hi, Tên của bạn là: " . $name;
}
// Gọi hàm: cần truyền giá trị thật cho tham số của hàm
showName('Dự'); //Tên của bạn là Dự
showName('Hằng'); //Tên của bạn là Hằng
showName('Mai'); //Tên của bạn là Mai
// Viết hàm tính tổng 2 số bất kỳ:
// - Xác định tham số: 2 tham số
function sum1($number1, $number2) {
    $sum = $number1 + $number2;
    echo "Tổng 2 số là: " . $sum;
}
sum1(1, 2); //Tổng 2 số là 3
// + Hàm có tham số, có giá trị trả về
// Viết hàm Hiển thị tên của ai đó:
// - Xác định tham số: 1 tham số là tên của ai đó
// - Xác định giá trị trả về của hàm này: string
function showName1($name) {
    $result = "Hi, tên của bạn là: " . $name;
    return $result;
}
// Gọi hàm, với các hàm có dùng return, thì hàm tương
//đương với 1 giá trị nào đó
$result1 = showName1('Dự'); //Hi tên của bạn là Dự
// hàm có giá trị trả về giúp linh hoạt trong việc xử
//lý kết quả trả về của hàm
// Viết hàm Tính tổng 2 số:
// - Tham số của hàm: 2 tham số
// - Giá trị trả về của hàm: integer
function sum2($number1, $number2) {
    $sum = $number1 + $number2;
    return $sum;
    // return thoát khỏi hàm, code phía sau return trong
    //hàm sẽ ko đc chạy
    echo 'đoạn code này có chạy đc?';
}
$sum1 = sum2(1, 2); //$sum1 = 3
//echo $sum1;
var_dump($sum1);
// 4 - Truyền biến tham trị, tham chiếu:
// Viết hàm để thay đổi 1 giá trị bên ngoài hàm
$number = 1;
echo "Trước khi gọi hàm, biến number = : " . $number;
function changeNumber1($num) {
    $num = 100;
    echo "Bên trong hàm biến num = : " . $num;
}
changeNumber1($number);
echo "Sau khi gọi hàm, biến number = " . $number;
// Với cách truyền tham trị, biến tạo bản sao và truyền
//bản sao này vào hàm -> bản gốc ko thay đổi
// -> để bản gốc bị thay đổi bên trong hàm, cần truyền
//tham chiếu cho hàm đó
$number = 1;
echo "Trước khi gọi hàm, biến number = : " . $number;
// Thêm ký tự & trước tên tham số để hàm trở thành
//kiểu truyền tham chiếu
function changeNumber2(&$num) {
    $num = 100;
    echo "Bên trong hàm biến num = : " . $num;
}
changeNumber2($number);
echo "Sau khi gọi hàm, biến number = " . $number;
?>