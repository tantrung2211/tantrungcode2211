<?php
include "header.php";
?>
<?php
if (isset($_GET['sanpham_id'])|| $_GET['sanpham_id']!=NULL){
    $sanpham_id = $_GET['sanpham_id'];
    }
   
   
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <!-- -----------------------PRODUCT---------------------------------------------- -->
 <section class="product">
       <div class="container">
            <div class="product-top row">
                 <?php
                     $get_sanpham = $index -> get_sanpham($sanpham_id);
                     if ($get_sanpham ){$resultE = $get_sanpham -> fetch_assoc();}
                ?>
                <p style="color: #2a2825"><a href="index.php">Trang chủ</a></p> <span>&#8594;</span> <p><?php echo $resultE['danhmuc_ten']  ?></p><span>&#8594;</span><p><?php echo $resultE['loaisanpham_ten'] ?></p><span>&#8594;</span><p><?php echo $resultE['sanpham_tieude'] ?></p>
            </div>
            <div class="product-content row">
                <?php
                     $get_sanpham = $index -> get_sanpham($sanpham_id);
                     if ($get_sanpham ){while($result = $get_sanpham -> fetch_assoc()){
                ?>
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        
                        <img  class="sanpham_anh" style="z-index: 3;" src="admin/uploads/<?php echo $result['sanpham_anh'] ?>" alt="">
                        <?php
                            if($result['soluong'] > 0):
                             ?>
                                
                             <?php else: ?>
                              
                               <img src="image/hethang2.webp" style="z-index: 2; position:absolute; width: 300px; 
                               height: 300px; left: 450px; top: 200px;">
                         
                            <?php endif; ?>
                    </div>
                    <div class="product-content-left-small-img">
                        <?php
                            $sanpham_id = $result['sanpham_id'];
                            $get_anh = $index -> get_anh($sanpham_id);
                            if ($get_anh ){while($resultA = $get_anh -> fetch_assoc()){
                        ?>
                        <img src="admin/uploads/<?php echo $resultA['sanpham_anh'] ?>" alt="">
                        <?php
                            }}
                        ?>
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                             <input class="session_id" type="hidden" value="<?php echo session_id() ?>">
                             <input class="sanpham_id" type="hidden" value="<?php echo $result['sanpham_id'] ?>">
                        <h1 class="sanpham_tieude"><?php echo $result['sanpham_tieude'] ?></h1>
                        <p><?php echo $result['sanpham_ma'] ?></p>
                    </div>
                    
                    <div class="product-content-right-product-price">
                        <p ><span ><?php $resultC = number_format($result['sanpham_gia']); echo $resultC ?></span><sup>đ</sup></p>
                        <input class="sanpham_gia" type="hidden" value="<?php echo $result['sanpham_gia'] ?>">
                    </div>
                    <div class="product-content-right-product-color">
                        <p><span style="font-weight: bold;">Màu sắc</span>:<?php echo $result['color_ten'] ?> <span style="color: red;">*</span></p>
                       <div class="product-content-right-product-color-IMG">
                        <img class="color_anh" src="admin/uploads/<?php echo $result['color_anh'] ?>" alt="">
                       </div>                      
                    </div>
                    <div class="product-content-right-product-size">
                        <p style="font-weight: bold"> Size: </p>
                        <div class="size">
                        <?php
                            $sanpham_id = $result['sanpham_id'];
                            $get_size = $index -> get_size($sanpham_id);
                            if ($get_size ){while($resultV = $get_size -> fetch_assoc()){
                        ?>
                            <div class="size-item">
                                <input style="width: " class="size-item-input" value="<?php echo $resultV['sanpham_size']?>" name="size-item" type="radio" >
                                <span><?php echo $resultV['sanpham_size'] ?></span>
                            </div>
                        <?php
                            }}
                        ?>
                        </div>
            
                             
                       
                    
                        <div class="quantity">
                            <p style="font-weight: bold"> Số lượng: </p>
                            <?php 
                                if($result['soluong']>0):
                            ?>
                             <input class="quantitys" type="number" min="1" value="1" max="<?php echo $result['soluong'] ?>">
                             <h3 style="margin-left: 10px; color: #757575"><?php echo $result['soluong'] ?> sản phẩm có sẵn</h3>

                            <?php else: ?>

                                <input class="quantitys" type="number" min="0" value="0" max="0">
                             <h3 style="margin-left: 10px; color: #757575"><?php echo $result['soluong'] ?> sản phẩm có sẵn</h3>
                            <?php endif; ?>
                           
                        </div>
                        <p class="size-alert" style="color: red;"></p>
                    </div>
                    <div class="product-content-right-product-button">
                        <?php 
                             if($result['soluong']>0): 
                        ?>
                        <button class="add-cart-btn" onclick="alert2();"> <i class="fas fa-shopping-cart"></i> <p>THÊM VÀO GIỎ </p></button>
                         <?php else: ?>
                           <button onclick="alert();"> <i class="fas fa-shopping-cart"></i> <p>HẾT HÀNG </p></button>
                          <?php endif; ?>   
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                    </div>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-phone-alt"></i> <p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-comments"></i> <p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-envelope"></i> <p>Mail</p>
                        </div>

                    </div>
                   <br>
                    <div class="product-content-right-bottom">
                       <div class="product-content-right-bottom-top">
                        &#8744;
                       </div> 
                       <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-title">
                                <div class="product-content-right-bottom-title-item chitiet">
                                    <p>Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-title-item baoquan">
                                    <p>Bảo quản</p>
                                </div>
                              
                             </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <?php echo $result['sanpham_chitiet'] ?>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    <?php echo $result['sanpham_baoquan'] ?>
                                </div>
                            </div>
                       </div>
                      
                    </div>
                </div>
                 <?php
                }}
                ?>
            </div>
       </div>
    </section>
    <!-- -------------------------SẢN PHẨM LIÊN QUAN -->
    <section class="product-related">
        <div class="container">
            <div class="product-related-title">
                <p>SẢN PHẨM CÙNG LOẠI</p>
            </div>
            <div class="row justify-between">
                <?php
                    $loaisanpham_id = $resultE['loaisanpham_id'];
                    $get_sanphamlienquan = $index -> get_sanphamlienquan($loaisanpham_id,$sanpham_id);
                    if($get_sanphamlienquan){while($resultZ = $get_sanphamlienquan ->fetch_assoc()){
  
                ?>
                <div class="product-related-item">
                    <a href="product.php?sanpham_id=<?php echo $resultZ['sanpham_id']?>">
                        <img style="width: 100%; height: 180px;" src="admin/uploads/<?php echo $resultZ['sanpham_anh']?>" alt=""></a>
                        <p style="height: 10px;"></p>
                    <a href="product.php?sanpham_id=<?php echo $resultZ['sanpham_id']?>"> <h1><?php echo $resultZ['sanpham_tieude']?></h1></a>
                    <p><?php $resultA = number_format($resultZ['sanpham_gia']); echo $resultA?><sup>đ</sup></p>
                    <div class="product-content-right-product-button">
                       <a href="product.php?sanpham_id=<?php echo $resultZ['sanpham_id']?>">
                        <button class="" style="width: 100%"> <ion-icon name="eye-sharp"></ion-icon>  <p>XEM NHANH</p></button> </a>
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                            </div>
                </div>
                <?php
                    }}
                ?>
            </div>
        </div>
    </section>
    <script>
