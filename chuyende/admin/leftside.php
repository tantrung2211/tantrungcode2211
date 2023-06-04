<?php
if(isset($_GET['admin_id'])){
    Session::destroyAdmin();
}
?>

<section class="admin-content row space-between">
        <div class="admin-content-left">
        <div class="header-top-left">
            <a href="index.php"><p> <span>ADMIN</span></p></a>
        </div>
            <ul>
                <li><a  href="#"> <ion-icon name="person-circle-outline"></ion-icon> Chào:  <span style="color:blueviolet; font-size:22px"><?php echo Session::get('admin_name') ?></span><span style="color: red; font-size:20px">&#10084;</span></a>
                <li><a href="#"><ion-icon name="cart-outline"></ion-icon> Đơn hàng</a>
                    <ul>
                        <li><a href="orderxuly.php">Đang chờ xử lý <ion-icon name="alert-circle-outline"></ion-icon></a></li>
                        <li><a href="orderlist.php">Đang giao hàng <ion-icon name="help-circle-sharp"></ion-icon></a></li>
                        <li><a href="orderlistdone.php">Đã hoàn thành <ion-icon name="checkmark-circle-sharp"></ion-icon></a></li>
                        <li><a href="orderlistall.php">Tất cả Đơn hàng <ion-icon name="reader-outline"></ion-icon></a></li>
                    </ul>
                </li>
                <li><a href="cartegorylist.php"><ion-icon name="albums-outline"></ion-icon> Danh Mục</a>
                    <!-- <ul>
                        <li><a href="cartegorylist.php">Danh sách danh mục <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="cartegoryadd.php">Thêm danh mục <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul> -->
                </li>
                <li><a href="brandlist.php"><i style="font-size:24px" class="fa">&#xf1b3;</i> Loại Sản Phẩm</a>
                    <!-- <ul>
                        <li><a href="brandlist.php">Danh sách loại sản phẩm <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="brandadd.php">Thêm loại sản phẩm <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul> -->
                </li>
                <li><a href="thongkedoanhthu.php"><ion-icon name="bar-chart-outline"></ion-icon></i> Thống kê doanh thu</a>
            
                </li>
                
                <li><a href="#"><ion-icon name="cube-outline"></ion-icon> Sản phẩm</a>
                    <ul>
                        <li><a href="productlist.php">Danh sách sản phẩm  <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="productadd.php">Thêm sản phẩm <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul>
                </li>
                <li><a href="colorlist.php"><ion-icon name="color-palette-outline"></ion-icon> Bản màu</a>
                    <!-- <ul>
                        <li><a href="colorlist.php">Danh sách bảng màu  <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="coloradd.php">Thêm màu <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul> -->
                </li>
                
                <li><a href="#"><ion-icon name="images-outline"></ion-icon> Ảnh Sản phẩm minh họa</a>
                    <ul>
                        <li><a href="anhsanphamlists.php">Danh sách ảnh  <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="anhsanphamadds.php">Thêm ảnh minh họa <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul>
                </li>
                <li><a href="#"><ion-icon name="resize-outline"></ion-icon> Size Sản phẩm</a>
                    <ul>
                        <li><a href="sizesanphamlists.php">Danh sách Size  <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="sizesanphamadds.php">Thêm size <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul>
                </li>

               <!--  <li><a href="#"><ion-icon name="newspaper-outline"></ion-icon> Tin tức</a>
                    <ul>
                        <li><a href="tintuclist.php">Danh sách tin tức  <ion-icon name="reader-outline"></ion-icon></a></li>
                        <li><a href="tintucthem.php">Thêm tin tức <ion-icon name="add-circle-outline"></ion-icon></a></li>
                    </ul>
                </li> -->

                <li><a href="user.php"><ion-icon name="people-circle-outline"></ion-icon> Người dùng</a>
                    <!-- <ul>
                        <li><a href="user.php">Danh sách người dùng  <ion-icon name="person-circle-outline"></ion-icon></a></li>
                    </ul> -->
                </li>

                <li><a href="?admin_id=<?php echo Session::get('admin_id') ?>"> <ion-icon name="log-out-outline"></ion-icon> Đăng Xuất</a>
                    
                </li>
            </ul>
        </div>