<?php
session_start();
$con = new MySQLi('localhost','root','','db_tbvt');
if(isset($_POST['username'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $query = "select *from admin where username = '$user' and password = '$pass'";
    $resust = $con->query($query);
    if(mysqli_num_rows($resust)== 0){
        $alert = "Sai tên đăng nhập hoặc mật khẩu ";
    }else{
        $resust = mysqli_fetch_array($resust);
        if($resust['status'] == 0){
            $alert =" Tài khoản đang bị khoá ";
        }else{
        $_SESSION['admin'] = $user;
        header('Refresh:0');// tương đương với F5
        }
    }
}
?>
    <?php include "includes/header.php";?>
    <section class="admin-wraper">
    <?php
    if(isset($_SESSION['admin'])){
        include "includes/sidebar.php";
        include "includes/content.php";
    }else{
        include "includes/login_admin.php";
    }
    ?>
    </section>
</body>

</html>