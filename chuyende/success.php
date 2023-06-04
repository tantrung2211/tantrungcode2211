<?php
include "header.php";
$session_id = session_id();
?>
    <!-- -----------------------DELIVERY---------------------------------------------- -->
    <section class="success">
            <div class="success-top">
                <p>ĐẶT HÀNG THÀNH CÔNG</p>
            </div>
            <div class="success-text">
             <?php
               
                $show_cartC = $index -> show_cartC($session_id);
                if($show_cartC){while($result = $show_cartC->fetch_assoc()){
            ?> 
                <p>Chào <span  style="font-size: 20px; color: #378000;"><?php echo $result['customer_name'] ?></span>, đơn hàng của bạn với mã <span style="font-size: 20px; color: #378000;"><?php $ma = substr($session_id,0,8); echo $ma   ?></span> đã được đặt thành công. <br>
                    Đơn hàng của bạn đang trong quá trình xử lý. <br>
                   <!--  <span style="font-weight: bold;">Hiện tại do đang trong Chương trình Sale lớn, đơn hàng của quý khách sẽ gửi chậm hơn so với thời gian dự kiến từ 5-10 ngày. Rất mong quý khách thông cảm vì sự bất tiện này!</span> --><br>
                    <span style="color: red;">(Lưu ý: TTSHOP sẽ gọi để xác nhận đơn hàng, đơn hàng được giao đến bạn trong thời gian sớm nhất)</span><br>
                    Cám ơn <span  style="font-size: 20px; color: #378000;"><?php echo $result['customer_name'] ?></span> đã tin dùng sản phẩm của TTSHOP.</p>
            <?php
             }}
            ?>
            
            </div>
            <div class="success-button">
                <a href="detaill.php"><button>XEM CHI TIẾT ĐƠN HÀNG</button></a>
                <a href="tieptuc.php"><button>QUAY LẠI TRANG CHỦ</button></a>
            </div>
            <p>Mọi thắc mắc quý khách vui lòng liên hệ hotline <span  style="font-size: 20px; color: red;">0987654321 </span> hoặc chat với kênh hỗ trợ trên website để được hỗ trợ nhanh nhất.</p>
    </section>

     <!-- -------------------------Footer -->
<?php
include "footer.php"
?>