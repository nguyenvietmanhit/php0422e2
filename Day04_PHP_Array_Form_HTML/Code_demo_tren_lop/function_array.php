<?php
//function_array.php
// Demo 1 số hàm thao tác cơ bản với mảng:
// + Tính tổng các giá trị của phần tử mảng:
$arrs = [1, 2, 3];
echo array_sum($arrs); //6
// + Kiểm tra mảng có tồn tại phần tử mảng nào theo key
//hay ko:
$infos = [
    'name' => 'manhnv',
    'age' => 32
];
$is_check = isset($infos['name1']); //false
// + Loại bỏ phần tử trùng lặp:
$arrs = [1, 2, 3, 3, 3, 4];
$arr_news = array_unique($arrs);
echo '<pre>';
print_r($arr_news);
echo '</pre>';
// + Đếm số phần tử mảng: count
// + Lấy giá trị của phần tử mảng cuối cùng
$arrs = [1, 2, 3, 4];
echo end($arrs); //4
// + Lấy giá trị của phần tử mảng đầu tiên:
echo reset($arrs); //1
// + Xóa phần tử mảng theo key cho trước:
$infos = [
    'name' => 'manhnv',
    'age' => 32
];
unset($infos['name']);
echo '<pre>';
print_r($infos);
echo '</pre>';