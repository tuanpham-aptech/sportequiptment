<?php 
$chuaxuly = mysqli_num_rows($con->query("select *from orders where status =1 "));
$dangxuly = mysqli_num_rows($con->query("select *from orders where status =2 "));
$daxuly = mysqli_num_rows($con->query("select *from orders where status =3 "));
$huy = mysqli_num_rows($con->query("select *from orders where status =4 "));

?>
<div class="sidebar">
                <div class="sidebar-main">
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Quản lý thành viên </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=show_member">Danh sách </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Thương hiệu </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=list_brand">Danh sách </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=add_brand">Thêm mới </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Danh mục </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=list_cat">Danh sách </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=add_cat">Thêm mới </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Sản phẩm </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=list_product">Danh sách </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=add_brand">Thêm mới </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>