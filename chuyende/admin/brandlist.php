<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$brand = new brand;
$show_brand = $brand -> show_brand()
?>
<?php
$product = new product();
$brand = new brand;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loaisanpham_name = $_POST['loaisanpham_name'];
    $danhmuc_id = $_POST['danhmuc_id'];
    $insert_brand = $brand ->insert_brand($danhmuc_id,$loaisanpham_name);

}
?>
       <div class="admin-content-right">
         <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                     <select required="required" name="danhmuc_id" id="">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_danhmuc = $product ->show_danhmuc();
                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select><br>
                    <label for="">Vùi lòng chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <input class="subcartegory-input" type="text" name="loaisanpham_name">
                    <button class="admin-btn" type="submit">THÊM <ion-icon name="add-circle-outline"></ion-icon></button>             
                </form>
            </div>          
            <br>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_brand){$i=0; while($result= $show_brand->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['loaisanpham_id'] ?></td>
                        <td> <?php echo $result['danhmuc_ten']  ?></td>
                        <td> <?php echo $result['loaisanpham_ten'] ?></td>
                        <td><a href="brandedit.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><ion-icon name="construct-outline"></ion-icon></a>|<a href="branddelete.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><ion-icon name="trash-outline"></ion-icon></a></td>
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