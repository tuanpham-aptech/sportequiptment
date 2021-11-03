<?php 
$query = "select *from products where status = 1";
    $page = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    $productperpage = 5;
    $from = ($page-1)*$productperpage;
    $totalProducts = $con->query($query);
    $totalPages = ceil(mysqli_num_rows($totalProducts)/$productperpage);// làm tròn lên bằng hàm ceil
    $query.=" limit $from,$productperpage";
    $result = $con->query($query);
?>
<div class="row">
<?php foreach($result as $key):?>
<div class="col l-2-4 m-4 c-12">
    <div class="card">
        <div class="card__wrap">
            <a class="card__wrap-img-top">
                <img src="./assets/upload_images/<?php echo $key['image'];?>" alt="<?php echo $key['name'];?>">
            </a>
            <div class="info-wrap">
                <p class="product__title">
                    <a class="product__link"><?php echo $key['name'];?></a>
                </p>
                <span class="product__price"><?php echo number_format($key['price'],0,',','.');?>đ</span>
            </div>
            <div class="card__wrap-favourites">
                <p class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product__brand">Ray Ban</p>
            </div>
            <div class="card__wrap-button">
                <a href="index.php?option=product_detail&id=<?php echo $key['product_id'];?>" class="card__wrap-button-detail">Xem Thêm</a>
                <a href="?option=cart&action=add&id=<?=$key['product_id'];?>" class="card__wrap-button-order">Mua Hàng </a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
</div>
<div class=" row pages">
    <?php for($i =1; $i <= $totalPages;$i++):?>
        <
        <a class="<?=(empty($_GET['page'])&& $i==1)|| $_GET['page']==$i ?'highlight':''?>" href="?page=<?php echo $i;?>"><?php echo $i?></a>
    <?php endfor;?>
</div>