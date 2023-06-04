<?php
include "header.php";

 $conn = new mysqli('localhost', 'root', '', 'website_ivy');


 ?>
<?php
	if(isset($_POST['search_button'])){

	$tukhoa = $_POST['search_product'];
	
		
	$sql_product = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE sanpham_tieude LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");		

	$title = $tukhoa;
	}		
	?> 
<section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
               
               <h1 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Từ khóa tìm kiếm : <?php echo $title ?></h1>
              
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
                        <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten'] ?></a>
                            <ul>
                                    <?php
                                      $danhmuc_id = $result['danhmuc_id'];
                                      $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                      if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                    ?>
                                    <li><a href="cartegory.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a></li>
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
                    <div class="cartegory-right-top row">
                        <div class="cartegory-right-top-item ">
                       
                        </div>
                        <!-- <div class="cartegory-right-top-item">
                            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                        </div>
                        <div class="cartegory-right-top-item">
                            <select name="" id="">
                                <option value="">Sắp xếp</option>
                                <option value="">Giá cao đến thấp</option>
                                <option value="">Giá thấp đến cao</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="cartegory-right-content row">
                        <?php
								while($row_sanpham = mysqli_fetch_array($sql_product)){ 
								?>
                        <div class="cartegory-right-content-item">
                           <a href="product.php?sanpham_id=<?php echo $row_sanpham['sanpham_id']?>">
                                <img style="width: 100%; height: 200px;" src="admin/uploads/<?php echo $row_sanpham['sanpham_anh']?>" alt=""></a>
                                <p style="height: 10px;"></p>
                            <a href="product.php?sanpham_id=<?php echo $row_sanpham['sanpham_id']?>"> <h1><?php echo $row_sanpham['sanpham_tieude']?></h1></a>

                            <p><?php $resultA = number_format($row_sanpham['sanpham_gia']); echo $resultA?><sup>đ</sup></p>
                            <div class="product-content-right-product-button">
                       <a href="product.php?sanpham_id=<?php echo $row_sanpham['sanpham_id']?>"> <button class="add-cart-btn" style="width: 100%"> <ion-icon name="eye-sharp"></ion-icon>  <p>XEM NHANH</p></button> </a>
                       <!--  <button><p>TÌM TẠI CỬA HÀNG</p></button> -->
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                   $sql_kq= mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE sanpham_tieude LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");
                   $result = mysqli_fetch_array($sql_kq) 
                ?>
                <?php  if(isset($result)): ?>
                	<?php else: ?>
                		<p style="color: #B00000;"> ERORR: Không tìm thấy sản phẩm nào khớp với lựa chọn của bạn. </p>
                	<?php endif; ?>
  
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-items">
                            <p>Hiện thị 2 <span>&#124;</span> 4 sản phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-items">
                            <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span> Trang cuối</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









<?php
include "footer.php"
?>


