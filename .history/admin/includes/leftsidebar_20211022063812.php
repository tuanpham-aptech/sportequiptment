<?php 
$chuaxuly = mysqli_num_rows($con->query("select *from orders where status =1 "));
$dangxuly = mysqli_num_rows($con->query("select *from orders where status =2 "));
$daxuly = mysqli_num_rows($con->query("select *from orders where status =3 "));
$huy = mysqli_num_rows($con->query("select *from orders where status =4 "));

?>
<div class="left-sidebar">
    <ul  class="list-item">
        <li class="item"><a class="item-link" href="index.php">Admin area</a></li>
        <li class="item">
            <a class="item-link">
                Danh mục thành viên 
                <i class="fas fa-chevron-right"></i>
            </a>
            <ul class="sub-list">
                <li class="sub-item">
                    <a href="?option=list_member" class="sub-link">Danh sách </a>
                </li>
            </ul>
        </li>
        <li class="item">
            <a class="item-link">
                Danh mục sản phẩm
                <i class="fas fa-chevron-right"></i>
            </a>
            <ul class="sub-list">
                <li class="sub-item">
                    <a href="?option=add_cat" class="sub-link">Thêm mới</a>
                </li>
                <li class="sub-item">
                    <a href="?option=list_cat" class="sub-link">Danh sách </a>
                </li>
            </ul>
        </li>
        <li class="item">
            <a class="item-link">
                Thương hiệu
                <i class="fas fa-chevron-right"></i>
            </a>
            <ul class="sub-list">
                <li class="sub-item">
                    <a href="?option=add_brand" class="sub-link">Thêm mới</a>
                </li>
                <li class="sub-item">
                    <a href="?option=list_brand" class="sub-link">Danh sách </a>
                </li>
            </ul>
        </li>
        <li class="item">
            <a class="item-link">
                Sản phẩm 
                <i class="fas fa-chevron-right"></i>
            </a>
            <ul class="sub-list">
                <li class="sub-item">
                    <a href="?option=add_product" class="sub-link">Thêm mới</a>
                </li>
                <li class="sub-item">
                    <a href="?option=list_product" class="sub-link">Danh sách </a>
                </li>
            </ul>
        </li>
        <li class="item">
            <a class="item-link">
                Đơn hàng 
                <i class="fas fa-chevron-right"></i>
            </a>
            <ul class="sub-list">
                <li class="sub-item">
                    <a href="?option=order&status=1" class="sub-link">Đơn hàng chưa xử lý (<?=$chuaxuly;?>)</a>
                </li>
                <li class="sub-item">
                    <a href="?option=order&status=2" class="sub-link">Đơn hàng đang xử lý (<?=$dangxuly;?>) </a>
                </li>
                <li class="sub-item">
                    <a href="?option=order&status=3" class="sub-link">Đơn hàng đã xử lý (<?=$daxuly;?>)</a>
                </li>
                <li class="sub-item">
                    <a href="?option=order&status=4" class="sub-link">Đơn hàng huỷ (<?=$huy;?>) </a>
                </li>
            </ul>
        </li>
    </ul>
</div>