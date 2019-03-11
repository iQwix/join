<!DOCTYPE html>
<?php
if(isset($_POST['submit'])){
    require_once('inc/register.inc.php');
}
$name = htmlentities(strip_tags(strtolower($_POST['name'])));
$email = htmlentities(strip_tags(strtolower($_POST['email'])));
$country = htmlentities(strip_tags($_POST['country']));
$age = htmlentities(strip_tags($_POST['age']));
$link1 = htmlentities(strip_tags(strtolower($_POST['link1'])));
$link2 = htmlentities(strip_tags(strtolower($_POST['link2'])));
$joinas = htmlentities(strip_tags($_POST['joinas']));
session_start();
include("inc/connected.php");
if(isset($_GET['error'])){
    include_once('inc/input.inc.php');
}
?>
<html>
  <head>
      <title>Request join</title>
    <link rel="stylesheet" type="text/css" href="frameWorks/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="image/logo.PNG">
    <meta charset="utf-8">


  </head>
 <body>
 <center>
    <div class="contant">
        <img src="image/logo.PNG" width="150" height="150">
        <span class="main-text"><h4>Request To Join</h4></span>
        <?php include_once('inc/get.inc.php'); ?>
         <form onsubmit="return formValidate()" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
             <?php
             if(! empty($errorLogName)){
                 foreach($errorLogName as $namee){
                     echo '
                        <div class="alert alert-denger alert-dismissible fade show" role="alert">
                          <strong style="color: #fff">Error Name!</strong> '.$namee.'
                        </div>
                     ';
                 }
             }
             ?>
                 <p class="text">Name <input id="name" type="text" name="name" value="<?php if(! empty($name)){ echo $name; } ?>" placeholder="Insert Your Name" ></p>
                 <span class="error" id="nameError"></span>
             <?php
             if(! empty($errorLogEmail)){
                 foreach($errorLogEmail as $emaile){
                     echo '
                        <div class="alert alert-denger alert-dismissible fade show" role="alert">
                              <strong style="color: #fff">Error Email!</strong> '.$emaile.'
                        </div>
                     ';
                 }
             }
             ?>
             <p class="text">Email <input id="email" name="email" value="<?php if(! empty($email)){ echo $email; }?> "type="email" placeholder="Insert Your Email"   autocomplete='off'></p>
                <span class="error" id="emailError"></span>
            <?php include("country.php"); ?>
            <p class="text">Age <select class="select1" name="age">
                <option name="age" value="13">13</option>
                <option name="age" value="14">14</option>
                <option name="age" value="15">15</option>
                <option name="age" value="16">16</option>
                <option name="age" value="17">17</option>
                <option name="age" value="18">18</option>
                <option name="age" value="19">19</option>
                <option name="age" value="20">20</option>
                <option name="age" value="21">21</option>
                <option name="age" value="22">22</option>
                <option name="age" value="23">23</option>
                <option name="age" value="24">24</option>
                <option name="age" value="25">25</option>
            </select></p>
            <?php
             if(! empty($errorLogLink1)){
                 foreach($errorLogLink1 as $link1e){
                     echo '
                        <div class="alert alert-denger alert-dismissible fade show" role="alert">
                          <strong style="color: #fff">Error Twitter!</strong> '.$link1e.'
                        </div>
                     ';
                 }
             }
             ?>
             <p class="text">Twitter<input type="text" id="twitter" value="<?php if(! empty($link1)){ echo $link1; }?>" name="link1" placeholder="Insert Your Account" ></p>
             <span class="error" id="twitterError"></span>
             <?php
             if(! empty($errorLogLink2)){
                 foreach($errorLogLink2 as $link2e){
                     echo '
                        <div class="alert alert-denger alert-dismissible fade show" role="alert">
                          <strong style="color: #fff">Error instagram!</strong> '.$link2e.'
                        </div>
                     ';
                 }
             }
             ?>
             <p class="text">Instagram<input type="text" id="insta" value="<?php if(! empty($link2)){ echo $link2; }?>" name="link2" placeholder="Insert Your Account" ></p>
             <span class="error" id="instaError"></span>
             <?php
                 include("joinas.php");
             ?>
             <br><br>
                     <button  onmouseover="Check()" name="submit">
                      <p>Send</p>
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                        <path id="paper-plane-icon" d="M462,54.955L355.371,437.187l-135.92-128.842L353.388,167l-179.53,124.074L50,260.973L462,54.955z
                    M202.992,332.528v124.517l58.738-67.927L202.992,332.528z"></path>
                      </svg>
                    </button>
         </form>
    </div></center>
     <!-- JavaScript Files -->
     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
     <script src="liveChat/liveChat-En.js"></script>
     <script src="js/script.js"></script>
     <script>
          $('button').click(function() {
          $(this).toggleClass('clicked');
          $('button p').text(function(i, text) {
            return text === "Sent!" ? "Send" : "Sent!";
              });
            });
     </script>
 </body>
</html>
