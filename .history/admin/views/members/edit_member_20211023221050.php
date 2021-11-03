<?php
 if(isset($_GET['id'])){
     $id = $_GET['id'];
     $query ="select *from members where member_id = ".$id;
     $result = $con->query($query);
     $row_mem = mysqli_fetch_array($result);
     if(isset($_POST['username'])){
         $username = $_POST['username'];
         $query = "select *from members where username = '$username'";
         $result = $con->query($query);
         if(mysqli_num_rows($result) !=0){
             echo "<script>alert('Tên đăng nhập không có sẵn, mời bạn chọn tên đăng nhập khác ')</script>";
         }else{
             $password = $_POST['password'];
             $fullname = $_POST['fullname'];
             $mobile = $_POST['mobile'];
             $address = $_POST['address'];
             $email = $_POST['email'];
             $query_edit ="UPDATE members SET ("
         }
     }
 }
?>
<div class="member">
    <h2 class="member-title">Chỉnh sửa thông tin thành viên </h2>
    <table class="member-table--update">
        <tbody>
            <form class="member-form" method="post">
                <tr class="member-table--tr">
                    <td class="member-table--td">Tên đăng nhập :</td>
                    <td class="member-table--td">
                        <input type="text" name="username" value="<?=$row_mem['username'];?>">
                    </td>
                </tr>
                <tr class="member-table--tr">
                    <td class="member-table--td">Mật khẩu :</td>
                    <td class="member-table--td"><input type="password" name="password"
                            value="<?=$row_mem['password'];?>"></td>
                </tr>
                <tr class="member-table--tr">
                    <td class="member-table--td">Họ và tên :</td>
                    <td class="member-table--td"><input type="text"
                            value="<?=$row_mem['fullname'];?>" name="fullname" id=""></td>
                </tr>
                <tr class="member-table--tr">
                    <td class="member-table--td">Số điện thoại :</td>
                    <td class="member-table--td"><input type="number"
                            value="<?=$row_mem['mobile'];?>" name="mobile" id=""></td>
                </tr>
                <tr class="member-table--tr">
                    <td class="member-table--td">Địa chỉ :</td>
                    <td class="member-table--td"><input type="text" name="address"
                            value="<?=$row_mem['address'];?>"> </td>
                </tr>
                <tr class="member-table--tr">
                    <td class="member-table--td">Email</td>
                    <td class="member-table--td"><input type="email" value="<?=$row_mem['email'];?>"
                            name="email"></td>
                </tr>
                <tr class="member-table--tr">
                    <td class="member-table--td"></td>
                    <td class="member-table--td"><input type="submit" name="update"
                            value="Cập nhật"><a href="?option=show_member"
                            style="text-decoration: none;">&lt;&lt;Trở lại </a></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>