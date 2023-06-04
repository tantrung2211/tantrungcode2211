<?php
include "header.php";
include "leftside.php";
    

// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$brand = new brand;
$show_baiviet = $brand -> show_user()

?>
       <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        
                        <th>Họ và tên</th>
                        <th>Email</th>
                        
                        <th>Địa chỉ</th>
                        <th>Mật khẩu</th>
                        <th>Số điện thoại</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_baiviet){$i=0; while($result= $show_baiviet->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                       
                        
                        <td width="20%"> <?php echo $result['tenkhachhang']  ?></td>
                        <td width="20%"> <?php echo $result['email']  ?></td>
                        <td width="20%"> <?php echo $result['diachi'] ?></td>
                        <td width="20%"> <?php echo $result['matkhau']  ?></td>
                        <td width="5%"> <?php echo $result['dienthoai'] ?></td>
            
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

