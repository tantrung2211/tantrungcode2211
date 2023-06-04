<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$cartegory = new cartegoty;
$show_cartegory = $cartegory -> show_cartegory()
?>
<?php
$cartegory = new cartegoty;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cartegory_name = $_POST['cartegory_name'];
    $insert_cartegory = $cartegory ->insert_cartegory($cartegory_name);

}
?>
       <div class="admin-content-right">
         <div class="cartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Vùi lòng danh mục<span style="color: red;">*</span></label> <br>
                    <input type="text" name="cartegory_name">
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
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_cartegory){$i=0; while($result= $show_cartegory->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['danhmuc_id'] ?></td>
                        <td> <?php echo $result['danhmuc_ten']  ?></td>
                        <td><a href="cartegoryedit.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?>"><ion-icon name="construct-outline"></ion-icon></a>|<a href="cartegorydelete.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?>"><ion-icon name="trash-outline"></ion-icon></a></td>
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