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
             $password = md5($_POST['password']);
             $fullname = $_POST['fullname'];
             $mobile = $_POST['mobile'];
             $address = $_POST['address'];
             $email = $_POST['email'];
             $query_edit ="UPDATE members SET
             username = '$username',password = '$password',fullname='$fullname',mobile= '$mobile',address='$address',email = '$email' where member_id=".$id;
             $con->query($query_edit);
             header('location:?option=show_member');
     }
 }
?>
<div class="form-container diffirent">
    <div class="head">Chỉnh sửa thông tin thành viên </div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post">
            <div class="form-content diffirent">
                <div class="inputdetails">
                    <span class="labels">Tên đăng nhập</span>
                    <input type="text" name="username" value="<?=$row_mem['username'];?>">
                </div>
                <div class="inputdetails">
                    <span class="labels">Mật khẩu</span>
                    <input type="password" name="password">
                </div>
                <div class="inputdetails">
                    <span class="labels">Họ và tên </span>
                    <input type="text" value="<?=$row_mem['fullname'];?>" name="fullname" >
                </div>
                <div class="inputdetails">
                    <span class="labels">Điện thoại </span>
                    <input type="number"value="<?=$row_mem['mobile'];?>" name="mobile" >
                </div>
                <div class="inputdetails">
                    <span class="labels">Địa chỉ  </span>
                    <input type="text" name="address" value="<?=$row_mem['address'];?>"> 
                </div>
                <div class="inputdetails">
                    <span class="labels">Email </span>
                    <input type="email" value="<?=$row_mem['email'];?>"
                            name="email">
                </div>
            </div>
            <div class="btn">
            <input type="submit" name="update" value="Cập nhật">
                <a href="?option=show_member">&lt;&lt;Trở lại </a>
            </div>
        </form>
    </div>
</div>
