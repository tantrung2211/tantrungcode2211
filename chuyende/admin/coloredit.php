<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$brand = new brand;
$show_color = $brand -> show_color()
?>
<?php
$brand = new brand;
if (isset($_GET['color_id'])|| $_GET['color_id']!=NULL){
    $color_id = $_GET['color_id'];
    }
    $get_color = $brand -> get_color($color_id);
    if($get_color){$resul = $get_color ->fetch_assoc();}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $color_ten = $_POST['color_ten'];
    $file_name = $_FILES['color_anh']['name'];
    $file_temp = $_FILES['color_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $color_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$color_anh;
    move_uploaded_file( $file_temp,$upload_image);
	$update_color = $brand ->update_color($color_ten,$color_anh,$color_id);

}
?>
        <div class="admin-content-right">
            <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên màu sắc<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['color_ten'] ?>" class="subcartegory-input" type="text" name="color_ten"> <br>
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <img style="width: 100px; height: 100px" src="uploads/<?php echo $resul['color_anh'] ?>" alt="">
                    <input required type="file" name="color_anh"> <br>   
                    <button class="admin-btn" type="submit">SỬA</button>             
                </form>
            </div>     
            <br>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Tên màu</th>
                        <th>Ảnh</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_color){$i=0; while($result= $show_color->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['color_id'] ?></td>
                        <td> <?php echo $result['color_ten']  ?></td>
                        <td> <img style="width: 50px; height: 50px" src="uploads/<?php echo $result['color_anh'] ?>" alt=""></td>
                        <td><a href="coloredit.php?color_id=<?php echo $result['color_id'] ?>">Sửa</a>|<a href="colordelete.php?color_id=<?php echo $result['color_id'] ?>">Xóa</a></td>
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