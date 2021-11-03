<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select *from products where product_id = ".$id;
    $result = $con->query($query);
    $row_product = mysqli_fetch_array($result);
} 
?>
<?php
if(isset($_POST['title'])){
    $pro_title = $_POST['title'];
    $query = "select *from products where name = '$pro_title' and  product_id !=".$row_product['product_id'];
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Đã có sản phẩm khác có tên này !!!')</script>";
    }else{
        $cat_id = $_POST['product_cat'];
        $brand_id = $_POST['product_brand'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $status = $_POST['status']; 
        $store = "../upload_images/";
        // lấy tên ảnh  
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $exp3 = substr($imageName,strlen($imageName)-3);// ví dụ abcd.jpg thì nó sẽ lấy từ jpg từ vị trí số 5 
        $exp4 = substr($imageName,strlen($imageName)-4);// ví dụ abcd.jpeg thì nó sẽ lấy từ jpg từ vị trí số 5 
        // kiểm tra đuôi cắt dc với các đuôi của file ảnh 
        
            if($exp3 =='jpg'||$exp3=='png'||$exp3 =='bmp'||$exp3=='gif'||$exp3=='JPG'||$exp3=='PNG'||$exp3=='GIF'||$exp3=='BMP'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP'){
             // TA SẼ UPLOAD FILE ẢNH VÀO THƯ MỤC 
             //đổi lại tên sau đó gán vào chính biến đó Trong đó 
             //hàm time() là hàm tính độ lệch về thời gian giữa thời điểm hiện tại so với 0h 0p 0s năm 1970 
             // sau đó chuyển thời gian thành mili giây nó dc 1 con số nó sẽ thay đổi nhanh nên nó ko thể có chuyện 2 file ảnh trùng nhau
             $imageName= time().'_'.$imageName;

            move_uploaded_file($imageTemp,$store.$imageName);// gồm 2 tham số nguồn file và đưa vào nơi đó là store với tên $imageName
            unlink($store.$row_product['image']);// xoá đường dẫn ban đầu mà ảnh đó đã tồn tại 
            }else{
            // nếu file ảnh k phải 
            echo"<script>alert('File đã chọn ko phải file ảnh  !!!')</script>";
            }
            if(empty($imageName)){
                $imageName = $row_product['image'];
            }
         
            $sql = " update products set product_cat = '$cat_id',product_brand = '$brand_id',name='$pro_title',price = '$price',image='$imageName',description='$desc',status = '$status' where product_id = ".$row_product['product_id'];
            $con->query($sql);
            header('location:?option=list_product');
    }
}
$brand = $con->query("select *from brands");
$category = $con->query("select *from categories");

?>
<h2 class="page-title">Chỉnh sửa sản phẩm  </h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Tên sản phẩm  </label>
        <input type="text" name="title" value="<?=$row_product['name']?>" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Danh mục </label>
        <select name="product_cat"  id="brand-id">
            <option hidden>--Chọn danh mục--</option>
            <?php foreach($category as $item):?>
                <option value="<?=$item['cat_id']?>" <?=$item['cat_id']== $row_product['product_cat'] ? 'selected': '' ?>><?=$item['name'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Thương hiệu  </label>
        <select name="product_brand"  id="brand-id">
            <option hidden>--Chọn hãng--</option>
            <?php foreach($brand as $item):?>
                <option value="<?=$item['brand_id']?>" <?=$item['brand_id']== $row_product['product_brand'] ? 'selected': '' ?> ><?=$item['name'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Giá   </label>
        <input type="number" min="100000" value="<?=$row_product['price']?>" name="price" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Ảnh  </label>
        <input type="file" name="image" id="image" class="text-input" >
        <img src="../upload_images/<?=$row_product['image']?>"  width="150"  height="150" alt="">
    </div>
    <div class="form-group">
        <label for="">Mô tả </label>
        <textarea name="description"  id="description"><?=$row_product['description']?></textarea>
        <script >CKEDITOR.replace("description");</script>
    </div>
    <div class="form-group">
        <label for="">Trạng thái  </label>
        <span> Active</span><input type="radio" <?=$row_product['status']==1 ?'checked': '' ?> checked name="status" value="1">
        <span>Unactive</span><input type="radio" <?=$row_product['status']==0 ?'checked': '' ?> name="status" value="0">
    </div>
    <div class="form-group">
        <input type="submit" name="btn_send" class="btn-send" value="Cập nhật ">
        <a href="?option=list_products" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </div>
</form>