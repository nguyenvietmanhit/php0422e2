<!--form.php-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>Demo input form HTML</title>
    </head>
    <body>
<!--  Form là thẻ bao ngoài các ô nhập liệu   -->
        <form action="" method="get">
            Nhập họ tên:
            <input type="text" placeholder="Nhập họ tên.."
            />
            <br />
            Nhập tuổi:
            <input type="number" value="32" />
            <br />
            Nhập email:
            <input type="email" />
            <br />
            Nhập mật khẩu:
            <input type="password" />
            <br />
            Chọn giới tính:
<!--            Với radio bắt buộc phải set name giống nhau-->
            <input type="radio" name="gender" value="0" /> Nam
            <input type="radio" name="gender" value="1" /> Nữ
            <input type="radio" name="gender" value="2" /> Khác
            <br />
            Chọn nghề nghiệp:
            <input type="checkbox" /> Dev
            <input type="checkbox" /> Tester
            <input type="checkbox" /> BrSE
            <input type="checkbox" /> PM
            <br />
            Chú ý:
            <textarea rows="5" cols="30"
                      placeholder="Nhập chú ý..."></textarea>
            <br />
            Chọn quốc gia:
            <select>
                <option>VN</option>
                <option>KR</option>
                <option>JP</option>
            </select>
            <br />
            Chọn nhiều quốc gia:
            <select multiple>
                <option>VN</option>
                <option>KR</option>
                <option>JP</option>
            </select>
            <br />
            Tải ảnh đại diện:
            <input type="file" />
            <br />
            Tải nhiều ảnh đại diện:
            <input type="file" multiple />
            <br />
<!--            Nút submit form / Nút gửi thông tin -->
            <input type="submit" value="Gửi thông tin" />
            <input type="reset" value="Xóa thông tin" />
        </form>
    </body>
</html>