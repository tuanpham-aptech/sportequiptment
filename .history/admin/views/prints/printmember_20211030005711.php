<body onload="window.print();"></body>
<?php
error_reporting(0);
$con = new MySQLi('localhost','root','','db_tbvt');
$sql="select * from members";
$result = $con->query($sql);
$output='';
if (mysqli_num_rows($result)) {
        $output.='
        <div class="show">
        <div class="title">
            <h2 class="heading">Danh sách thành viên </h2>
        </div>
        <table class="table" bordered="1">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Email</th>
                <th>Status</th>
            </tr>';
        while($hang=mysqli_fetch_array($result))
        {
            $output.='
            <tr>
                <td data-label="ID">'.$hang['member_id'].'</td>
                <td data-label="TÊN ĐĂNG NHẬP">'.$hang['username'].'</td>
                <td data-label="HỌ TÊN">'.$hang['fullname'].'</td>
                <td data-label=>'.$hang['mobile'].'</td>
                <td>'.$hang['address'].'</td>
                <td>'.$hang['email'].'</td>
                <td>'.$hang['status'].'</td>
            </tr>
            ';
        }
        $output.='</table>';
        echo $output;
}
mysqli_close($con);
?>

  
