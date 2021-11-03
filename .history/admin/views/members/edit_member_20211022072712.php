<?php if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select *from members where member_id = ".$id;
    $result = $con->query($query);
    $row_mem = mysqli_fetch_array($result);
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        // kiểm tra xem username có tồn tại trong database không 
        $query = "select *from members where username = '$username'";
        $result = $con->query($query);
        if(mysqli_num_rows($result) != 0){
            echo "<script>alert('Tên đăng nhập không có sẵn, mời chọn một tên đăng nhập khác !')</script>";
        }else{
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $query_register = "insert members(username,password,fullname,mobile,address,email) values('$username','$password','$fullname','$mobile','$address','$email')";
            $resul_register = $con->query($query_register);
            echo "<script>alert('Bạn đã đăng kí thành công tài khoản!!!')</script>";
        }
    }
}
?>
<div class="member">
                    <h2 class="member-title">Chỉnh sửa thông tin thành viên  </h2>
                    <table class="member-table--update">
                        <tbody>
                            <form class="member-form" method="post">
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Tên đăng nhập :</td>
                                  <td class="member-table--td">
                                      <input type="text" name="username" value="<?=$row_mem['name'];?>">
                                    </td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Mật khẩu :</td>
                                  <td class="member-table--td"><input type="password" name="password" value="<?=$row_mem['name'];?>"></td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Số điện thoại :</td>
                                    <td class="member-table--td"><input type="number" name="mobile" id=""></td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Địa chỉ :</td>
                                    <td class="member-table--td"><input type="text" name="address"> </td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Email</td>
                                    <td class="member-table--td"><input type="email" name="email"></td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td"></td>
                                    <td class="member-table--td"><input type="submit" name="update" value="Cập nhật" ><a href="?option=show_member" style="text-decoration: none;">&lt;&lt;Trở lại </a></td>
                                </tr>
                            </form>
                        </tbody>
                      </table>
                </div>