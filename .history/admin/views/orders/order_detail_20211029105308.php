<?php 
if(isset($_GET['action'])){
    $orderid=$_GET['order_id'];
    $productid=$_GET['product_id'];
    $condition="where order_id='$orderid' and product_id='$productid'";
    if($_GET['type']=='asc'){
        $query="update orderdetail set quantity=quantity+1 ".$condition;
    }else{
        $query="update orderdetail set quantity=quantity-1 ".$condition;
    }
    $con->query($query);
    header("location: ?option=order_detail&id=".$_GET['id']);
}
if(isset($_POST['status'])){
    $query_status ="update orders set status ='$_POST[status]' where id= '$_GET[id]'";
    $con->query($query_status);
}
?>
<?php 
$id = $_GET['id'];
$sql = "select a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember',
a.email as 'emailmember',b.*,c.name as 'nameordermethod'
from members a join orders b on a.member_id = b.member_id join ordermethod c on b.order_method_id = c.id where b.id= ".$id;
$order = mysqli_fetch_array($con->query($sql));
?>
<h1 style="text-align:center;">CHI TIẾT ĐƠN HÀNG <br>MÃ ĐƠN HÀNG (<?=$order['id']?>)</h1>
<h2>NGÀY TẠO ĐƠN </h2>
<div style="color:red; font-size:1.4rem;" class="orderdate"><?=$order['orderdate'];?></div>
<h2>THÔNG TIN NGƯỜI ĐẶT HÀNG </h2>
<table class="show">
    <tbody>
        <tr>
            <td>Họ và Tên </td>
            <td><?php echo $order['fullname'];?></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><?php echo $order['mobilemember'];?></td>
        </tr>
        <tr>
            <td>Địa chỉ </td>
            <td><?php echo $order['addressmember'];?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $order['emailmember'];?></td>
        </tr>
        <tr>
            <td>Ghi chú </td>
            <td><?php echo $order['note'];?></td>
        </tr>
    </tbody>
</table class="show">
<h2>THÔNG TIN NGƯỜI NHẬN HÀNG </h2>
<table class="show">
    <tbody>
        <tr>
            <td>Họ và Tên </td>
            <td><?php echo $order['name'];?></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><?php echo $order['mobile'];?></td>
        </tr>
        <tr>
            <td>Địa chỉ </td>
            <td><?php echo $order['address'];?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $order['email'];?></td>
        </tr>
    </tbody>
</table>
<h2>PHƯƠNG THỨC THANH TOÁN </h2>
<section class="payment">
    <h3 style="color:red;"><?= $order['nameordermethod'];?></h3>
</section>
<?php 
$query = "select b.*,c.name,c.image from orders a join orderdetail b on a.id = b.order_id join products c on b.product_id = c.product_id where a.id = $order[id]";
$orderdetails = $con->query($query);
?>
<form method="post">
    <h2>CÁC SẢN PHẨM ĐẶT MUA </h2>
    <h2 class="page-title">Danh sách sản phẩm </h2>
    <table class="show">
        <thead>
            <th>STT</th>
            <th>Tên </th>
            <th>Giá </th>
            <th>Ảnh </th>
            <th>Số lượng </th>
        </thead>
        <tbody>
            <?php 
            $count =1;
            foreach($orderdetails as $item):?>
            <tr>
                <td><?php echo $count++;?></td>
                <td><?php echo $item['name'];?></td>
                <td><?php echo number_format($item['price'],0,',','.');?></td>
                <td><img src="../assets/upload_images/<?php echo $item['image'];?>" alt="" height="100" width="100"></td>
                <td>
                    <input class="button-prevtype="button" value="+"
                        onclick="location='?option=order_detail&id=<?=$_GET['id']?>&action=update&type=asc&order_id=<?=$item['order_id']?>&product_id=<?=$item['product_id']?>'">
                    <?php echo $item['quantity'];?>
                    <input type="button" value="-" <?=$item['quantity']==0?'disabled':''?>
                        onclick="location='?option=order_detail&id=<?=$_GET['id']?>&action=update&type=desc&order_id=<?=$item['order_id']?>&product_id=<?=$item['product_id']?>'">
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <h2>TRẠNG THÁI ĐƠN HÀNG </h2>
    <p style="font-size:22px; display:<?=$order['status']==2|| $order['status']==3?'none;':''?>"><input type="radio"
            name="status" value="1" <?=$order['status']==1?'checked':''?>>Chưa xử
        lý </p>
    <p style="font-size:22px; display:<?=$order['status']==3?'none':''?>"><input type="radio" name="status" value="2"
            <?=$order['status']==2?'checked':''?>>Đang xử
        lý </p>
    <p style="font-size:22px;"><input type="radio" name="status" value="3" <?=$order['status']==3?'checked':''?>>Đã xử
        lý</p>
    <p style="font-size:22px; display:<?=$order['status']==3?'none':''?>"><input type="radio" name="status" value="4"
            <?=$order['status']==4?'checked':''?>>Huỷ
    </p>
    <section style="font-size:22px;color:blue;">
        <input <?=$order['status']==3?'disabled':''?> type="submit" value="UPDATE đơn hàng">
        <a href="?option=order&status=1" style="text-decoration: none;">&lt;&lt;Trở lại </a>
    </section>
</form>