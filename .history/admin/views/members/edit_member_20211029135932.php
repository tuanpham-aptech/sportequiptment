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
             $password = md5($_POST['password']);
             $fullname = $_POST['fullname'];
             $mobile = $_POST['mobile'];
             $address = $_POST['address'];
             $email = $_POST['email'];
             $query_edit ="UPDATE members SET
             username = '$username',password = '$password',fullname='$fullname',mobile= '$mobile',address='$address',email = '$email' where member_id=".$id;
             $con->query($query_edit);
             echo "<script>alert('Bạn đã cập nhật tài khoản thành công !!!')</script>";
         }
     }
 }
?>
<div class="member">
    <h2 class="page-title">Chỉnh sửa thông tin thành viên </h2>
    <table class="member-table--update show">
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
<div class="member">
    <h2 class="page-title">Danh sách thành viên </h2>
    <table class="member-table show">
        <thead class="member-table--thead">
            <th class="member-table--th">ID</th>
            <th class="member-table--th">TÊN ĐĂNG NHẬP </th>
            <th class="member-table--th">HỌ TÊN </th>
            <th class="member-table--th">ĐIỆN THOẠI </th>
            <th class="member-table--th">ĐỊA CHỈ </th>
            <th class="member-table--th">EMAIL </th>
            <th class="member-table--th">Xoá </th>
            <th class="member-table--th">Sửa</th>
        </thead>
        <tbody>
            <?php foreach ($result as $member):?>
            <tr class="member-table--tr">
                <td class="member-table--td"><?php echo $member['member_id'];?></td>
                <td class="member-table--td">
                    <h3 class="member-heading"><?php echo $member['username'];?></h3>
                </td>
                <td class="member-table--td"><span
                        class="member-full"><?php echo $member['fullname'];?></span></td>
                <td class="member-table--td"><span
                        class="member-mobile"><?php echo $member['mobile'];?></span></td>
                <td class="member-table--td"><span
                        class="member-address"><?php echo $member['address'];?></span> </td>
                <td class="member-table--td"><span
                        class="member-email"><?php echo $member['email'];?></span></td>
                <td class="member-table--td">
                    <a href="?option=show_member&id=<?=$member['member_id'];?>"
                        onclick="return confirm('Bạn có chắc muốn xoá thành viên này  ?')"
                        class="btn btn--primary">Xoá </a>
                </td>
                <td class="member-table--td"><a
                        href="?option=edit_member&id=<?=$member['member_id'];?>"
                        class="btn btn-secondary">Sửa</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>