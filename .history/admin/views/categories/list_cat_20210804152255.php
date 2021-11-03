<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "select *from products where product_cat = $id";
  $pro = $con->query($query);
  // nếu tồn tại danh mục này trong bảng sản phẩm thì k xoá 
  if(mysqli_num_rows($pro) !=0){
    $con->query("update categories set status = 0 where cat_id = $id");
  }else{
    $con->query("delete from categories where cat_id = $id");
  }
}
$result = $con->query("select *from categories ");
?>
<h2 class="page-title">Danh mục sản phẩm </h2>
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
            $count =1;
            foreach($result as $cat):?>
            <tr>
              <td><?php echo $count++;?></td>
              <td><?php echo $cat['cat_id'];?></td>
              <td><?php echo $cat['name'];?></td>
              <td><a href="?option=list_cat&id=<?=$cat['cat_id'];?>" onclick ="return confirm('Bạn có chắc muốn xoá Danh mục này ?')" class="detete">Xoá </a></td>
              <td><a href="?option=edit_cat&id=<?=$cat['cat_id'];?>" class="edit">Sửa</a></td>
              <td><a class="publish">
                <?php if($cat['status'] == 1){
                  echo "Active";
                }else{
                  echo "Unactive"; 
                }?>
              </a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>