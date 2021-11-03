<?php
error_reporting(0);
$con = new MySQLi('localhost','root','','db_tbvt');
$sql="select * from members";
$kq = $con->query($sql);
$output='';
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Fullname</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Email</th>
                <th>Status</th>
            </tr>';
        while($hang=mysqli_fetch_array($kq))
        {
            $output.='
            <tr>
                <td>'.$hang['member_id'].'</td>
                <td>'.$hang['username'].'</td>
                <td>'.$hang['password'].'</td>
                <td>'.$hang['fullname'].'</td>
                <td>'.$hang['mobile'].'</td>
                <td>'.$hang['address'].'</td>
                <td>'.$hang['email'].'</td>
                <td>'.$hang['status'].'</td>
            </tr>
            ';
        }
        $output.='</table>';
        header("Content-Type:application/xls;charset='utf-8'");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }
mysqli_close($con);
  ?>
  
