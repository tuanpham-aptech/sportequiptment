<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "select *from orderdetail where product_id = $id";
  $pro = $con->query($query);
  // nếu tồn tại danh mục này trong bảng sản phẩm thì k xoá 
  if(mysqli_num_rows($pro) !=0){
    $con->query("update products set status = 0 where product_id = $id");
  }else{
    $con->query("delete from products where product_id = $id");
    // sau đó xoá ảnh trong thư mục lưu trữ 
    unlink("../upload_images/".$_GET['image']);
  }
}
$query = "select *from  products";
$result = $con->query( $query);
?>
<h2 class="page-title">Danh sách sản phẩm </h2>
        <table>
          <thead>
            <th>STT</th>
            <th>ID</th>
            <th>Tên </th>
            <th>Giá </th>
            <th>Ảnh </th>
            <th>Mô tả </th>
            <th>Xoá </th>
            <th>Sửa</th>
            <th>Trạng thái </th>
          </thead>
          <tbody>
            <?php 
            $count =1;
            foreach($result as $pro):?>
            <tr>
              <td><?php echo $count++;?></td>
              <td><?php echo $pro['product_id'];?></td>
              <td><?php echo $pro['name'];?></td>
              <td><?php echo number_format($pro['price'],0,',','.');?></td>
              <td><img src="../assets/upload_images/<?php echo $pro['image'];?>" alt="" height="100" width="100"></td>
              <td><?php echo $pro['description'];?></td>
              <td><a href="?option=list_product&id=<?=$pro['product_id'];?>&image=<?=$pro['image']?>" onclick ="return confirm('Bạn có chắc muốn xoá sản phẩm  này ?')" class="detete">Xoá </a></td>
              <td><a href="?option=edit_product&id=<?=$pro['product_id'];?>" class="edit">Sửa</a></td>
              <td><a class="publish">
                <?php if($pro['status'] == 1){
                  echo "Active";
                }else{
                  echo "Unactive"; 
                }?>
              </a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>