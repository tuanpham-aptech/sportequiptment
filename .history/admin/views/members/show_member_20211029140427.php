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
            <td data-label="TÊN ĐĂNG NHẬP"></td>
            <td data-label="HỌ TÊN"></td>
            <td data-label="ĐIỆN THOẠI"></td>
            <td data-label="ĐỊA CHỈ "></td>
            <td data-label="ID"></td>
            <td data-label="ID"></td>
            <td data-label="ID"></td>

        </tr>
    </tbody>
</table>