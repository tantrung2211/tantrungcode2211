
    <!-- -------------------------Footer -->

<?php
include "header.php";
$conn = new mysqli('localhost', 'root', '', 'website_ivy');
 
?>

<meta charset="utf-8">


<!--  -->
<div style=" width: 100%; height: 100px;">
    
</div>
       <?php
                $sql_select_tintuc = mysqli_query($conn,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
                ?>
                 <?php
            $i = 0;
            while($result = mysqli_fetch_array($sql_select_tintuc)){ 
              $i++;
            ?> 

<section class="cartegory" style=" padding: 20px 0 50px;">
<section class="clearfix maincontent">
<div class="container">
    <div class="row">

                       
        <div class="row mb-3">  
            <div class="col-md-4" >
                 <a href="chitiettintuc.php?baiviet_id=<?php echo $result['baiviet_id']?>">
             <img style="width: 180px; height: 180px; float: left;" src="admin/uploads/<?php echo $result['anhbaiviet']?>" alt=""></a>
             <div style="margin-left: 200px;">
                 <h3 >
                Tiêu đề:<a href="chitiettintuc.php?baiviet_id=<?php echo $result['baiviet_id']?>"> 
                     <?php echo $result['tenbaiviet']?>   </a>
                </h3>
                 <p >Ngày đăng bài: <?php $resultA = $result['ngaydang']; echo $resultA?></p>
                 <br>
                 <p >   <?php echo substr($result['noidung'],0,900) ?> ...  </p>
           </div>
            </div>  
              
        </div>
       
    </div>

</div>
</section>
</section>
<?php
                        } 
                        ?>
            
<?php
include "footer.php"
?>
  