<?php
//xử lý nút xoá 
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "delete from orderdetail where order_id = $id";
  $query = "delete from orders where id = $id";
  $delete_order_id = $con->query($query);
  header('location:?option=order&status=4');

}
$status = $_GET['status'];
$query = "select *from  orders where status =".$status;
$result = $con->query( $query);
?>
<h2 class="page-title">ĐƠN HÀNG <?=$status ==1 ?'ĐƠN HÀNG CHƯA XỬ LÝ ':($status ==2?'ĐANG XỬ LÝ ':($status==3?'ĐÃ XỬ LÝ':'HUỶ'))?> </h2>
        <table>
          <thead>
            <th>STT</th>
            <th>ID</th>
            <th>Ngày tạo  </th>
            <th>Xoá </th>
            <th>Sửa</th>

          </thead>
          <tbody>
            <?php 
            $count =1;
            foreach($result as $item):?>
            <tr>
              <td><?php echo $count++;?></td>
              <td><?php echo $item['id'];?></td>
              <td><?php echo $item['orderdate'];?></td>
              <td><a style="display:<?=$status ==4?'':'none';?>" href="?option=order&id=<?=$item['id'];?>" onclick ="return confirm('Bạn có chắc muốn xoá sản phẩm  này ?')" class="detete">Xoá </a></td>
              <td><a href="?option=order_detail&id=<?=$item['id'];?>" class="edit">Chi tiết đơn hàng </a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>