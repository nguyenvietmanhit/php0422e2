<!--basic_continue.php-->
<?php
// 1/ Câu lệnh điều kiện:
// - Là các điều kiện để thực hiện 1 logic nào đó dựa
//theo điều kiện đó
// - Từ khóa: if, else, else if, switch case
// + Câu lệnh if: áp dụng cho 1 trường hợp duy nhất
// khi điều kiện đúng
$number = 5;
if ($number % 2 != 0) {
    echo "Là số lẻ";
}
// + Câu lệnh if else: xử lý 2 trường hợp, khi điều kiện
//đúng và sai thì sẽ làm gì
if ($number % 2 != 0) {
    echo 'Là số lẻ';
} else {
    echo 'Là số chẵn';
}
// + Câu lệnh if elseif ... else
// VD: phân loại học lực dựa vào điểm: giỏi, khá, tb,
//yếu, và các trường hợp còn lại
$point = 11;
if ($point >= 8 && $point <= 10) {
    echo 'Giỏi';
} elseif ($point >= 6.5 && $point < 8) {
    echo 'Khá';
} elseif ($point >= 5 && $point < 6.5) {
    echo 'TB';
} elseif ($point >= 3.5 && $point < 5) {
    echo 'Yếu';
} else {
    echo 'Không phải giỏi, khá, tb, yếu';
}
// Toán tử điều kiện, là cú pháp viết gọn cho câu lệnh
//if else chỉ khi logic đơn giản
$number = 3;
if ($number > 0) {
    echo 'Number > 0';
} else {
    echo 'Number <= 0';
}
// Sử dụng toán tử điều kiện
echo $number > 0 ? 'Number > 0' : 'Number <= 0';
// + Biểu thức switch case
// VD: hiển thị ngày tương ứng dựa vào ngày bằng số
$day = 2;
switch ($day) {
    case 2: echo 'Thứ hai';break;
    case 3: echo 'Thứ ba';break;
    case 4: echo 'Thứ tư';break;
    default: echo 'Không phải thứ 2, 3, 4';
}
// Chú ý sau mỗi case thêm từ khóa break để thoát
//switch case khi tìm đc case đúng
// - Viết bằng if elseif
$day = 2;
if ($day == 2) {
    echo 'Thứ hai';
} elseif ($day == 3) {
    echo 'Thứ ba';
} elseif ($day == 4) {
    echo 'Thứ tư';
} else {
    echo 'Không phải thứ 2, 3, 4';
}
// Lợi thế của switch case so với if elseif là dễ đọc
//code hơn
// Tuy nhiên switch case chỉ dùng đc với so sánh bằng
// 2 - Vòng lặp
// + Lặp đi lặp lại 1 logic giống nhau
// VD: hiển thị 500 lần đoạn text "500 ae"
// + Vòng lặp for: vòng lặp xác định trước số lần lặp
// $i = 1 -> biến khởi tạo vòng lặp
// $i <= 10 -> điều kiện lặp
// $i++ -> thay đổi biến khởi tạo vòng lặp, tránh vòng
//lặp vô hạn bằng cách làm cho điều kiện lặp bị false
//sau 1 số lần lặp nào đó
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
//12345678910
// + while: vòng lặp ko xác định trc số lần lặp
$j = 1;
while ($j <= 10) {
    echo $j;
    $j++;
}
//12345678910
// + do while: giống while tuy nhiên code luôn luôn chạy
//ít nhất 1 lần cho dù điều kiện bị sai ngay từ đầu
$number = 5;
do {
    echo 'Logic này có chạy đc ko?';
} while ($number < 0);

// 3 - Từ khóa break, continue trong vòng lặp
// + Break: thoát hẳn vòng lặp, ko thực thi code phía
//sau từ khóa break
echo '<br />';
for ($i = 1; $i <= 10; $i++) {
    if ($i >= 6) {
        break;
    }
    echo $i;
}
//12345
// + Continue: bỏ qua lần lặp hiện tại, nhảy tới lần lặp
//kế tiếp
for ($i = 1; $i <= 10; $i++) {
    if ($i == 3) {
        continue;
    }
    echo $i;
}
// 1245678910

//bỏ qua lần lặp hiện tại -> ko chạy code sau continue

// 20h00
// Demo bài tập
// + Viết hàm kiểm tra số nguyên tố:
// - Xác định tham số của hàm: 1 tham số
// - Xác định kiểu dữ liệu trả về của hàm: boolean
function isPrime($number) {
    // Thuật toán: cho chạy 1 vòng lặp từ 2 đến số
    //cần kiểm tra, nếu tại thời điểm lặp nào mà số
    //đó chia hết cho biến lặp -> ko phải số nguyên tố
    $is_prime = true;
    // Tối ưu thuật toán cho logic này
    // Ví dụ cần ktra số 15
    // Tối ưu hơn bằng cách nếu như phát hiện chia hết
    //, thì dừng vòng lặp
    // Chứng mình chỉ cần lặp từ 2 đến căn bậc 2 của số
    //đó là đủ
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $is_prime = false;
            break;
        }
    }
    return $is_prime;
}
$check1 = isPrime(9);
var_dump($check1); //
?>