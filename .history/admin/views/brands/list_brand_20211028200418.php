<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "select *from products where product_brand = $id";
  $pro = $con->query($query);
  // nếu tồn tại thương hiệu  này trong bảng sản phẩm thì k xoá 
  if(mysqli_num_rows($pro) !=0){
      // nếu có sp ứng với thương hiệu  đó chuyển trạng thái thành 0 
    $con->query("update brands set status = 0 where brand_id = $id");
  }else{
    $con->query("delete from brands where brand_id = $id");
  }
}
$result = $con->query("select *from brands");
?>
<h2 class="page-title">Thương hiệu sản phẩm </h2>
        <table>
          <thead>
            <th>STT</th>
            <th>ID</th>
            <th>Tên </th>
            <th>Xoá </th>
            <th>Sửa</th>
            <th>Trạng thái </th>
          </thead>
          <tbody>
            <?php
            $count = 1;
             foreach($result as $brand):
             ?>
            <tr>
              <td><?php echo $count++;?></td>
              <td><?php echo $brand['brand_id'];?></td>
              <td><?php echo $brand['name'];?></td>
              <td><a href="?option=list_brand&id=<?=$brand['brand_id'];?>" onclick ="return confirm('Bạn có chắc muốn xoá Thương hiệu  này ?')" class="detete">Xoá </a></td>
              <td><a href="?option=edit_brand&id=<?=$brand['brand_id'];?>" class="edit">Sửa</a></td>
              <td><a class="publish">
                <?php if($brand['status'] == 1){
                  echo "Active";
                }else{
                  echo "Unactive"; 
                }?>
              </a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>