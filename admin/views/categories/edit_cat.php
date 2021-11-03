<?php 
$id = $_GET['id'];
$query = "select *from categories where cat_id = '$id' ";
$result = $con->query($query);
$cat = mysqli_fetch_array($result);
if(isset($_POST['title'])){
    $cat_title = $_POST['title'];
    //check xem tên có trùng với tên trong bảng đó k và id cũng vậy 
    $query = "select *from categories where name = '$cat_title' and cat_id !=" .$cat['cat_id'];
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Đã tồn tại danh mục mang tên này !!!')</script>";
        $alert ="Đã tồn tại danh mục tên này";
    }else{
        $status = $_POST['status'];
        $query_cat = "update categories set name='$cat_title',status='$status' where cat_id=".$cat['cat_id'];
        $con->query($query_cat);
        header('location: ?option=list_cat');
    }
}
?>
<h2 class="page-title">Chỉnh sửa  danh mục </h2>
<form method="post">
    <p style="color:red;"><?=isset($alert)?$alert: ''?></p>
    <div class="form-group">
        <label for="">Tên danh mục </label>
        <input type="text" name="title" value="<?=$cat['name'];?>" class="text-input" >
    </div>
    <div class="form-group">
        <label for="">Trạng thái  </label>
        <span> Active</span><input type="radio" <?=$cat['status']==1?'checked':''?> name="status" value="1">
        <span>Unactive</span><input type="radio" <?=$cat['status']==0?'checked':''?> name="status" value="0">
    </div>
    <div class="form-group">
        <input type="submit" name="btn_send" class="btn-send" value="Thêm mới ">
        <a href="?option=list_cat" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </div>
</form>