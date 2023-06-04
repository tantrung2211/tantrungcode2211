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
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $color_ten = $_POST['color_ten'];
    $file_name = $_FILES['color_anh']['name'];
    $file_temp = $_FILES['color_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $color_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$color_anh;
    move_uploaded_file( $file_temp,$upload_image);
    $insert_color = $brand ->insert_color($color_ten,$color_anh);

}
?>
       <div class="admin-content-right">
         <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên màu sắc<span style="color: red;">*</span></label> <br>
                    <input class="subcartegory-input" type="text" name="color_ten"> <br>
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="color_anh"> <br>   
                    <button class="admin-btn" type="submit">THÊM <ion-icon name="add-circle-outline"></ion-icon></button>             
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
                        <td><a href="coloredit.php?color_id=<?php echo $result['color_id'] ?>"><ion-icon name="construct-outline"></ion-icon></a>|<a href="colordelete.php?color_id=<?php echo $result['color_id'] ?>"><ion-icon name="trash-outline"></ion-icon></a></td>
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