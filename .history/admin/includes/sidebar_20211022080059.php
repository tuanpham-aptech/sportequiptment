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
                            <div class="sidebar-drop-item">
                                <a href="#!">Cập nhât </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Danh mục</span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="#!">Thương hiệu  </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="#!">Danh sách </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>