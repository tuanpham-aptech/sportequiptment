<?php 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = md5($password);
    $query = "select *from members where username = '$username' and password = '$hash_password'";
    $result = $con->query($query); 
    if(mysqli_num_rows($result) == 0){
        echo "<script> alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
    }else{
        $result = mysqli_fetch_array($result);
        if($result['status'] == 0){
        echo "<script> alert('Tài khoản của bạn đang bị khoá hoặc đang trong quá trình xử lý ')</script>";
        }else{
            $_SESSION['member'] = $username;
            if(isset($_GET['order'])){
                header('location: ?option=order');
            }else if(isset($_GET['id'])){   
                $member_id = $result['member_id'];
                $product_id = $_GET['id'];
                $comment = $_SESSION['comment'];
                $con->query("insert comments(member_id,product_id,date,content) values('$member_id','$product_id',now(),'$comment')");
                header("location:?option=product_detail&id=$product_id");
            }else{
            header('location:?option=home');
            }
        }
    }
}
?>
<div class="row">
<div class="login__wrap">
    <form method="post" onsubmit="return validate()">
        <p id="error"></p>
        <h2>Đăng Nhập </h2>
        <div class="form-group">
            <label for="">Tên đăng nhập </label>
            <input type="text" name="username" class="form-control" id="user">
            <i class="fa fa-check u_check"></i>
            <i class="fa fa-times u_times"></i>
        </div>
        <div class="form-group">
            <label for="">Mật khẩu </label>
            <input type="password" name="password" class="form-control" id="pass">
            <i class="fa fa-check p_check"></i>
            <i class="fa fa-times p_times"></i>
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Đăng Nhập" id="login">
        </div>
    </form>
</div>
</div>