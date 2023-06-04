<?php
include "header.php";
?>
<!--  -->
<?php
$conn = new mysqli('localhost', 'root', '', 'website_ivy');
if(isset($_POST['them']))
{
date_default_timezone_set("Asia/Ho_Chi_Minh");
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$noidung = $_POST['noidung'];
$ngaydang = date("d/m/Y H:i:s");

$query = mysqli_query($conn, "INSERT INTO lienhe (name,email,phone,noidung,ngaydang) VALUES
 ('$name','$email','$phone','$noidung','$ngaydang')");

                    if($query){
                  echo '
                   <div class="cartegory">
                   <div class="cartegory-right-bottom-items">
                  <p style="color:green">Chúng tôi sẽ liên hệ với bạn sớm nhất !</p>
                  </div>
                  </div>';
                }
                else
                {
                  echo "";
                }
        
}

?>

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}


label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #58257b;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Bố cục linh hoạt: khi màn hình có chiều rộng dưới 600px thì hai cột chồng 
lên nhau thay vì nằm cạnh nhau */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
}
}
</style>

	<section class="cartegory">
      <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.4412146235572!2d108.03771831526846!3d12.684600024541712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31721d796ff780f1%3A0xe639b492d4d87da9!2zMTA1IE3huqFjIFRo4buLIELGsOG7n2ksIFRow6BuaCBDw7RuZywgVGjDoG5oIHBo4buRIEJ1w7RuIE1hIFRodeG7mXQsIMSQ4bqvayBM4bqvaywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1649056198210!5m2!1svi!2s" width="600" height="450" style="border:0; width: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="container">

            
        </div>
        <div class="container">
            <div class="row">
               <div class="cartegory-left">
                <br>
                 <h1>Về chúng tôi</h1> 
                 <br>
                <p>TTSHOP nơi bạn có thể đặt sự tin tưởng vào chất lượng sản phẩm và đội ngũ tư vấn của chúng tôi. 
                Bởi TTSHOP được thành lập với một đội ngũ có niềm đam mê vô tận, tận tâm và nhiệt thành!</p>
                <br>
<p>Chúng tôi luôn cập nhật xu hướng những dòng sản phẩm tại Việt Nam. 
Những dòng sản phẩm chất lượng trên toàn Thế Giới sẽ được TTSHOP update một cách nhanh nhất. 
Đi đôi với nó, TTSHOP sẽ loại bỏ những dòng sản phẩm kém chất lượng & không thích hợp với Việt Nam!</p>
                <br>
<p>TTSHOP không chỉ làm việc với niềm đam mê vô tận, mà chúng tôi còn làm việc với lòng nhiệt thành và tận tâm!</p>

                </div>
                <div class="cartegory-right">
                   <div class="cartegory-right-content row">
                       <h1>Thông Tin liên Hệ</h1>
                   </div>
                   
                           
                                 <div class="container">
                        <form action="lienhe.php" method="POST">
                        <div class="row">
                          <div class="col-25">
                            <label for="fname">Họ và tên</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="fname" name="name" placeholder="Tên của bạn">
                          </div>
                        </div>
                       <div class="row">
                          <div class="col-25">
                            <label for="fname">Địa chỉ email</label>
                          </div>
                          <div class="col-75">
                            <input type="email" id="fname" name="email" placeholder="@email">
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-25">
                            <label for="fname">Số điện thoại</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="fname" name="phone" placeholder="Số điện thoại của bạn">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="subject">Ý kiến cá nhân</label>
                          </div>
                          <div class="col-75">
                            <textarea id="subject" name="noidung" placeholder="Viết gì đó..." 
                            style="height:150px"></textarea>
                          </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Xác nhận" name="them" style="margin-left: 795px;">
                        </div>
                        </form>
                      </div>
   

                      
              
                   
                </div>
            </div>
        </div>
    </section>
       




<?php
include "footer.php"
?>