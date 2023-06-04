
<?php
include "header.php";

if(isset($_SESSION['dangky']))
  {
       $conn = new mysqli('localhost', 'root', '', 'website_ivy');
  }

  else{
    header("location: /bainopchuyende/chuyende/404.php");
  }

  $conn = new mysqli('localhost', 'root', '', 'website_ivy');
 	if (isset($_GET['session_idA'])) {
  $session_idA = $_GET['session_idA'];
 
}
  
?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- -----------------------DELIVERY---------------------------------------------- -->
    <section class="detail">
           <div class="container">
           <div class="detail-top">
                <p>LỊCH SỬ GIAO DỊCH </p>
            </div>
            <br>
              <!-- <h1>Mã đơn hàng <ion-icon name="barcode-sharp"></ion-icon>:  <span style="font-size: 20px; color: #378000;"><?php $ma = substr($session_id,0,8); echo $ma   ?></span></h1> -->
            <div class="detail-text">
              <div class="detail-text-left-content">
              		  
				<div class="detail-text-right">
                  <?php

				      
                   		if(isset($_GET['id_dangky'])){
									$id_dangky = $_GET['id_dangky'];
								}else{
									$id_dangky = '';
								}
                          $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_payment INNER JOIN tbl_order ON tbl_payment.session_idA = tbl_order.session_idA
                          	WHERE tbl_order.id_dangky = '".$_SESSION['id_dangky']."'"); 

                          ?> 
                <table  >

                    <tr>
                            <th>TT</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                             <th width="35%">TÌNH TRẠNG</th>
                              <th>Quản lý</th>
                              <th>Yêu cầu</th>
                              
                    </tr>
                                  <?php
                        $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                        ?> 
                   

                          <tr>
                          	<td><?php echo $i; ?></td>
                               <td><?php echo substr($result['session_idA'],0,8); ?></td>
                               
                                <td><?php echo $result['order_date']; ?></td>
                                
                               <td>	 <?php if($result['statusA']==1): ?>   
                  
               
                   <p style="color: red;"> Đang trong quá trình giao hàng   <img src="image/icon.png" style="width: 48px;height: 48px;">
                   </p>  
                    <?php elseif($result['statusA']==0): ?>

                     
                    <p style="color: blue;">  Đang xử lý đơn hàng...    <img src="image/icongif5.gif" style="width: 32px;height: 32px;">
                    </p>

                     <?php else: ?>

                   <p >   Đã giao hàng thành công  <img src="image/xong.png" style="width: 32;height: 16px;"> </p>

  
                   <?php endif; ?>
               </td>
              <td><a href="lichsumuahang.php?=<?php echo $_SESSION['id_dangky'] ?>
										&session_idA=<?php echo substr($result['session_idA'],0,8) ?>">Xem chi tiết</a></td>
                    <!-- <?php 
                                $_GET['session_idA'] = $result['session_idA']
                               ?> -->
											
                    <td>   <?php if($result['statusA']==0): ?>   
                
                    
                       <a   href=" huygiaodich.php?session_idA=<?php echo $result['session_idA'] ?>" 
                        onclick="return confirm('Sẽ thực hiện hủy giao dịch, bạn có chắc chắn chứ ?');">
                          <p style="color: #737373;">Hủy giao dịch... </p></a>
                      
                      
                  

                

                     <?php else: ?>

                    <p style="color: #C7BEBC;" > Không thể hủy...  </p>

  
                   <?php endif; ?>
									
                           </tr>
                         
                          <?php
                        } 
                        ?> 
                    
                </table>
                </div>
            
               
            </div>
            <div class="detail-text-right-content">
             
                
                <br>

                 <div class="detail-text-left-content">
             
                
                <br>

                 <div class="detail-text-right">
                  <?php
                          
                         
								 
					
		

                          $SL = 0;
                          $TT = 0;
                          $tienship = 0;
                          $cantra = 0;
                           $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_carta WHERE  session_idA LIKE '$session_idA%' ORDER BY carta_id DESC"); 
                          
                          ?> 
                <table style="width: 500px">

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
                $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE  sanpham_hot = 1 ");
                ?>
                 <?php
                        $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                        ?> 

                  <div class="product-related-item">
                            <a href="product.php?sanpham_id=<?php echo $result['sanpham_id']?>">
                                <img style="width: 100%; height: 180px;" src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt=""></a>
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
<!-- <script >

function alert()
{
  swal({
  title: "Hủy giao dịch  ",
  text: "Bạn chắc chắn chứ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Xóa thành công giao dịch", 
      {
      icon: "success",
    }
    );
  } else {
    swal("Giữ lại giao dịch thành công");
  }
}); 
} 


</script> -->

     <!-- -------------------------Footer -->
<?php
include "footer.php"
?>




