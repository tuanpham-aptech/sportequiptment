<?php ob_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Admin area</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Mulish:wght@300&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/css/style.css">
    <link rel="stylesheet" href="styles/css/main.css">
    <link rel="stylesheet" href="styles/css/responsive.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <header class="header">
                <div class="logo">
                    <a href="#!" class="logo-link">
                        Admin<span>area</span>
                    </a>
                </div>
                <div class="title-sigin">
                    <div class="dropdown">
                        <div class="dropdown-select">
                            <?php if(!empty($_SESSION['admin'])):?>
                                <span class="dropdown-value"><i class="fa fa-user"></i> : <?=$_SESSION['admin'];?> </span>
                            <i class="fa fa-chevron-down"></i>
                            <?php else :?>
                            <i class="fa fa-user"></i>
                            <span class="dropdown-value">Đăng nhập </span>
                            <?php endif;?>
                        </div>
                        <div class="dropdown-list">
                            <div class="dropdown-item"><a href="#">Thông tin </a></div>
                            <div class="dropdown-item"><a href="index.php?option=logout">Đăng xuất</a></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>