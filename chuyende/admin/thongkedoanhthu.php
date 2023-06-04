<?php

include "header.php";
include "leftside.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
$connect = mysqli_connect("localhost", "root", "", "website_ivy");
$query = "SELECT * FROM tbl_carta Where session_idA";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ Soluong:".$row["quantitys"].", gia:".$row["sanpham_gia"].",  }, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

 <div class="admin-content-right">
    <h1 style="color:#333">Thống kê doanh thu <ion-icon name="bar-chart-outline"></ion-icon></h1>
                        <div id="chart"></div>  

                        <?php
                     $TT = 0;
                     $TT1 = 0;
                     $tienship = 0;
                     $cantra = 0;
               $sql_select_sp = mysqli_query($connect,"SELECT * FROM tbl_carta "); 
               $i = 0;
                        while($result = mysqli_fetch_array($sql_select_sp)){ 
                          $i++;
                ?>
                            
                   
                  <?php $a = (int)$result['sanpham_gia'];
                   $b = (int)$result['quantitys'];
                    $TTA = $a*$b;
                   $b = (int)$result['quantitys'];
                    $TTsoluong = $b ;   
                          
                  
                   
                     $TT =  $TT  + $TTA ;
                     $TT1 = $TT1 + $TTsoluong;
                          
                     }
                  ?>

                <h1>Doanh thu: <?php echo number_format($TT); ?><sup>VNĐ</sup></h1>  
                <h1>Số lượng sản phẩm bán được: <?php echo number_format($TT1); ?></h1>  


        </div>
    </section>
    <section>
    </section>
    <script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey: 'Soluong',
 ykeys:[ 'gia'],
 labels:[ 'Giá Tiền: ',],
 hideHover:'auto',
 stacked:true
});
</script>
    
    
   
</body>
</html>  