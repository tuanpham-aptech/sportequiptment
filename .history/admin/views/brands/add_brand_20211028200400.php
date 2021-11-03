<?php 
if(isset($_POST['title'])){
    $brand_title = $_POST['title'];
    $query = "select *from brands where name = '$brand_title' ";
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Tên thương hiệu  đã tồn tại mời bạn nhập tên khác!!!')</script>";
    }else{
        $status = $_POST['status'];
        $query_brand = "insert brands(name,status) values('$brand_title','$status')";
        $result_brand =$con->query($query_brand);
        header('location:?option=list_brand');
    }
}
?>
<h2 class="page-title">Thêm thương hiệu </h2>
<form class="form" method="post">
    <div class="form-group">
        <label for="">Tên thương hiệu  </label>
        <input type="text" name="title" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Trạng thái  </label>
        <span> Active</span><input type="radio" checked name="status" value="1">
        <span>Unactive</span><input type="radio" name="status" value="0">
    </div>
    <div class="form-group">
        <input type="submit" name="btn_send" class="btn-send" value="Thêm mới ">
        <a href="?option=list_cat" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </div>
</form>