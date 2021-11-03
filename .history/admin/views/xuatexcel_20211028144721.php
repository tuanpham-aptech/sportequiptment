
 
  	<?php
    session_start();
error_reporting(0);

$conn = mysqli_connect("localhost","root","","qltaikhoan");
$sql="select * from taikhoan";

$kq=mysqli_query($conn,$sql);

$output='';
if (isset($_POST["export_excel"])) {
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Mật khẩu</th>
                <th>Tên</th>
                <th>Level</th>
            </tr>';
        while($hang=mysqli_fetch_object($kq))
        {
            $output.='
            <tr>
                <td>'.$hang->ID.'</td>
                <td>'.$hang->User.'</td>
                <td>'.$hang->Pass.'</td>
                <td>'.$hang->Name.'</td>
                <td>'.$hang->Level.'</td>
            </tr>
            ';
        }
        $output.='</table>';
        header("Content-Type:application/xls;charset='utf-8'");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }

}


mysqli_close($conn);
  ?>
  
