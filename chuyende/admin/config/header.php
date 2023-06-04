<?php
@ob_start();
session_start();
$session_id = session_id();

?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "class/index_class.php";
Session::init();
$index = new index;
?>
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1)
    {
        unset($_SESSION['dangky']);
          $_SESSION = array();
            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finally, destroy the session.
            session_destroy();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/layoutside.css">
    <link rel="stylesheet" href="css/all.min.css"> 
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" 
    referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mainstyle.css">
     <title>TTSHOP</title>
</head>
<body>
    <secsion class="top">
        <div class="container">
            <div class="row">
                <!-- <div class="menu-bar">
                    <i class="fas fa-bars"></i>
                </div> -->
                <div class="top-logo">
                    <a href="index.php"><img src="image/logo10.png" style="width: 160px; height: 44px;" alt=""></a>
                </div>
                
                <div class="top-menu-items">
                    <ul>
                        <?php
                        $show_danhmuc = $index ->show_danhmuc();
                        if($show_danhmuc){while($result = $show_danhmuc ->fetch_assoc()) {

                        
                        ?>
                        <li style="padding-right: 0px; padding-left: 10px;"><?php echo $result['danhmuc_ten'] ?>
                            <ul class="top-menu-item">
                                    <?php
                                      $danhmuc_id = $result['danhmuc_id'];
                                      $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                      if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                    ?>
                                    <li><a href="cartegory.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a></li>
                                    <?php
                                     } }
                                    ?>
                            </ul>
                            <i class="fas fa-chevron-down"></i>
                        </li>

                        <?php
                        } }

                        ?>

                    
                    </ul>

                </div>
                <div class="top-menu-icons">
                    <ul >
                        <li>
                           
                           

                             <a style="width: 70px; color: black;" href="tintuc.php">TIN TỨC</a>
                              <a style="width: 65px; color: black;" href="lienhe.php">LIÊN HỆ</a>
                           
                            
                             <form class="form-inline" action="timkiem.php" method="POST">
                                <input class="form-control mr-sm-2" name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
                                <button style="border-left-width: 0px;border-right-width: 0px;" class="btn my-2 my-sm-0" name="search_button" type="submit"><i class="fas fa-search" style="left: 290px;top: 16px;"></i></button>
                            </form>

                        </li>
                      <li>
                           <a style=" width: 120px; color: black;" href="kiemtradonhang.php">Kiểm tra đơn hàng</a><ion-icon name="bag-check-sharp"></ion-icon>
                      </li>
                        <li >

                            <i class="fas fa-user-secret"></i>
                            <div class="cart-content-mini">
                                <div class="cart-content-mini-top">
                                    <P>KHÁCH HÀNG</P>
                                </div>
                                
                               
                               <?php if(isset($_SESSION['dangky'])): ?>
                                
                                <div class="cart-content-mini-bottom" style="color: red;">
                                    <br>
                                   <?php
                                        if(isset($_SESSION['dangky'])){
                                            echo 'xin chào, '.$_SESSION['dangky'];
                                        }
                                        ?>
                                </div>
                                <div class="product-content-right-product-button">
                                   <a href="lichsu.php?=<?php echo $_SESSION['id_dangky'] ?>&session_idA=non" style="color: black;"> <button class="add-cart-btn" style="width: 100%">
                                    <p>Lịch sử mua hàng <ion-icon name="receipt-outline"></ion-icon></p></button> </a>
                                  
                                        </div>
                        
                                     <div class="product-content-right-product-button">
                                   <a href="index.php?dangxuat=1" style="color: black;"> <button class="add-cart-btn" style="width: 100%">
                                    <p>Đăng xuất <ion-icon name="log-out-outline"></ion-icon></p></button> </a>
                                  
                                        </div>
  
                                    <?php else: ?>
                                        
                              
                                <div class="product-content-right-product-button">
                                   <a href="dangnhap.php" > <button class="add-cart-btn" style="width: 100%">
                                    <p>Đăng nhập <ion-icon name="log-in-outline"></ion-icon></p></button> </a>        
                                 </div>
            
                                <div class="product-content-right-product-button">
                                   <a href="dangky.php" > <button class="add-cart-btn" style="width: 100%">
                                    <p>Đăng ký <ion-icon name="person-add-outline"></ion-icon></p></button> </a>    
                                    </div>
                                        
                                      <?php endif; ?>
                                       
                                
                                
                            </div>
                        </li>
                        
                        <li>
                            <a style="width: 30px;" href="cart.php"><i class="fas fa-shopping-cart" style="color: black;"></i><span><?php  if(Session::get('SL'))  {echo Session::get('SL'); } ?> </span></a>
                            <div class="cart-content-mini">
                                <div class="cart-content-mini-top">
                                    <P>Giỏ hàng</P>
                                </div>
                                <?php 
                                $session_id = session_id();
                                $show_cartF = $index -> show_cartF($session_id);
                                if($show_cartF){while($result = $show_cartF->fetch_assoc()){
                                
                                 ?>
                                <div class="cart-content-mini-item">
                                    <img style="width:50px" src="<?php echo $result['sanpham_anh']  ?>" alt="">
                                    <div class="cart-content-item-text">
                                    <h1><?php echo $result['sanpham_tieude']  ?></h1> 
                                    <img style="width: 32px; height: 32px;" src="<?php echo $result['color_anh'] ?>" alt="">
                                    <p>Size: <?php echo $result['sanpham_size']  ?></p>
                                    <p>SL: <?php echo $result['quantitys']  ?></p>
                                    </div>
                                </div>
                                    <?php
                                    
                                        
                                            }}
                                ?>
                                
                                <div class="cart-content-mini-bottom">
                                    <p><a href="cart.php">...Xem chi tiết</a></p>
                                </div>
                            </div>
                            
                        </li>
                          <li><ion-icon name="call-sharp"></ion-icon>HOTLINE:0987654321</i>  </li>
                       
                    
                    </ul>

                </div>
            </div>
        </div>
    </secsion>
