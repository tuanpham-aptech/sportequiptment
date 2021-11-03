<?php 
if(isset($_POST['title'])){
    $pro_title = $_POST['title'];
    $query = "select *from products where name = '$pro_title' ";
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Tên sản phẩm đã tồn tại mời bạn nhập tên khác!!!')</script>";
    }else{
        $cat_id = $_POST['product_cat'];
        $brand_id = $_POST['product_brand'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $status = $_POST['status']; 
        $store = "../upload_images/";
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $exp3 = substr($imageName,strlen($imageName)-3); 
        $exp4 = substr($imageName,strlen($imageName)-4);// ví dụ abcd.jpeg thì nó sẽ lấy từ jpg từ vị trí số 5 
        // kiểm tra đuôi cắt dc với các đuôi của file ảnh 
        
        if($exp3 =='jpg'||$exp3=='png'||$exp3 =='bmp'||
        $exp3=='gif'||$exp3=='JPG'||$exp3=='PNG'||
         $exp3=='GIF'||$exp3=='BMP'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP'){
             // TA SẼ UPLOAD FILE ẢNH VÀO THƯ MỤC 
             //đổi lại tên sau đó gán vào chính biến đó Trong đó 
             //hàm time() là hàm tính độ lệch về thời gian giữa thời điểm hiện tại so với 0h 0p 0s năm 1970 
             // sau đó chuyển thời gian thành mili giây nó dc 1 con số nó sẽ thay đổi nhanh nên nó ko thể có chuyện 2 file ảnh trùng nhau
             $imageName= time().'_'.$imageName;

            move_uploaded_file($imageTemp,$store.$imageName);// gồm 2 tham số nguồn file và đưa vào nơi đó là store với tên $imageName
              $sql = " insert products(product_cat,product_brand,name,price,image,description,status)
            
               values('$cat_id','$brand_id','$pro_title','$price','$imageName','$desc','$status')";
              $con->query($sql);
             header('location:?option=list_product');
         }else{
             // nếu file ảnh k phải 
             echo"<script>alert('File đã chọn ko phải file ảnh  !!!')</script>";

         }
    }
}
$brand = $con->query("select *from brands");
$category = $con->query("select *from categories");

?>
<h2 class="page-title">Thêm sản phẩm  </h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Tên sản phẩm  </label>
        <input type="text" name="title" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Danh mục </label>
        <select name="product_cat"  id="brand-id">
            <option hidden>--Chọn danh mục--</option>
            <?php foreach($category as $item):?>
                <option value="<?=$item['cat_id']?>"><?=$item['name'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Thương hiệu  </label>
        <select name="product_brand"  id="brand-id">
            <option hidden>--Chọn hãng--</option>
            <?php foreach($brand as $item):?>
                <option value="<?=$item['brand_id']?>"><?=$item['name'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Giá   </label>
        <input type="number" min="100000" name="price" class="text-input" required>
    </div>
    <div class="form-group">
        <label for="">Ảnh  </label>
        <input type="file" name="image" id="image" class="text-input" >
    </div>
    <div class="form-group">
        <label for="">Mô tả </label>
        <textarea name="description" id="description"></textarea>
        <script >CKEDITOR.replace("description");</script>
    </div>
    <div class="form-group">
        <label for="">Trạng thái  </label>
        <span> Active</span><input type="radio" checked name="status" value="1">
        <span>Unactive</span><input type="radio" name="status" value="0">
    </div>
    <div class="form-group">
        <input type="submit" name="btn_send" class="btn-send" value="Thêm mới ">
        <a href="?option=list_products" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </div>
</form>