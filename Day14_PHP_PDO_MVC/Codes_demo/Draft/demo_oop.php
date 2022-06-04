<?php
//demo_oop.php
// Các thuật ngữ trong OOP
// - Lớp / class
// + Là khuôn mẫu để sinh ra các đối tượng
// + Lớp và đối tượng luôn đi đôi với nhau
// + Lớp là 1 bản vẽ thiết kế trên giấy của 1 ngôi nhà,
// từ bản vẽ này xây đc ngôi nhà Dự, ngôi nhà PHương ... -> các
//ngôi nhà cụ thể này là các đối tượng
// + Cú pháp: quy tắt đặt tên class: viết hoa ký tự đầu tiên
// của từng từ
class Person1 {
}
class YourName {
}
// - Đối tượng / object
// + Là thể hiện cụ thể của 1 class
// + Là nhân tố chính để phân tích 1 chức năng, 1 obj có
//đặc điểm/thuộc tính và hành vi/phương thức
// + Cú pháp:
$obj1 = new Person1();
$obj2 = new Person1();
// - Thuộc tính của lớp:
// + Là các biến đc khai báo bên trong class
// + Có phạm vi truy cập trc tên thuộc tính
class User1 {
    public $fullname;
    public $age;
    public $address;
}
$obj1 = new User1();
// Cách đối tượng truy cập thuộc tính: ->
$obj1->fullname = 'manhnv';
$obj1->age = 32;
$obj1->address = 'HN';

$obj2 = new User1();
$obj2->fullname = 'abc';
$obj2->age = 10;
$obj2->address = 'DEF';
// + Phương thức của lớp:
// - Là hàm đc khai báo bên trong class
// - Có phạm vi truy cập trc khai báo
class User2 {
    public function add() {
        echo 'add';
    }
    public function edit($id) {
        echo "Edit $id";
    }
    public function delete($id) {
        echo "Delete $id";
    }
}
$obj = new User2();
$obj->add(); //add
$obj->edit(3); // Edit 3
$obj->delete(4); //Delete 4
// + Phương thức khởi tạo:
// - Được dùng để khởi tạo giá trị cho thuộc tính của class đó
// - Tự động đc chạy ngay khi có 1 đối tượng sinh ra từ class
class User3 {
    public function __construct() {
        echo "Code tự động chạy mà ko cần gọi";
    }
    public function check() {
        echo 'Check';
    }
}
$obj = new User3();
$obj->check(); //Check
// + Phương thức khởi tạo có tham số truyền vào
class User4 {
    public function __construct($name) {
        echo "<br />Name = $name";
    }
}
$obj = new User4('manhnv'); //Name = manhnv
// - Từ khóa this: tham chiếu đến đối tượng hiện tại
class User5 {
    public $name;
    public $address;
    public function showName() {
        // this tham chiếu đến chính class hiện tại, để truy cập
        //TT/PT của chính class sẽ phải dùng this
        echo "<br />Tên: $this->name";
    }
}
$obj = new User5();
$obj->name = 'manhnv';
$obj->showName(); // Tên: manhnv
// - Phạm vi truy cập:
// + Là từ khóa đứng trên TT/PT, gán quyền truy cập cho TT/PT
// + Có 3 từ khóa: private, protected, public
// + private: chỉ truy cập đc bên trong class, bên ngoài sẽ ko
//truy cập đc
class User6 {
    private $fullname;
    private function showFullname() {
        echo $this->fullname; //truy cập ok vì đang ở trong class
    }
}
$obj = new User6();
// $obj->fullname = 'abc'; //báo lỗi ko truy cập đc
// $obj->showFullname(); // báo lỗi ko truy cập đc
// + protected: truy cập đc bên trong class và trong class kế thừa,
//bên ngoài class ko truy cập đc
class User7 {
    protected $fullname;
    protected function showFullname() {
        echo $this->fullname; //truy cập ok
    }
}
class A extends User7 {
    public function test() {
        //$this tham chiếu đến cả class con và cha
        echo $this->fullname; //ok
        $this->showFullname(); //ok
    }
}
$obj = new User7();
// $obj->fullname = 'abc'; //báo lỗi ko truy cập đc
// $obj->showFullname(); //báo lỗi ko truy cập đc
// + public: ở đâu cũng truy cập đc
// - Từ khóa static:
// + Đứng sau phạm vi truy cập, đứng trc tên TT/PT, làm cho
//TT/PT thành kiểu tĩnh
// + TT/PT tĩnh đc truy cập trực tiếp theo tên class mà ko cần
//thông qua bước khởi tạo đối tượng
class User8 {
    public static $fullname;
    public static function show() {
        echo 'show';
    }
}
User8::$fullname = 'manhnv';
User8::show();
// - Từ khóa extends:
// + Thể hiện tính kế thừa của OOP
// + PHP hỗ trợ đơn kế thừa
// + Class con kế thừa tất cả PT/TT của class cha ở 2 phạm vi
//truy cập là protected + public
class Person2 {
    public $name;
    public $age;
    public function run() {
        echo 'run';
    }
}
class Student1 extends Person2 {
    public $id;
    public function test() {
        //truy cập ok vì tính kế thừa
        echo $this->name;
        echo $this->age;
        $this->run();
    }
}
// - abstract:
// + Tạo ra class trừu tượng, tạo ra class cha cho tất cả class
//con có cùng bản chất
// + Không thể tạo đối tượng từ class trừu tượng
// + Có phương thức trừu tượng, là PT ko có nội dung
// + Class con kế thừa từ class trừu tượng bắt buộc phải định
//nghĩa cụ thể nội dung cho phương thức trừu tượng
abstract class Person3 {
    public $name;
    public $age;
    public function show() {
        echo 'show';
    }
    abstract public function test();
}
class User9 extends Person3 {
    public function test() {
        echo 'User9 test';
    }
}
// - interface:
// + Dùng để dựng ra khung các phương thức ko có nội dung
// + KO thể khai báo TT/PT bình thường trong interface
// + Class mà implements interface bắt buộc phải định nghĩa
//cụ thể các phương thức trong interface
// + 1 class có thể thực thi nhiều interface
interface Config {
    public function sendMail();
    public function receiveMail();
}
class B implements Config {
    public function sendMail() {
        echo 'b sendmail';
    }
    public function receiveMail() {
        echo 'b receiveMail';
    }
}
// 2 - Bốn tính chất của OOP
// + Tính trừu tượng
// + Tính đóng gói
// + Tính kế thừa
// + Tính đa hình