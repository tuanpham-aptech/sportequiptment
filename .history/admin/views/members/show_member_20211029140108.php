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
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </thead>
</table>