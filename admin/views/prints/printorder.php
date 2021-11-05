<body onload="window.print();"></body>
<?php
error_reporting(0);
$con = new MySQLi('localhost','root','','db_tbvt'); 
$id = $_GET['id'];  
$sql = "select a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember',
a.email as 'emailmember',b.*,c.name as 'nameordermethod'
from members a join orders b on a.member_id = b.member_id join ordermethod c on b.order_method_id = c.id";

$result_ifo_member = mysqli_fetch_array($con->query($sql));
$query_order = "select b.*,c.name,c.image from orders a join orderdetail b on a.id = b.order_id join products c on b.product_id = c.product_id where a.id = $result_ifo_member[id]";
$result_order_detail = mysqli_fetch_array($con->query($query_order));
$total = ($result_order_detail ['price']) * ($result_order_detail['quantity']);
$output='';
$output.='
<div class="print-order"  style=" margin-bottom:4px;border:1px solid #ccc; width:100%; max-width:600px; margin: 2px auto; height:100%;">
    <div class="show">
    <div class="title">
        <h2 class="heading">HOÁ ĐƠN BÁN HÀNG  <br><span style="font-size:18px">MÃ ĐƠN HÀNG('.$result_ifo_member['id'].')</span></h2>
    </div>
    </div>
    <div style="width:100%; max-width:600px; margin: 2px auto; margin-left:8px; height:100%;">
    <span style=" font-size:1rem;">NGÀY TẠO ĐƠN </span>
    <div style="color:red; font-size:0.875rem;">'.$result_ifo_member['orderdate'].'</div>
    <div class="info-ecommer">Đơn vị bán hàng : ...................................................................................................................</div>
    <div class="info-ecommer">Mã số thuế : ...........................................................................................................................</div>
    <div class="info-ecommer">Địa chỉ :  .........................................................................Số tài khoản : ..................................</div>
    <div class="info-ecommer">Điện thoại :  ..............................................................................................................................</div>
    <hr style="width:585px">
    <div class="info-ecommer">Họ tên người mua hàng : '.$result_ifo_member['fullname'].'</div>
    <div class="info-ecommer">Tên đơn vị : ..............................................................................................................................</div>
    <div class="info-ecommer">Mã số thuế : ..............................................................................................................................</div>
    <div class="info-ecommer">Địa chỉ : '.$result_ifo_member['addressmember'].'.Số tài khoản :................................................................................................</div>
        <table>
            <thead>
                <th>STT</th>
                <th>TÊN HÀNG </th>
                <th>SỐ LƯỢNG</th>
                <th>ĐƠN GIÁ </th>
                <th>THÀNH TIỀN </th>
            </thead>
            <tbody>
                <tr>
                    <td data-label="STT ">1</td>
                    <td data-label="TÊN HÀNG ">'.$result_ifo_member['fullname'].'</td>
                    <td data-label="SỐ LƯỢNG ">'. $result_order_detail['quantity'].'</td>
                    <td data-label="ĐƠN GIÁ ">'.number_format($result_order_detail ['price'],0,',','.').'</td>
                    <td data-label="THÀNH TIỀN ">'.number_format($total,0,',','.').' VNĐ</td>
                </tr>
            </tbody>
        </table>
    <p>Phương thức thanh toán : '.$result_ifo_member['nameordermethod'].'</p>
    </div>
</div>
';
        echo $output;   
mysqli_close($con);
?>