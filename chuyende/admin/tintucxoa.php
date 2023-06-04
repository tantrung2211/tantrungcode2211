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
    $delete_color = $brand -> delete_baiviet($baiviet_id);
    echo "<script> window.location.href='tintuclist.php';</script>";
    // header('Location:tintuclist.php');
?>
