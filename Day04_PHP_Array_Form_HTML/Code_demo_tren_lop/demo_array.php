<?php
//demo_array.php
// - vd: Lưu tên của 500 người, thay vì phải tạo 500 biến
//để lưu thì cần tạo 1 biến duy nhất có kiểu dữ liệu mảng
// - Mảng là 1 kiểu dữ liệu mà có thể lưu đc nhiều giá
//trị tại 1 thời điểm, các giá trị này có thể là bất
//cứ kiểu dữ liệu nào trong PHP
// 1/ Khai báo mảng:
// C1: dùng từ khóa array, hiện nay ít dùng
$names = array('name1', 'name2', 'name3', 'name4');
// C2: dùng cho phiên bản PHP > 5.4 -> ưu tiên dùng
$names = ['name1', 'name2', 'name3', 'name4'];
// Hàm kiểm tra có phải kiểu mảng hay ko:
$is_check = is_array($names); //true
// 2 /Thuật ngữ liên quan đến mảng:
// + Phần tử mảng / Elements
// + Key/Chỉ mục của mảng / Index: vị trí xác định ra
//phần tử mảng. Key của mảng bắt đầu từ 0, chứ ko phải 1
// + Value của phần tử mảng: giá trị của phần tử mảng
//tương ứng
// -> Để xác định đc giá trị của 1 phần tử mảng,
// bắt buộc phải biết key tương ứng của nó
$numbers = [1, 2, 3, 4, 5, 6];
// Debug mảng bằng cách sau để nhìn rõ key của từng
//phần tử mảng
echo '<pre>';
print_r($numbers);
echo '</pre>';
// - Lấy giá trị thủ công của từng phần tử mảng:
$numbers = [1, 2, 3, 4, 5, 6];
echo $numbers[5]; //6
echo $numbers[1]; //2
//echo $numbers[6]; //
// 3 / Vòng lặp foreach:
$numbers = [1, 2, 3, 4, 5, 6];
// Thay vì lấy thủ công, nếu muốn thao tác trên toàn
//bộ phần tử mảng thì nên áp dụng cách duyệt mảng sử
//dụng vòng lặp
// + Dùng for để lặp mảng:
// LẤy số phần tử mảng:
$count = count($numbers); //6
for ($key = 0; $key < 6; $key++) {
    echo $numbers[$key];
}
// + Dùng vòng lặp foreach: là vòng lặp PHP xây dựng sẵn
//chuyên dùng cho duyệt mảng, mỗi khi lặp qua từng
//phần tử mảng, biết đc luôn key và value tương ứng
//của từng phần tử mảng, thể hiện ra thành biến cho bạn
//sử dụng
$numbers = [1, 2, 3, 4, 5, 6];
//foreach dạng đầy đủ cả key value
foreach ($numbers AS $key => $value) {
    echo "<br />";
    echo "Phần tử mảng có key = $key, giá trị = $value";
}
// foreach khuyết key
foreach ($numbers AS $value) {
    echo "<br /> Value = $value";
}
// 4 / Phân loại mảng:
// + Mảng tuần tự/Mảng số nguyên: là mảng mà tất cả key
//đều là số nguyên
$numbers = [2, 3, 4];
echo '<pre>';
print_r($numbers);
echo '</pre>';
// + Mảng kết hợp: là mảng mà key xuất hiện ở dạng chuỗi
// Khi khai báo nên viết mỗi 1 phần tử trên 1 hàng
$infos = [
    //phần tử mảng đầu tiên, key=name, value=manhnv
    'name' => 'manhnv',
    'age' => 32,
    'address' => 'HN'
];
echo '<pre>';
print_r($infos);
echo '</pre>';
foreach ($infos AS $k => $v) {
    echo '<br />';
    echo "Key: $k, Value: $v";
}
// + Mảng đa chiều: mảng trong mảng
// Mảng 3 chiều
$arrs = [
    'name' => 'php0422e2',
    'info' => [
        'amount' => 34,
        'address' => 'Hà Nội',
        'test' => [1, 2, 3]
    ]
];
// Lấy giá trị thủ công trong mảng đa chiều:
echo $infos['info']['amount']; //34
echo $infos['info']['test'][2]; //3
// 5 / Thực hành
// Bài tập 3
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Tên khóa học</th>
    </tr>
    <?php foreach($arrs AS $name): ?>
        <tr>
            <td><?php echo $name; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

