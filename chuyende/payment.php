<?php
include "header.php";
$conn = new mysqli('localhost', 'root', '', 'website_ivy');
?>
<?php 
if(isset($_SESSION['email'])){
    $_SESSION['email'];
 }
date_default_timezone_set("Asia/Ho_Chi_Minh");
require('mail/sendmail.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $session_idA = session_id();
    $today = date("d/m/Y H:i:s");
    $deliver_method = $_POST['deliver-method'];
    $method_payment = $_POST['method-payment'];
    $email = $_SESSION['email'];
	$insert_payment = $index ->insert_payment($session_idA,$deliver_method,$method_payment,$today,$email);


    $tieude = "Đặt hàng từ webstite TTSHOP Thành công!";
    $noidung .="  <img src='cid:logo_2u' />";
    $noidung .= "<h1>Cảm ơn quý khách đã đặt hàng tại TTSHOP với mã đơn hàng : ".substr($session_id,0,8)."</h1>" ;
     $noidung .=" <h1 style='color: red'>Đơn hàng của quý khách đang trong quá trình xử lý!! </h1>";

       $noidung .=" <h1 style='color: red'>Chúng tôi sẽ liên hệ với bạn để xác thực trong thời gian sớm nhất !!</h1>";
     $noidung .=" <h2>Ngày đặt hàng : ".$today."</h2>";

     $sql_thongtin = mysqli_query($conn,"SELECT tbl_order.*, tbl_diachi.*
                FROM tbl_order INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
                WHERE session_idA LIKE '$session_id%'
                ORDER BY tbl_order.order_id DESC LIMIT 1");
                  $result = mysqli_fetch_array($sql_thongtin);
        $noidung .="
        <h4>Họ và tên khách hàng:".$result['customer_name']." </h4>
        <h4>Số điện thoại: ".$result['customer_phone']."</h4>
        <h4>Địa chỉ giao hàng: ".$result['customer_diachi'].", ".$result['phuong_xa'].", ".$result['quan_huyen']."</h4>
        ";
    $noidung .= "
    <h2>Đơn hàng đặt bao gồm :</h2>" ;
     
     $sql_select_sp = mysqli_query($conn,"SELECT * FROM tbl_carta WHERE  session_idA LIKE '$session_id%' ORDER BY carta_id DESC"); 

    $noidung .=" <table width='500px'  style='border:1px solid black;'>";
    $noidung .="<tr>
    <th style='border:1px solid black;'>#</th>
    <th style='border:1px solid black;'>Tên sản phẩm</th>
    <th style='border:1px solid black;'>Số lượng</th>
    <th style='border:1px solid black;'>Đơn Giá</th>
    <th style='border:1px solid black;'>Thành tiền</th>
    </tr>";
   
     $i = 0;
     $TT = 0;
     $tienship = 0;
     $cantra = 0;
     while($result = mysqli_fetch_array($sql_select_sp)){ 
      $i++;  
         $sanpham_gia=$result["sanpham_gia"];
        $quantitys=$result["quantitys"];
        $total= $sanpham_gia*$quantitys;
        $a = (int)$result['sanpham_gia'];
         $b = (int)$result['quantitys']; 
         $TTA = $a*$b;
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
        $noidung .="<tr>
         <td style='border:1px solid black;'>$i</td>
        <td style='border:1px solid black;'>".$result['sanpham_tieude']."</td>
        <td style='border:1px solid black;'>".$result['quantitys']."</td>
        <td style='border:1px solid black;'>".number_format($result['sanpham_gia'])."<sup>đ</sup></td>
         <td style='border:1px solid black;'>".number_format($total)."<sup>đ</sup></td> 
          </tr> ";
        
     }
      $noidung .="</table> ";
      $noidung .=" <h3> Phí vận chuyển : ".number_format($tienship)." VNĐ </h3> ";
      $noidung .=" <h3> Tổng tiền : ".number_format($TT)." VNĐ </h3> ";
      $noidung .=" <h3 style='color: red'> Số tiền cần phải trả : ".number_format($cantra)." VNĐ </h3> ";


      

      $noidung .="  <img src='cid:thanks' />"; 


    
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude,$noidung,$maildathang);

    $sql =  mysqli_query($conn,"UPDATE tbl_sanpham 
            INNER JOIN tbl_carta
            SET tbl_sanpham.soluong = tbl_sanpham.soluong - tbl_carta.quantitys 
            WHERE (tbl_sanpham.sanpham_id = tbl_carta.sanpham_id AND session_idA LIKE '$session_id%' )");
}
?>

 <!-- -----------------------PAYMENT---------------------------------------------- -->
  <section class="payment">
        <div class="container">
            <div class="payment-top-wrap">
                 <div class="payment-top">
                     <div class="delivery-top-delivery payment-top-item">
                         <i class="fas fa-shopping-cart"></i>
                     </div>
                     <div class="delivery-top-adress payment-top-item">
                         <i class="fas fa-map-marker-alt"></i>
                     </div>
                     <div class="delivery-top-payment payment-top-item">
                         <i class="fas fa-money-check-alt"></i>
                     </div>
                 </div>
            </div>
         </div>
         <div class="container" >
         <?php 
            $today = date("d/m/Y");
            $session_id  = session_id();
            $show_cart = $index -> show_cart($session_id);
            if($show_cart) 
            {
            
        ?>
             <div class="payment-content row">
                <div class="payment-content-left">
                        <form action="" method="POST">
                            <div class="payment-content-left-method-delivery">
                                <p style="font-weight: bold;">Phương thức giao hàng</p> <br>
                            <div class="payment-content-left-method-delivery-item">
                                <input name="deliver-method" value="Giao hàng chuyển phát nhanh" checked type="radio">
                                <label for="">Giao hàng chuyển phát nhanh</label>
                            </div>
                             </div>
                                 <br>
                            <div class="payment-content-left-method-payment">
                                <p style="font-weight: bold;">Phương thức thanh toán</p> <br>
                                <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p> <br>
                                <div class="payment-content-left-method-payment-item">
                                    <input name="method-payment" type="radio">
                                    <label for="">Thanh toán bằng thẻ tín dụng(OnePay)</label>
                                </div>
                                <div class="payment-content-left-method-payment-item-img">
                                    <img src="image/visa.png" alt="">
                                </div>
                                <div class="payment-content-left-method-payment-item">
                                    <input name="method-payment" type="radio">
                                    <label for="">Thanh toán bằng thẻ ATM(OnePay)</label>
                                </div>
                                <div class="payment-content-left-method-payment-item-img">
                                    <img src="image/vcb.png" alt="">
                                </div>
                                <div class="payment-content-left-method-payment-item">
                                    <input name="method-payment" type="radio">
                                    <label for="">Thanh toán Momo</label>
                                </div>
                                <div class="payment-content-left-method-payment-item-img">
                                    <img src="image/momo.png" alt="">
                                </div>
                                <div class="payment-content-left-method-payment-item">
                                    <input value="Thu tiền tận nơi" checked name="method-payment" type="radio">
                                    <label for="">Thu tiền tận nơi</label>
                                </div>
                                    
                            </div>
                            <div class="payment-content-right-payment">
                                    <button type="submit">HOÀN THÀNH</button>
                            </div>
                        </form>
                </div>
                <div class="payment-content-right">
                    <div class="payment-content-right-button">
                        <input type="text" placeholder="Mã giảm giá/Quà tặng">
                        <button><i class="fas fa-check"></i></button>
                    </div>
                    <div class="payment-content-right-button">
                        <input type="text" placeholder="Mã cộng tác viên">
                        <button><i class="fas fa-check"></i></button>
                    </div>
                    <div class="payment-content-right-mnv">
                        <select name="" id="">
                            <option value="">Chọn mã nhân viên thân thiết</option>
                            <option value="">D345</option>
                            <option value="">C333</option>
                            <option value="">T567</option>
                            <option value="">D333</option>
                        </select>
                    </div>
                    <br>
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                           $session_id = session_id();
                           $SL = 0;
                           $TT = 0;
                           $show_cartB = $index -> show_cartB($session_id);
                           if($show_cartB){while($result = $show_cartB->fetch_assoc()){
                           
                           
                           ?> 
                        <tr>
                            <td><?php  echo $result['sanpham_tieude'] ?></td>
                            <td><?php $a = number_format($result['sanpham_gia']); echo $a  ?></td>
                            <td><?php echo $result['quantitys'] ?></td>
                            <td><p><?php $a = $result['sanpham_gia']*$result['quantitys']; $b = number_format($a); echo $b ?><sup>đ</sup></p></td>                          
                        </tr>
                       <?php
                           }}
                       ?>
                        <tr style="border-top: 2px solid red">
                            <td style="font-weight: bold;border-top: 2px solid #dddddd" colspan="3">Tổng</td>
                            <td style="font-weight: bold;border-top: 2px solid #dddddd"><p><?php if(Session::get('TT'))  {echo Session::get('TT'); } ?><sup>đ</sup></p></td>                          
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                            <td style="font-weight: bold;"><p><?php if(Session::get('TT'))  {echo Session::get('TT'); } ?><sup>đ</sup></p></td>                          
                        </tr>
                    </table>
                </div>
             </div>
             <?php 
            } else {echo "Bạn vẫn chưa thêm sản phẩm nào vào giỏ hàng, Vui lòng chọn sản phẩm nhé!";}
            ?>
         </div>
        
    </section>

     <!-- -------------------------Footer -->
<?php
include "footer.php"
?>