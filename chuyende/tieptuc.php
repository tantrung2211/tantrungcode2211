<?php
 ob_start();
  session_start();
  // echo 'Old: ' . session_id();
  session_regenerate_id();
  // echo '<br />New: ' . session_id();
  ob_end_flush();
    echo "<script> window.location.href='index.php';</script>";
// header("location:index.php");
?>