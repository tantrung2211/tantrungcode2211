<?php
include "header.php";
include "leftside.php";
// include "class/product_class.php";
include_once "../helper/format.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// // include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$product = new product();
$fm = new Format();

?>
        <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Ngày đăng</th> 
                       <!--  <th>Mã</th> -->
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>
                        <!-- <th>Màu</th> -->  
                        <th>Số lượng</th>   
                        <th>Giá</th> 
                         
                        <th>SP HOT </th>  
                        <th>Ảnh</th>   
                        <th>Ảnh sản phẩm</th>     
                        <th>Size sản phẩm</th>                
                        <th>Tùy chỉnh</th>
                    </tr>
                  <?php
                  $show_product = $product ->show_product();
                  if($show_product){$i=0; while($result = $show_product ->fetch_assoc()){$i++;

                 
                  ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['sanpham_id'] ?></td>
                        <td> <?php echo $fm -> textShorten($result['sanpham_tieude'],$limit = 30) ;?></td>
                         <td> <?php echo $result['ngaydang']  ?></td>
                        <!-- <td> <?php echo $result['sanpham_ma'] ?></td> -->
                        <td> <?php echo $result['danhmuc_ten']  ?></td>
                        <td> <?php echo $result['loaisanpham_ten']  ?></td>
                        <!-- <td> <?php echo $result['color_ten']  ?></td> -->
                        <td> <?php echo $result['soluong']  ?></td>
                        <td> <?php echo number_format($result['sanpham_gia'])  ?> <sup>đ</sup></td>
                       


                    <td> <?php if($result['sanpham_hot']==1):  ?>
                        <p style="color: red">HOT</p>
                        <?php elseif($result['sanpham_hot']==0): ?>
                         thường
                         <?php else: ?>
                            Mới
                        <?php endif; ?>
                    </td>

                                          
                        <td> <img style="width: 100px; height: 50px" src="uploads/<?php echo $result['sanpham_anh'] ?>" alt=""></td>                
                        <td><a href="anhsanphamlist.php?sanpham_id=<?php echo $result['sanpham_id'] ?>">Xem</a></td>
                        <td><a href="sizesanphamlist.php?sanpham_id=<?php echo $result['sanpham_id'] ?>">Xem</a></td>
                        <td><a href="productedit.php?sanpham_id=<?php echo $result['sanpham_id'] ?>"><ion-icon name="construct-outline"></ion-icon></a> |
                            <a href="productdelete.php?sanpham_id=<?php echo $result['sanpham_id'] ?>" onclick="return confirm('Sản phẩm sẽ bị xóa vĩnh viễn, bạn có chắc muốn xóa không?');"><ion-icon name="trash-outline"></ion-icon></a></td>
                    </tr>

                    <?php
                     }}
                  ?>
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  

