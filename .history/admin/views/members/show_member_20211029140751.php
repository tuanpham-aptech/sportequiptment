<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $con->query("delete from members where member_id = $id");
}
$query = "select *from members";
$result = $con->query($query);
?>
<table class="table">
    <thead>
        <th>ID</th>
        <th>TÊN ĐĂNG NHẬP</th>
        <th>HỌ TÊN</th>
        <th>ĐIỆN THOẠI</th>
        <th>ĐỊA CHỈ </th>
        <th>EMAIL</th>
        <th>XOÁ</th>
        <th>SỬA</th>
    </thead>
    <tbody>
        <tr>
            <td data-label="ID"><?php echo $member['member_id'];?></td>
            <td data-label="TÊN ĐĂNG NHẬP"><?php echo $member['username'];?></td>
            <td data-label="HỌ TÊN"></td>
            <td data-label="ĐIỆN THOẠI"><?php echo $member['fullname'];?></td>
            <td data-label="ĐỊA CHỈ "><?php echo $member['address'];?></td>
            <td data-label="EMAIL"><?php echo $member['email'];?></td>
            <td data-label="XOÁ"></td>
            <td data-label="SỬA"></td>

        </tr>
    </tbody>
</table>