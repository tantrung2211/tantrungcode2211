<?php
include "header.php";
include "leftside.php";
    

// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$brand = new brand;
$show_baiviet = $brand -> show_baiviet()

?>
       <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Ảnh bài viết</th>
                        <th>Tiêu đề</th>
                        
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_baiviet){$i=0; while($result= $show_baiviet->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['baiviet_id'] ?></td>
                        <td width="10%"> <img style="width: 320px; height: 320px" src="uploads/<?php echo $result['anhbaiviet'] ?>" alt=""></td>
                        <td width="20%"> <?php echo $result['tenbaiviet']  ?></td>
                        
                        <td width="40%"> <?php echo substr($result['noidung'],0,900)  ?></td>
                        <td width="5%"> <?php echo $result['ngaydang'] ?></td>
                        <td><a href="tintucsua.php?baiviet_id=<?php echo $result['baiviet_id'] ?>">Sửa</a>|<a href="tintucxoa.php?baiviet_id=<?php echo $result['baiviet_id'] ?>">Xóa</a></td>
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

