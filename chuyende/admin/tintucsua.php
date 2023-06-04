<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$brand = new brand;
if (isset($_GET['baiviet_id'])|| $_GET['baiviet_id']!=NULL){
    $baiviet_id = $_GET['baiviet_id'];
    }
    $get_baiviet = $brand -> get_baiviet($baiviet_id);
    if($get_baiviet){$resul = $get_baiviet ->fetch_assoc();}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tenbaiviet = $_POST['tenbaiviet'];
    $ngaydang = date("d/m/Y");
    $noidung = $_POST['noidung'];
    $file_name = $_FILES['anhbaiviet']['name'];
    $file_temp = $_FILES['anhbaiviet']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $anhbaiviet = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$anhbaiviet;
    move_uploaded_file( $file_temp,$upload_image);
    $update_baiviet = $brand ->update_baiviet($tenbaiviet,$noidung,$ngaydang,$anhbaiviet,$baiviet_id);

}
?>
        <div class="admin-content-right">
            <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">  

                     <label for="">Tiêu để bài viết<span style="color: red;">*</span></label> <br>
                     <textarea class="ckeditor"  required name="tenbaiviet" cols="60" rows="5"><?php echo $resul['tenbaiviet'] ?></textarea> <br>
                     

                   

                     <label  for="">Nội dung<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="noidung" cols="60" rows="5"><?php echo $resul['noidung'] ?></textarea><br>
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                     <img style="width: 320px; height: 320px" src="uploads/<?php echo $resul['anhbaiviet'] ?>" alt="">
                    <input required type="file" name="anhbaiviet"> <br>   
                     

                    <button class="admin-btn" type="submit">Sữa</button>             
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  