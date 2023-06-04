<?php
include "header.php";
include "leftside.php"
?>
<?php
if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
    $get_loaisanpham = $index -> get_loaisanpham($loaisanpham_id);
   
?>

<div class="cartegory-right">
                    <div class="cartegory-right-top row">
                        <div class="cartegory-right-top-item ">
                        <?php  
                        $get_loaisanphamA = $index -> get_loaisanphamA($loaisanpham_id);
                        if($get_loaisanphamA){$result = $get_loaisanphamA ->fetch_assoc();} 
                        ?>
                            <p><?php if(isset($result['loaisanpham_ten'])) {echo $result['loaisanpham_ten'];}else {echo "Hiện tại chưa có loại sản phẩm nào";}?></p>
                        </div>
                       <!--  <div class="cartegory-right-top-item">
                            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                        </div> -->
                        <!-- <div class="cartegory-right-top-item">
                            <select name="" id="" style="height: 40px;">
                                <option value="">Sắp xếp</option>
                                <option value="">Giá cao đến thấp</option>
                                <option value="">Giá thấp đến cao</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="cartegory-right-content row">
                        <?php
                       if($get_loaisanpham){while($resultB = $get_loaisanpham ->fetch_assoc()){
                        ?>
                        <div class="cartegory-right-content-item">
                            <?php
                            if($resultB['soluong'] > 0):
                             ?>
                                
                             <?php else: ?>
                              <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                               <img src="image/hethang2.webp" style="z-index: 2; position:absolute; width: 150px; 
                               height: 150px; ">
                            </a>
                            <?php endif; ?>
                            <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                <img style="width: 100%; height: 200px; z-index: 3" src="admin/uploads/<?php echo $resultB['sanpham_anh']?>" alt="">
                            </a>

                           <p style="height: 10px;"></p>
                            
                            <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>"> <h1><?php echo $resultB['sanpham_tieude']?></h1></a>

                            <p><?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></p>
                            <div class="product-content-right-product-button">
                       <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>"> <button class="add-cart-btn" style="width: 100%"> <ion-icon name="eye-sharp"></ion-icon>  <p>XEM NHANH</p></button> </a>
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                            </div>
                        </div>
                        <?php
                        }}
                        ?>
                    </div>
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-items">
                            <!-- <p>Hiện thị 2 <span>&#124;</span> 4 sản phẩm</p> -->
                        </div>
                        <div class="cartegory-right-bottom-items">
                            <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span> Trang cuối</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------------------Footer -->
<?php
include "footer.php"
?>