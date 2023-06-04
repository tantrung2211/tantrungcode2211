
<!DOCTYPE html>
<html lang="en">
<head>
    
     <title>ERORR 404</title>
</head>
<style >
    
   * {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
@font-face {
  font-family: Code-Pro-Black;
  src: local(
      "https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro-Black.otf"
    ),
    url(https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro-Black.otf)
      format("opentype");
}
@font-face {
  font-family: Code-Pro-Bold;
  src: local(
      "https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro-Bold.otf"
    ),
    url(https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro-Bold.otf)
      format("opentype");
}
@font-face {
  font-family: Code-Pro-Light;
  src: local(
      "https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro-Light.otf"
    ),
    url(https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro-Light.otf)
      format("opentype");
}
@font-face {
  font-family: Code-Pro;
  src: local(
      "https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro.otf"
    ),
    url(https://unpkg.com/aks-fonts@1.0.0/Codepro/Code-Pro.otf)
      format("opentype");
}
.aks-404-page{
      background: url("https://i.ibb.co/jf42cqR/noise.jpg");
  animation: animate 0.5s steps(10) infinite;
     width: 100%;
    height: 100vh;position: relative;
}
.aks-404-page-box{
    width: 100%;
    height: 100vh;
    background: url(https://github.com/Ahmetaksungur/Vehicle-tracking-with-Opencv/blob/master/iceland.jpg?raw=true);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  opacity:.9;
}
.aks-404-page-content{
      width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    color: #2f2f2f;
    position: relative;
    z-index: 10;
  user-select: none;
}
.aks-404-page-content h1{
position: relative;
    font-size: 177px;
    font-family: Code-Pro-Bold;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: normal;
}
.aks-404-page-content h3{
      font-family: Code-Pro-Light;
    position: relative;
    margin-bottom: 2rem;
    font-size: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: normal;
    letter-spacing: .9px;
}
.aks-404-page-btn{
  color: #d8d8d8;
    text-decoration: none;
    padding: 15px 25px;
    background: #2f2f2f;
    border-radius: 9999px;
    font-family: Code-Pro;
    position: relative;
    cursor: pointer;
  transition: all 350ms ease-in-out;
}
.aks-404-page-btn:hover{
      background: #1d1d1d;
}
@keyframes animate {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 100% 100%;
  }
}



</style>

<div class="aks-404-page">
<div class="aks-404-page-box">
  <div class="aks-404-page-content">
    <h1>404</h1>
    <h3>Page not found</h3>
    <a href="index.php" class="aks-404-page-btn">GO TO HOME</a>
  </div>  
  </div>
  </div>