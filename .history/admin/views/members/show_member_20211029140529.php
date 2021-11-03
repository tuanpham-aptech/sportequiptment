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
            <td data-label="ID"></td>
            <td data-label="TÊN ĐĂNG NHẬP"><?php echo $member['member_id'];?></td>
            <td data-label="HỌ TÊN"><?php echo $member['username'];?></td>
            <td data-label="ĐIỆN THOẠI"></td>
            <td data-label="ĐỊA CHỈ "></td>
            <td data-label="EMAIL"></td>
            <td data-label="XOÁ"></td>
            <td data-label="SỬA"></td>

        </tr>
    </tbody>
</table>