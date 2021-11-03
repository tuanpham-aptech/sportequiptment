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
            echo "<script>alert('Bạn đã cập nhật thành công tài khoản!!!')</script>";
        }
    }
}
?>
