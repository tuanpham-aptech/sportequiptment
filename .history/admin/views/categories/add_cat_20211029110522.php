<?php 
if(isset($_POST['title'])){
    $cat_title = $_POST['title'];
    $query = "select *from categories where name = '$cat_title' ";
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Tên danh mục đã tồn tại mời bạn nhập tên khác!!!')</script>";
    }else{
        $status = $_POST['status'];
        $query_cat = "insert categories(name,status) values('$cat_title','$status')";
        $result_cat =$con->query($query_cat);
        echo"<script>alert('Thêm danh mục thành công !!!')</script>";
        header('location:?option=list_cat');
    }
}
?>
<h2 class="page-title">Thêm danh mục </h2>
<form method="post">
    <div class="form-group">
        <label for="">Tên danh mục </label>
        <input type="text" name="title" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Trạng thái  </label>
        <span> Active</span><input type="radio" checked name="status" value="1">
        <span>Unactive</span><input type="radio" name="status" value="0">
    </div>
    <div class="form-group">
        <div class="box">
            <input type="submit" class="button slideleft" name="btn_send" class="btn-send" value="Thêm mới ">
        </div>
        <a href="?option=list_cat" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </div>
</form>