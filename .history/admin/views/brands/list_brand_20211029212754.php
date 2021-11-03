<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "select *from products where product_brand = $id";
  $pro = $con->query($query);
  if(mysqli_num_rows($pro) !=0){
    $con->query("update brands set status = 0 where brand_id = $id");
  }else{
    $con->query("delete from brands where brand_id = $id");
  }
}
$result = $con->query("select *from brands");
?>
<table class="show">
    <thead>
        <th>STT</th>
        <th>ID</th>
        <th>Tên </th>
        <th>Xoá </th>
        <th>Sửa</th>
        <th>Trạng thái </th>
    </thead>
    <tbody>
       
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="show">
    <div class="title">
        <h2 class="heading">Danh sách thương hiệu </h2>
    </div>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>TÊN HÃNG </th>
            <th>XOÁ</th>
            <th>SỬA </th>
            <th>TRẠNG THÁI </th>
        </thead>
        <tbody>
            <?php
            $count = 1;
             foreach($result as $brand):
             ?>
            <tr>
                <td data-label="STT"><?php echo $count++;?></td>
                <td data-label="ID"><?php echo $brand['brand_id'];?></td>
                <td data-label="TÊN HÃNG "><?php echo $brand['name'];?></td>
                <td data-label="XOÁ"><a href="?option=list_brand&id=<?=$brand['brand_id'];?>"
                    onclick="return confirm('Bạn có chắc muốn xoá Thương hiệu  này ?')"
                    class="detete">Xoá </a></td>
                <td data-label="SỬA"><a href="?option=edit_brand&id=<?=$brand['brand_id'];?>" class="edit">Sửa</a></td>
                <td data-label="TRẠNG THÁI "><a class="publish">
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
</div>