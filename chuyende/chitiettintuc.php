<?php
include "header.php";
$conn = new mysqli('localhost', 'root', '', 'website_ivy');
?>
<?php
if (isset($_GET['baiviet_id'])|| $_GET['baiviet_id']!=NULL){
    $baiviet_id = $_GET['baiviet_id'];
    }
   
   
?>

 <section class="product">
       <div class="container">
            <div class="product-top row">
                 
            </div>
            <div class="product-content row" style="text-align: left;">
                <?php
                     $get_baiviet = $index -> get_baiviet($baiviet_id);
                     if ($get_baiviet ){while($result = $get_baiviet -> fetch_assoc()){
                ?>
               
               
                    
                             <input class="session_id" type="hidden" value="<?php echo session_id() ?>">
                             <input class="baiviet_id" type="hidden" value="<?php echo $result['baiviet_id'] ?>">
                        <h3 ><?php echo $result['tenbaiviet'] ?></h3>
                        <div style="width: 100%;">
                        <h3 >Ngày đăng : <?php echo $result['ngaydang'] ?></h3>
                        </div>
                        <br>
                        <div style="width: 100%; margin-top: 10px;">
                         <img class="sanpham_anh" style="width: 320px;height: 320px;" src="admin/uploads/<?php echo $result['anhbaiviet'] ?>" alt="">
                   		</div>
                   
                    <div class="product-content-right-product-price" 
                    style="font-size: 13px; font-style: oblique;">
                        <h3><?php $resultC = $result['noidung']; echo $resultC ?></h3>
                        <input class="sanpham_gia" type="hidden" value="<?php echo $result['sanpham_gia'] ?>">
                    </div>
                    <div class="product-content-right-product-color">
                        
                                           
                    </div>
                    <div class="product-content-right-product-size">
                       
                        <div class="size">
                       
                           
                        <?php
                            
                        ?>
                        </div>
                        
                        <p class="size-alert" style="color: red;"></p>
                    </div>
                  
                    
                   <br>
                   
                
                 <?php
                }}
                ?>
            </div>
       </div>
    </section>
    <section class="product-related">
        <div class="container">
            <div class="product-related-title">
                <p>TIN TỨC KHÁC </p>
            </div>
            <div class="row justify-between">
                <?php
                $sql_select_tintuc = mysqli_query($conn,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
                ?>
                 <?php
            $i = 0;
            while($result = mysqli_fetch_array($sql_select_tintuc)){ 
              $i++;
            ?> 
                <div class="product-related-item">
                     <a href="chitiettintuc.php?baiviet_id=<?php echo $result['baiviet_id']?>">
             <img style="width: 100%; height: 320px; float: left;" src="admin/uploads/<?php echo $result['anhbaiviet']?>" alt=""></a>
             <br>
                <p style="text-align: left; ">  <a style="color: black;" href="chitiettintuc.php?baiviet_id=<?php echo $result['baiviet_id']?>"> 
                     <?php echo $result['tenbaiviet']?>   </a></p>
                     <br>
                    <p style="text-align: left;">Ngày đăng bài : <?php $resultA = $result['ngaydang']; echo $resultA?></p>
                    
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>


<?php
include "footer.php"
?>