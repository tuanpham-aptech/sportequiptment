
<?php 
$id = $_GET['id'];
$query = "select *from brands where brand_id = '$id' ";
$result = $con->query($query);
$brand = mysqli_fetch_array($result);
if(isset($_POST['title'])){
    $brand_title = $_POST['title'];
    $query = "select *from brands where name = '$brand_title' and brand_id !=" .$brand['brand_id'];
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Đã tồn tại danh mục mang tên này !!!')</script>";
    }else{
        $status = $_POST['status'];
        $query_brand = "update brands set name='$brand_title',status='$status' where brand_id=".$brand['brand_id'];
        $result_brand =$con->query($query_brand);
        header('location:?option=list_brand');
    }
}
?>

<h2 class="page-title">Chỉnh sửa thương hiệu  </h2>
<form method="post">
    <div class="form-group">
        <label for="">Tên thương hiệu </label>
        <input type="text" name="title" value="<?=$brand['name'];?>" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Trạng thái  </label>
        <span> Active</span><input type="radio" <?=$brand['status']==1?'checked':''?> name="status" value="1">
        <span>Unactive</span><input type="radio" <?=$brand['status']==0?'checked':''?> name="status" value="0">
    </div>
    <div class="form-group">
        <input type="submit" name="btn_send" class="btn-send" value="Thêm mới ">
        <a href="?option=list_cat" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </div>
</form>