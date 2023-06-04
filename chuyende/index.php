<?php
include "config/config.php";
include "header.php";
include "slider.php";
  $conn = new mysqli('localhost', 'root', '', 'website_ivy');

  $link = mysqli_connect('localhost', 'root', '', 'website_ivy');
  if (!$link) {
      header("Location: /bainopchuyende/chuyende/404.php");
      exit;
  }
?>
 <section class="cartegory" style="padding: 10px;">
        <div class="container">
            <div class="cartegory-top row">
               
                <p><a style="color:#000000;" href="index.php">Trang chủ</a></p>  <span>&#8594;  </span> <p> <span style="font-weight: bold; color:red">   Những sản phẩm bán chạy nhất </span></p> 
            </p><span></span><p></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
            	 <div class="cartegory-left">
                     <ul>
                    <?php
                        $show_danhmuc = $index ->show_danhmuc();
                        if($show_danhmuc){while($result = $show_danhmuc ->fetch_assoc()) {

                        
                        ?>
                        <li class="cartegory-left-li"><a ><?php echo $result['danhmuc_ten'] ?></a>
                            <ul>
                                    <?php
                                      $danhmuc_id = $result['danhmuc_id'];
                                      $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                      if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                    ?>
                                    <li ><a  href="cartegory.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a></li>
                                    <?php
                                     } }
                                    ?>
                            </ul>
                        
                        </li>    
                        <?php
                        } }
                        ?>                  
                    </ul>
                </div>
         <div class="cartegory-right">
          <hr  width="100%" size="1px" align="center" color="black" />
                   <div class="cartegory-right-content row">
                        <?php
                $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE  sanpham_hot = 1 LIMIT 0,4 ");
                ?>
                 <?php
                        $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                        ?> 

                 <div class="cartegory-right-content-item">
                            <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>">
                                <img style="width: 100%; height: 180px;" src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt=""></a>
                                 <p style="height: 10px;"></p>
                            <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>"> <h1><?php echo $result['sanpham_tieude']?></h1></a>

                            <p><?php $resultA = number_format($result['sanpham_gia']); echo $resultA?><sup>đ</sup></p>
                            <div class="product-content-right-product-button">
                       <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>"> <button class="add-cart-btn" style="width: 100%"> <ion-icon name="eye-sharp"></ion-icon>  <p>XEM NHANH</p></button> </a>
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                            </div>
                     </div>

                       <?php
                        } 
                        ?> 

                     
                   
                </div>
                 <p> <span style="font-weight: bold; color:red">   Sản phẩm MỚI nhập   </span></p>
               <hr  width="100%" size="1px" align="center" color="black" />
                   <div class="cartegory-right-content row">
                        <?php
                $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE  sanpham_hot = 2 LIMIT 0,4 ");
                ?>
                 <?php
                        $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                        ?> 

                 <div class="cartegory-right-content-item">
                            <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>">
                                <img style="width: 100%; height: 180px;" src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt=""></a>
                                 <p style="height: 10px;"></p>
                            <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>"> <h1><?php echo $result['sanpham_tieude']?></h1></a>

                            <p><?php $resultA = number_format($result['sanpham_gia']); echo $resultA?><sup>đ</sup></p>
                            <div class="product-content-right-product-button">
                       <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>"> <button class="add-cart-btn" style="width: 100%"> <ion-icon name="eye-sharp"></ion-icon>  <p>XEM NHANH</p></button> </a>
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                            </div>
                     </div>

                       <?php
                        } 
                        ?> 
           
        </div>
    </section>
       















<?php
include "footer.php"
?>