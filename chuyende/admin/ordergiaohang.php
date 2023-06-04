<?php
session_start();
  $connect = new mysqli('localhost', 'root', '', 'website_ivy');

// Kết nối database

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.

if (isset($_GET['session_idA'])) {
  $session_idA = $_GET['session_idA'];
    echo $session_idA;
}


if (isset($_GET['email'])) {
  $email = $_GET['email'];
    echo $email;
}

date_default_timezone_set("Asia/Ho_Chi_Minh");
require('../mail/sendmail.php');

    $today = date("d/m/Y H:i:s");
     $session_idA = $_GET['session_idA'];
    $email = $_GET['email'];
    


    $tieude = "Xử lý đơn hàng từ webstite TTSHOP Thành công!";
    $noidung .="  <img src='cid:logo_2u2' />";
    $noidung .= "<h1>Cảm ơn quý khách đã đặt hàng tại TTSHOP với mã đơn hàng : ".substr($session_idA,0,8)."</h1>" ;

     $noidung .=" <h2> Ngày giao hàng bắt đầu từ ngày: ".$today."</h2>";
     $noidung .= "<h2 style='color: red;'> Đơn hàng sẽ được giao tới khách hàng từ 3-4 ngày, vui lòng chờ đợi </h2>" ;

     $sql_thongtin = mysqli_query($connect,"SELECT tbl_order.*, tbl_diachi.*
                FROM tbl_order INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
                WHERE session_idA LIKE '$session_idA%'
                ORDER BY tbl_order.order_id DESC LIMIT 1");
                  $result = mysqli_fetch_array($sql_thongtin);
        $noidung .="
        <h4>Họ và tên khách hàng:".$result['customer_name']." </h4>
        <h4>Số điện thoại: ".$result['customer_phone']."</h4>
        <h4>Địa chỉ giao hàng: ".$result['customer_diachi'].", ".$result['phuong_xa'].", ".$result['quan_huyen']."</h4>
        ";
    $noidung .= "
    <h2>Đơn hàng đặt bao gồm :</h2>" ;

     $sql_select_sp = mysqli_query($connect,"SELECT * FROM tbl_carta WHERE  session_idA LIKE '$session_idA%' ORDER BY carta_id DESC"); 

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

        $noidung .="  <img src='cid:thanks3' />";    


    
    $maildathang = $_GET['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude,$noidung,$maildathang);




if (isset($_GET['session_idA'])) {
    $session_idA = $_GET['session_idA'];
    $sql = "UPDATE tbl_payment SET statusA = '1' WHERE session_idA = '$session_idA' ";
    $result = mysqli_query($connect, $sql);
     
}

	  header('Location:orderlist.php');  



?>

