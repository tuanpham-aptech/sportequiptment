<?php
ob_start();
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>DESIGN PROJECT</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/base.css?v=1">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <nav class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="index.php?option=home" class="header__navbar-link"><span>Trang chủ</span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="index.php?option=home" class="header__navbar-link"><span>Sản phẩm</span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link"><span>Kết nối</span><i class="fab fa-facebook"></i><i class="fab fa-instagram"></i> </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link"><i class="far fa-bell"></i><span>Thông Báo </span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link"><i class="fas fa-question-circle"></i><span>Hỗ trợ</span> </a>
                    </li>
                    <?php if(empty($_SESSION['member'])):?>
                    <li class="header__navbar-item">
                        <a href="index.php?option=register" class="header__navbar-link"><span>Đăng Ký </span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="index.php?option=login" class="header__navbar-link"><span>Đăng Nhập </span></a>
                    </li>
                    <?php else :?>
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link">
                            <i class="fa fa-user-circle"></i>
                            <?= $_SESSION['member'];?>
                        </a>
                        <ol class="sub-nav">
                            <li class="sub-item"><a href="?option=edit_profile" class="sub-link">Thông tin tài khoản </a></li>
                            <li class="sub-item"><a href="?option=change_password" class="sub-link">Đổi mật khẩu </a></li>
                            <li class="sub-item"><a href="?option=logout" class="sub-link">Đăng xuất </a></li>
                        </ol>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="header__search-wraper">
                <div class="header__search--logo">
                    <a href="#" class="header__search--logo-link">
                        <span style="color:purple;">Sport</span> Equipment
                    </a>
                </div>
                <div class="header__search--search">
                  <form method="POST" action="?option=search" class="search-form">
                    <input type="search" name ="search" class="header__search--search-input" placeholder="Nhập từ khoá tìm kiếm ">
                    <input type="submit" class="header__search--search-btn" value="Search">
                  </form>
                  <?php if(empty($_SESSION['member'])):?>
                    <a href="index.php?option=cart" class="header__search--cart">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                  <?php else: ?>
                    <a href="index.php?option=cart" class="header__search--cart"><i class="fas fa-shopping-cart"></i></a>
                    <!-- <span class="header__search--qty">
                        
                    </span> -->
                  <?php endif; ?>
                </div> 
            </div>
          <label  for= "header-mobile-input" class="header__bars-btn">
            <i class="fa fa-bars"></i>
          </label>
            <input type="checkbox" class="header__input-check" id="header-mobile-input">
          <label  for= "header-mobile-input" class=""></label>
         <div class="header__overlay"></div>
          <div class="header__mobile">
            <label for="header-mobile-input" class="header__mobile-close">
                <span class="fa fa-times"></span>
            </label >
            <nav class="header__navbar-mobile">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="index.php?option=home" class="header__navbar-link"><span>Trang chủ</span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link"><span>Sản phẩm</span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link"><span>Kết nối</span><i class="fab fa-facebook"></i><i class="fab fa-instagram"></i> </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="change_password.html" class="header__navbar-link"><i class="far fa-bell"></i><span>Thông Báo </span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="order.html" class="header__navbar-link"><i class="fas fa-question-circle"></i><span>Hỗ trợ</span> </a>
                    </li>
                    <?php if(empty($_SESSION['member'])):?>
                    <li class="header__navbar-item">
                        <a href="index.php?option=register" class="header__navbar-link"><span>Đăng Ký </span></a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="index.php?option=login" class="header__navbar-link"><span>Đăng Nhập </span></a>
                    </li>
                    <?php else :?>
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-link">
                            <i class="fa fa-user-circle"></i>
                            <?= $_SESSION['member'];?>
                        </a>
                        <ol class="sub-nav">
                            <li class="sub-item"><a href="#" class="sub-link">Thông tin tài khoản </a></li>
                            <li class="sub-item"><a href="?option=change_password" class="sub-link">Đổi mật khẩu </a></li>
                            <li class="sub-item"><a href="?option=logout" class="sub-link">Đăng xuất </a></li>
                        </ol>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="header__search-mobile">
                <div class="header__search--logo">
                    <a href="#" class="header__search--logo-link">
                        <span>Sport Equipment</span>
                    </a>
                </div>
                <div class="header__search--search">
                  <form action="?option=search" method="POST" class="search-form">
                    <input type="search" name ="search" class="header__search--search-input" placeholder="Nhập từ khoá tìm kiếm ">
                    <input type="submit" class="header__search--search-btn">
                  </form>
                  <?php if(empty($_SESSION['member'])):?>
                    <a href="index.php?option=cart" class="header__search--cart"><i class="fas fa-shopping-cart"></i></a>
                  <?php else: ?>
                    <a href="index.php?option=cart" class="header__search--cart"><i class="fas fa-shopping-cart"></i></a>
                  <?php endif; ?>
                </div>
            </div>
          </div>
        </div>