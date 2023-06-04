<?php

include "header.php";
include "leftside.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    // var_dump($_POST);
    $insert_product = $product ->insert_product($_POST,$_FILES);
    header('Location:productlist.php');

}

?>
 <div class="admin-content-right">
            <div class="product-add-content">
                <?php
                if(isset($insert_product)){echo $insert_product; }
                ?>
                <form action="productadd.php" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_tieude" > <br>
                    <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_ma" value="MSP:"> <br>
                    <!-- <label for="">Ngày bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_ngay"> <br>
                    <label for="">Tác giả bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_tacgia"> <br> -->
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="danhmuc_id" id="danhmuc_id">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_danhmuc = $product ->show_danhmuc();
                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="loaisanpham_id" id="loaisanpham_id">
                        <option value="">--Chọn--</option>
                        
                    </select>
                    <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="color_id" id="">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_color = $product ->show_color();
                        if($show_color){while($result=$show_color->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['color_id'] ?>"><?php echo $result['color_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-size">
                    <p>iPhone 14</p>    <input type="checkbox" name="sanpham-size[]" value="iPhone 14"> 
                    <p>iPhone 13</p>    <input type="checkbox" name="sanpham-size[]" value="iPhone 13"> 
                    <p>iPhone 12</p>    <input type="checkbox" name="sanpham-size[]" value="iPhone 12">
                    <p>iPhone 11</p>   <input type="checkbox" name="sanpham-size[]" value="iPhone 11">  
                    <p>iPhone X</p>  <input type="checkbox" name="sanpham-size[]" value="iPhone X"> 
                    <p>Không size</p>  <input type="checkbox" name="sanpham-size[]" value="null" >    
                    </div>
                     <label for="">Sản phẩm bán chạy hay bình thường hay mới nhập<span style="color: red;">*</span></label> <br>
                      <select required="required" name="sanpham_hot">
                        <option value="">--Chọn--</option>
                        
                        <option name="sanpham_hot" value="0">Thường</option>
                         <option name="sanpham_hot" value="1">HOT</option>
                          <option name="sanpham_hot" value="2">Mới </option>
                        
                    </select>
                    
                    <br>
                    <label  for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input type="number" required type="text" name="sanpham_gia"> <br>
                    <label  for="">Số lượng sản phẩm : <span style="color: red;">*</span></label> <br>
                    <input type="number" required type="text" name="soluong"> <br>  
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"></textarea><br> 
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="sanpham_anh"> <br>   
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="file" multiple  name="sanpham_anhs[]"> <br>   
                    <button class="admin-btn" name="submit" type="submit">Thêm sản phẩm</button>  
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
//     $(".ckeditor").each(function(){
//         CKEDITOR.replace( this.id, {
//  filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//  filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// } );
//     })
CKEDITOR.replace( 'ckeditor', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
    

    </script>
    <script>
    $(document).ready(function(){
        $("#danhmuc_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get ("ajax/productadd_ajax.php", {danhmuc_id:x}, function(data) {
                $("#loaisanpham_id").html(data);
            })

        })
    })
</script>
</body>
</html>  