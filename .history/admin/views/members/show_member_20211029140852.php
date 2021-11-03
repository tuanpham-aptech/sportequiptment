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
            <td data-label="HỌ TÊN"><?php echo $member['fullname'];?></td>
            <td data-label="ĐIỆN THOẠI"><?php echo $member['mobile'];?></td>
            <td data-label="ĐỊA CHỈ "><?php echo $member['address'];?></td>
            <td data-label="EMAIL"><?php echo $member['email'];?></td>
            <td data-label="XOÁ"><a href="?option=show_member&id=<?=$member['member_id'];?>"
                        onclick="return confirm('Bạn có chắc muốn xoá thành viên này  ?')"
                        class="btn btn--primary">Xoá </a></td>
            <td data-label="SỬA"><a
                        href="?option=edit_member&id=<?=$member['member_id'];?>"
                        class="btn btn-secondary">Sửa</a></td>

        </tr>
    </tbody>
</table>