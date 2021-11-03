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
        <?php
            $count = 1;
             foreach($result as $brand):
             ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td><?php echo $brand['brand_id'];?></td>
            <td><?php echo $brand['name'];?></td>
            <td><a href="?option=list_brand&id=<?=$brand['brand_id'];?>"
                    onclick="return confirm('Bạn có chắc muốn xoá Thương hiệu  này ?')"
                    class="detete">Xoá </a></td>
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
<div class="show">
    <div class="title">
        <h2 class="heading">Danh sách thương hiệu </h2>
    </div>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>TÊN HÃNG </th>
            <th>ĐIỆN THOẠI</th>
            <th>ĐỊA CHỈ </th>
            <th>EMAIL</th>
            <th>XOÁ</th>
            <th>SỬA</th>
        </thead>
        <tbody>
            <?php foreach ($result as $member):?>
            <tr>
                <td data-label="ID"><?php echo $member['member_id'];?></td>
                <td data-label="TÊN ĐĂNG NHẬP"><?php echo $member['username'];?></td>
                <td data-label="HỌ TÊN"><?php echo $member['fullname'];?></td>
                <td data-label="ĐIỆN THOẠI"><?php echo $member['mobile'];?></td>
                <td data-label="ĐỊA CHỈ "><?php echo $member['address'];?></td>
                <td data-label="EMAIL"><?php echo $member['email'];?></td>
                <td data-label="XOÁ"><a href="?option=show_member&id=<?=$member['member_id'];?>"
                        onclick="return confirm('Bạn có chắc muốn xoá thành viên này  ?')"
                        class="btn btn--primary">Xoá </a></td>
                <td data-label="SỬA"><a href="?option=edit_member&id=<?=$member['member_id'];?>"
                        class="btn btn-secondary">Sửa</a></td>
    
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>