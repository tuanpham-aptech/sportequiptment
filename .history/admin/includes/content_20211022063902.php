<div class="admin-content">
    <div class="content">
    <?php 
        if(isset($_GET['option'])){
          switch($_GET['option']){
            case 'list_member':
              include "views/categories/list_cat.php";
              break;
            case 'list_cat':
              include "views/categories/list_cat.php";
              break;
            case 'add_cat':
              include "views/categories/add_cat.php";
              break;
            case 'edit_cat':
              include "views/categories/edit_cat.php";
              break;
            case 'list_brand':
                include "views/brands/list_brand.php";
                break;
            case 'add_brand':
                include "views/brands/add_brand.php";
                break;
            case 'edit_brand':
                include "views/brands/edit_brand.php";
                break;
            case 'list_product':
              include "views/products/list_products.php";
              break;
            case 'add_product':
                include "views/products/add_products.php";
                break;
            case 'edit_product':
                include "views/products/edit_products.php";
                break;
            case 'order':
              include "views/orders/list_order.php";
              break;
            case 'order_detail':
              include "views/orders/order_detail.php";
              break;
            case 'logout':
                unset($_SESSION['admin']);
                header('location:?option=login_admin');
                break;
          }
        }
    ?>
    </div>
</div>