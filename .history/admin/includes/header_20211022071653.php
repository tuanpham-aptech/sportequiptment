<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/css/style.css">
    <link rel="stylesheet" href="styles/css/main.css?v=3">
</head>
<body>
<header class="header-wrap">
        <!-- <button></button> -->
        <div class="logo-admin">
            <h1>Sprort - <span>Equipment</span></h1>
        </div>
        <!-- <i class="fa fa-bars menu-toggle"></i> -->
        <ul class="nav">
            <li class="item">
                <a class="item-link" href="#">
                    <?php if(!empty($_SESSION['admin'])):?>
                    <i class="fa fa-user"></i>
                    Hello <?=$_SESSION['admin'];?> 
                    <i class="fa fa-chevron-down"></i>
                    <?php else :?>
                    <i class="fa fa-user"></i>
                        Đăng nhập
                    <?php endif;?>
                </a>
                <ul class="subnav">
                    <li><a href="#">Info</a></li>
                    <li><a href="index.php?option=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>