<?php
include "header.php";

 
  $session_id = $_POST['session_id'];

  if($session_id = $_POST['session_id'])
  {
       $conn = new mysqli('localhost', 'root', '', 'website_ivy');
  }

  else{
    header("location: /bainopchuyende/chuyende/404.php");
  }

  $sql = "SELECT * FROM tbl_carta WHERE  session_idA LIKE '$session_id%'  ";
  $result = $conn->query($sql)->fetch_assoc();

  
 
  
?>
    <!-- -----------------------DELIVERY---------------------------------------------- -->
    <section class="detail">
           <div class="container">
           <div class="detail-top">
                <p>CHI TIẾT ĐƠN HÀNG </p>
            </div>
             <form action='donhangdadat.php'  method='POST'>
                Nhập mã đơn hàng: <input type='text' name='session_id'  minlength="8" maxlength="8" required  oninvalid="this.setCustomValidity('Vui lòng nhập đủ 8 ký tự')" oninput="this.setCustomValidity('')">
                
                        <button style="width: 100px; height: 25px; background: #B0E0E6;" class="product-content-right-product-button " type='submit' name="kiemtra"> <ion-icon name="bag-check-sharp"></ion-icon>
                        CHECK
                       </button>
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                   
              </form>
              <h1>Mã đơn hàng <ion-icon name="barcode-sharp"></ion-icon>:  <span style="font-size: 20px; color: #378000;"><?php $ma = substr($session_id,0,8); echo $ma   ?></span></h1>
            <div class="detail-text">
              <div class="detail-text-left-content">

                <h1><span style="font-weight: bold; color:#B0E0E6">Thông tin giao hàng</span> <ion-icon name="create-sharp"></ion-icon></h1>
                <br>
                <?php
                 $sql_thongtin = mysqli_query($conn,"SELECT tbl_order.*, tbl_diachi.*
                FROM tbl_order INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
                WHERE session_idA LIKE '$session_id%'
                ORDER BY tbl_order.order_id DESC LIMIT 1");
                  $result = mysqli_fetch_array($sql_thongtin) 
                ?>
               

                <?php if(isset($result['customer_name'])): ?>
                <?php else: ?>
                  <h1 style="color: red;"> VUI LÒNG NHẬP LẠI MÃ ĐƠN HÀNG</h1>
                <?php endif; ?>


                <p><span style="font-weight: bold;"><ion-icon name="person-circle-sharp"></ion-icon>Họ và tên khách hàng</span>:   <?php if(isset($result['customer_name'])){echo $result['customer_name'];} else {echo "";}?>
                <p><span style="font-weight: bold;"><ion-icon name="call-sharp"></ion-icon>SĐT</span>:  <?php if(isset($result['customer_phone'])){echo $result['customer_phone'];} else {echo "";}?>
                <p><span style="font-weight: bold;"><ion-icon name="location-sharp"></ion-icon>Địa chỉ</span>: <?php if(isset($result['customer_diachi'])){echo $result['customer_diachi'];} else {echo "";}?>, <?php if(isset($result['phuong_xa'])){echo $result['phuong_xa'];} else {echo "";}?>, <?php if(isset($result['quan_huyen'])){echo $result['quan_huyen'];} else {echo "";}?></p>
                
                <?php
                   $sql_phuongtien= mysqli_query($conn,"SELECT * FROM tbl_payment WHERE session_idA LIKE '$session_id%' ORDER BY payment_id DESC LIMIT 1");
                   $result = mysqli_fetch_array($sql_phuongtien) 
                ?>
                <p><span style="font-weight: bold;"><ion-icon name="cube-sharp"></ion-icon>Phương thức giao hàng</span>:  <?php if(isset($result['giaohang'])){echo $result['giaohang'];} else {echo "";}?></p>
                <p><span style="font-weight: bold;"><ion-icon name="wallet-sharp"></ion-icon>Phương thức thanh toán </span>: <?php if(isset($result['thanhtoan'])){echo $result['thanhtoan'];} else {echo "";}?>
                 <?php

                   $sql_phuongtien1= mysqli_query($conn,"SELECT * FROM tbl_payment WHERE session_idA LIKE '$session_id%' ORDER BY payment_id DESC LIMIT 1");
                   while($result = mysqli_fetch_array($sql_phuongtien1)){                  
                ?>
                <p><span style="font-weight: bold;"><ion-icon name="calendar-outline"></ion-icon>Ngày đặt hàng:</span> 
                  <?php if(isset($result['order_date'])){echo $result['order_date'];} else {echo "";}?></p>

              

                    <?php if($result['statusA']==1): ?>
                   
                    <h1><span style="font-weight: bold; color: red">
                     Tình Trạng: Đang trong quá trình giao hàng 
                  <img src="image/icon.png" style="width: 48px;height: 48px;">
                  </h1> 
                   </span>
                    <?php elseif($result['statusA']==0): ?>

                     <h1><span style="font-weight: bold; color: blue;">
                      Tình Trạng: Đang xử lý đơn hàng...  <img src="image/icongif5.gif" style="width: 32px;height: 32px;"></span> </h1>

                     <?php else: ?>

                    <h1>  Tình Trạng: Đã giao hàng thành công  <img src="image/xong.png" style="width: 48px;height: 32px;"> </h1>

  
                   <?php endif; ?>
                   <?php 
                 }
                   ?>
                   

               
            </div>
            <div class="detail-text-left-content">
             
                
                <br>

                 <div class="detail-text-right">
                  <?php
                          
                          $SL = 0;
                          $TT = 0;
                          $tienship = 0;
                          $cantra = 0;
                          $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_carta WHERE  session_idA LIKE '$session_id%'"); 
                          
                          ?> 
                <table>

                    <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>SL</th>
                            <th>Giá</th>
                    </tr>
                                  <?php
                        $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                        ?> 
                   

                          <tr>
                               <td><img src="<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                               <td><p><?php echo $result['sanpham_tieude'] ?></p></td>
                               <td><img src="<?php echo $result['color_anh'] ?>" alt=""></td>
                               <td><p><?php echo $result['sanpham_size'] ?></p></td>
                               <td><span><?php echo $result['quantitys'] ?></span></td>
                               <td><p><?php $resultC = number_format($result['sanpham_gia']); echo $resultC ?><sup>đ</sup></p></td>
                               <?php $a = (int)$result['sanpham_gia']; $b = (int)$result['quantitys']; $TTA = $a*$b;   ?>
                           </tr>
                          <?php
                           $SL = $SL + $result['quantitys'];
                           $TT =  $TT  + $TTA ;
                           if($TT>= 10000000)
                              {
                                  $tienship = 0;
                              }
                              else
                              {
                                  $tienship = 30000;
                              }
                           $cantra = $TT + $tienship;
                              
                          ?>
                          <?php
                        } 
                        ?> 
                     
                </table>
                </div>
                <div class="detail-content-right-bottom">
                   <table style="width: 200px;">
                            <tr>
                                <th colspan="2"><p>TỔNG TIỀN GIỎ HÀNG</p></th>
                            </tr>
                            <tr>
                                <td>TỔNG SẢN PHẨM</td>
                                <td><?php $resultC = number_format($SL); echo $resultC ?></td>
                            </tr>
                            <tr>
                                <td>TỔNG TIỀN HÀNG</td>
                                <td><p><?php $resultC = number_format($TT); echo $resultC ?><sup>đ</sup></p></td>
                            </tr>
                            <tr>
                                <td>PHÍ VẬN CHUYỂN</td>
                                <td><p><?php $resultC = number_format($tienship); echo $resultC ?><sup>đ</sup></p></td>
                            </tr>
                            <tr>
                                <td style="color: red">THÀNH TIỀN</td>
                                <td><p style="color: red"><?php $resultD = number_format($cantra); echo $resultD; ?><sup>đ</sup></p></td>
                            </tr>
                            
                        </table>
                </div>
                
            </div>
                
            </div>
            <div class="detail-text-right-content">
            
    </section>
      <div class="container">
            <div class="cartegory-top row">
               
                 <p> <span style="font-weight: bold; color:red">   Những sản phẩm bán chạy nhất </span></p>
                  <hr  width="100%" size="1px" align="center" color="black" />
            </p><span></span><p></p>
            </div>
        </div>
    <section class="product-related" style="width: 100%">
         <div class="container">
          <div class="row justify-between">
                   
                        <?php
                $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE  sanpham_hot = 1 LIMIT 0,5");
                ?>
                 <?php
                        $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                        ?> 

                  <div class="product-related-item">
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
                   
                </div>
            </div>
        </div>
      </section>
    

     <!-- -------------------------Footer -->
<?php
include "footer.php"
?>



