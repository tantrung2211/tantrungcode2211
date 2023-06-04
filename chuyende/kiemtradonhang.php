<?php
include "header.php";

 


  $conn = new mysqli('localhost', 'root', '', 'website_ivy');



  $sql = "SELECT * FROM tbl_carta WHERE  session_idA LIKE '$session_id%'  ";
  $result = $conn->query($sql)->fetch_assoc();

  
 
  
?>
    <!-- -----------------------DELIVERY---------------------------------------------- -->
    <section class="detail">
           <div class="container">
           <div class="detail-top">
                <p>KIỂM TRA ĐƠN HÀNG</p>
            </div>
            
            <div class="detail-text">
            <div class="detail-text-left-content">
              <form action='donhangdadat.php'  method='POST'>
                Nhập mã đơn hàng: <input type='text' name='session_id'  minlength="8" maxlength="8" required  
                oninvalid="this.setCustomValidity('Vui lòng nhập đủ 8 ký tự')" oninput="this.setCustomValidity('')"  >               
                  <button style="width: 100px; height: 25px; background: #B0E0E6;" class="product-content-right-product-button" 
                  type='submit' name="kiemtra"  > 
                  <ion-icon name="bag-check-sharp"></ion-icon>
                        CHECK
                       </button>
                </form>
                
                <br>

                <div class="detail-text">
              <div class="detail-text-left-content">

                <h1><span style="font-weight: bold; color:#B0E0E6">Thông tin giao hàng</span> <ion-icon name="create-sharp"></ion-icon></h1>
                <br>
               
               

                


                <p><span style="font-weight: bold;"><ion-icon name="person-circle-sharp"></ion-icon>Họ và tên khách hàng</span>:  
                <p><span style="font-weight: bold;"><ion-icon name="call-sharp"></ion-icon>SĐT</span>:  
                <p><span style="font-weight: bold;"><ion-icon name="location-sharp"></ion-icon>Địa chỉ</span>:</p>
                
                
                <p><span style="font-weight: bold;"><ion-icon name="cube-sharp"></ion-icon>Phương thức giao hàng</span>:  </p>
                <p><span style="font-weight: bold;"><ion-icon name="wallet-sharp"></ion-icon>Phương thức thanh toán </span>: 
                
                <p><span style="font-weight: bold;"><ion-icon name="calendar-outline"></ion-icon>Ngày đặt hàng:</span> 
                 
                   
                    <h1><span style="font-weight: bold; color: red">
                     Tình Trạng: 
                
                  </h1> 
                   </span>
                   

                    
                   

               
            </div>
            <div class="detail-text-left-content">
             
                
                <br>

                 <div class="detail-text-right" style="margin-left: 300px">
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
                <div class="detail-content-right-bottom" style="margin-left: 300px">
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
            
    </section>
 
        <div class="container">
            <div class="cartegory-top row">
               
                 <p> <span style="font-weight: bold; color:red">   Những sản phẩm bán chạy nhất </span></p>
                  <hr  width="100%" size="1px" align="center" color="black" />
            </p><span></span><p></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
               
      <section class="product-related" style="width: 100%">
         <div class="container">
          <div class="row justify-between">
                   
                        <?php
                $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE  sanpham_hot = 1  LIMIT 0,5");
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