$(document).ready(function(){

    var s = ''
   
        $('.size-item-input').each(function(index){
                        $(this).change(function(){
                        s = $(this).val()

                         })
                              
        });
        $('.add-cart-btn').click(function(){
                if (s!="") {
                // $('.size-alert').text('Vui lòng chọn size*')
                var x = $(this).parent().parent().find('.sanpham_tieude').text()
                var se = $(this).parent().parent().find('.session_id').val() 
                var sp = $(this).parent().parent().find('.sanpham_id').val() 
                var y = $(this).parent().parent().parent().find('.sanpham_anh').attr('src')
                var z = $(this).parent().parent().find('.sanpham_gia').val() 
                var c = $(this).parent().parent().find('.color_anh').attr('src')
                var q = $(this).parent().parent().find('.quantitys').val()  
                $.ajax({
                    url: "ajax/cart_ajax.php",
                    method: "POST",
                    data: {session_id:se,sanpham_id:sp,sanpham_tieude:x,sanpham_anh:y,sanpham_gia:z,color_anh:c,quantitys:q,sanpham_size:s},
                    success:function(data){}
                })
                // window.location.replace("cart.php");
                // $(location).attr('href','cart.php')

                  
                }
                else {
                var x = $(this).parent().parent().find('.sanpham_tieude').text()
                var se = $(this).parent().parent().find('.session_id').val() 
                var sp = $(this).parent().parent().find('.sanpham_id').val() 
                var y = $(this).parent().parent().parent().find('.sanpham_anh').attr('src')
                var z = $(this).parent().parent().find('.sanpham_gia').val() 
                var c = $(this).parent().parent().find('.color_anh').attr('src')
                var q = $(this).parent().parent().find('.quantitys').val()  
                $.ajax({
                    url: "ajax/cart_ajax.php",
                    method: "POST",
                    data: {session_id:se,sanpham_id:sp,sanpham_tieude:x,sanpham_anh:y,sanpham_gia:z,color_anh:c,quantitys:q,sanpham_size:s},
                    success:function(data){}
                })
                // window.location.replace("cart.php");
                // $(location).attr('href','cart.php')
             
        
            
            }
               
               
               
        })  
              








})



        
        //     $(this).click(function(){
        //     var x = $(this).parent().find('#question-answer-content').val()
        //     var y = $(this).parent().find('#baiviet_id').val()
        //     var z = $(this).parent().find('#user_ten').val()
        //     var s = $(this).parent().find('#question-idA').val()
        //     var m = $(this).parent().parent().parent().find('.comment-content-answer')
        //     // $(this).parent().parent().parent().find('.comment-content-answer').css('border','1px solid red')
           
        //     // alert(s)
        //     if (x!="" )
        //    {
            
        //     $.get ("ajax/question_ajax.php", {content:x,baiviet_id:y,user_ten:z,question_id:s}, function(data) {
        //        m.html(data);
        //     })
        //     location.reload();
        //    }
        //    else {
        //        alert ("Bạn chưa nhập nội dung")
        //    }
           

        //   });
       




    
    </script>


<script >

function alert()
{
  swal({
  title: "Sản phẩm hiện đang hết hàng ! ",
  text: "Cảm ơn quý khách đã quan tâm đến sản phẩm , hiện tại cửa hàng chúng tôi đang hết hàng sẽ cập nhập trong thời gian sớm nhất. Trân trọng cảm ơn!",
  icon: "warning",
  dangerMode: true,
})
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Xóa thành công giao dịch", 
//       {
//       icon: "success",
//     }
//     );
//   } else {
//     swal("Giữ lại giao dịch thành công");
//   }
// }); 
} 

function alert2()
{
  swal({
  title: "Sản phẩm đã thêm vào giỏ hàng ! ",
  text: "",
  icon: "success",
  dangerMode: true,
})
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Xóa thành công giao dịch", 
//       {
//       icon: "success",
//     }
//     );
//   } else {
//     swal("Giữ lại giao dịch thành công");
//   }
// }); 
} 




</script>
    <!-- -------------------------Footer -->
<?php
include "footer.php"
?>