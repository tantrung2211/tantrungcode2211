   
<style>
.mySlides3 {display:none; width:100%}
.display-container{position:relative}

/*---Css Nút qua lại---*/
.button-left{left:1%; font-size:20px}
.button-right{right:1%; font-size:20px }
.image-button{border:none;display:inline-block;padding:10px;height:50px;vertical-align:middle;overflow:hidden; color:#fff;background:#000;position:absolute;top:calc(50% - 25px); opacity:0.5;}
.image-button:hover{color:#000;background:#ccc;}

/*---Css Chấm tròn---*/
.badge {text-align:center; margin-bottom:16px; font-size:20px;position:absolute;bottom:0;}
.badge-white{color:#000!important;background-color:#fff!important}
.image-badge {display:inline-block;border-radius:50%;height:14px;width:14px; border:1px solid #ccc;}
.image-badge:hover{background:#fff;}

</style>
    <!-- -----------------------SLlDER---------------------------------------------- -->
   

    <section class="sliders">
           <div class="display-container">
  <img style="width: 100%;height: 600px;" class="mySlides3" src="image/slider11.png">
  <img style="width: 100%;height: 600px;" class="mySlides3" src="image/slider5.png">
  <img style="width: 100%;height: 600px;" class="mySlides3" src="image/slider10.png">

  <button class="image-button button-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="image-button button-right" onclick="plusDivs(1)">&#10095;</button>

  <div class="badge" style="width:100%">

    <span class="image-badge" onclick="currentDiv(1)"></span>
    <span class="image-badge" onclick="currentDiv(2)"></span>
    <span class="image-badge" onclick="currentDiv(3)"></span>
  </div>
</div>
    </section>
    <!-- -----------------------------------slider----------------------- -->

    <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides3");
  var dots = document.getElementsByClassName("image-badge");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" badge-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " badge-white";
}
</script>