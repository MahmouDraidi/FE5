<?php
$done = false;
$correct = true;
if(isset($_POST['sendNotes'])){
    $correct = false;
    $name = $_POST['Name'] ;
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

if ($name && $email && $phone && $message){
    $db = new mysqli("localhost", 'root', '123456', 'webproj');
   $result = $db ->query("insert into feedback VALUES ('','".$name."','".$email."','".$phone."','".$message."')");

    $correct = true ;

   if ($result)$done=true;

}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="css/loggedIn.css" >
    <link rel="stylesheet" type="text/css" href="css/Head&side.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">


</head>
<body>
<div id="hhh" class="headerdiv w3-row" >



    <span class="w3-col s4">


    <span class="menuicon"  >
        <div id="mc" class="menuCont" onclick="myFunction(this),hide(sss)">
  <div id="bar1"></div>
  <div id="bar2"></div>
  <div id="bar3"></div>
       </div>
        <span class="menutitle"><p style=" font-family: 'Pacifico', cursive;">lazmk?</p></span>

    </span>


</span>
    <span class="searcharea w3-col s4" id="ic1">

             <form>
                <input  id="searchinp" class="w3-input w3-border w3-animate-input w3-white" type="text" placeholder="Search" style="background-image:url(img/searchicon.png); ">
             </form>

    </span>


    <span class="accountinf w3-col s4 w3-center">
       <!--

        <div id="sp" class="w3-row w3-right"><p id="username">Mahmoud</p></div>-->

        <ul id="nameAndImg" onmouseover="document.getElementById('ddm').style.display='block'" onmouseleave="document.getElementById('ddm').style.display=''" class=" navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"> <span class="caret"></span><img src="img\IMG_4763.jpg" class="dropdown-image" /></a>
                    <p style="float: right" class="w3-col " id="username">Mahmoud</p>
                    <ul id="ddm" role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="#">Edit Profile </a></li>
                        <li role="presentation"><a href="#">Add new product </a></li>
                        <li role="presentation" class="activee"><a href="#">Logout </a></li>
                    </ul>


</li>
        </ul>
    </span>
</div>
<!------------------------------siiiiide      menu----------------------------------------------------->
<div id="sss" class="sidediv" >
    <ul class="asidelist">
        <li title="Home" class="home" data-hint="Home">
            <a   href="#" class="aside__link">
                <i  class="sideic fa fa-home "style="font-size: 32px;"></i>
                <p   class="asidetext w3-animate-bottom">Home</p>
            </a>
        </li>

        <li  class="home" data-hint="Home">
            <a href="#" class="aside__link">
                <i   class="sideic glyphicon glyphicon-user w3-xlarge " ></i>
                <p class="asidetext w3-animate-bottom">Profile</p>
            </a>
        </li>

        <li class="home" data-hint="Home">
            <a href="add.html" class="aside__link">
                <i class="sideic  glyphicon glyphicon-plus w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">  Add Ad</p>
            </a>
        </li>

        <li class="home" data-hint="Home">
            <a id="chosen" href="contactUs.html" class="aside__link">
                <i id="chosenicon" class=" sideic fa fa-envelope w3-xlarge "></i>
                <p id="chosentext" class="asidetext w3-animate-bottom">Call us</p>
            </a>
        </li>

        <li class="home" data-hint="Home">


            <a href="#" class="aside__link">
                <i class="sideic  glyphicon glyphicon-log-out w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">Sign out</p>
            </a>

        </li>



    </ul>

</div><!------------------------------------products menu----------------------------------------------->
<div class="maincalldiv">
    <form action="" method="post" class="w3-container w3-card-4 w3-light-grey  w3-margin">
    <h2 class="w3-center">Send your notes</h2>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="contactDivIcons w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border w3-white" name="Name" type="text" placeholder=" Name">
        </div>
    </div>



    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="contactDivIcons w3-xxlarge fa fa-envelope-o"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border w3-white" name="email" type="email" placeholder="Email">
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="contactDivIcons contactDivIcons w3-xxlarge fa fa-phone"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border w3-white" name="phone" type="number" placeholder="Phone">
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil "></i></div>
        <div class="w3-rest">
            <textarea name="message" class="w3-input w3-border w3-white" rows="5" placeholder="Write you message"></textarea>
        </div>
    </div>

    <button id="sendNotes" name="sendNotes" class="w3-button w3-block w3-section w3-ripple w3-padding">Send</button>

        <div class="">


        </div>

        <?php
        if (!$correct){  echo "<h4 style='color: darkred; text-align: center'> please fill the fields</h4>"; }
        if ($done) echo "<h4 style='color: #00bcd4; text-align: center'> Thank you ^^</h4>";
        ?>

    </form>

</div>

<footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3 id="footerhead"><a href="#">Company<span id="footerlogo">logo </span></a></h3>
            <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
            <p class="company-name">Lazmk © 2018 </p>
        </div>
        <div class="col-md-4 col-sm-6 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span">Main Street</span> Tulkarm, Palestine</p>
            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-info email text-left"> +972 595403748</p>
            </div>
            <div><i class="fa fa-envelope footer-contacts-icon"></i>
                <p> <a href="#" target="_blank">support@Lazmk</a></p>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 footer-about">
            <h4>About Lazmk</h4>
            <p> Lazmk is a place where you can advertise you stuff old or new and sell it to large number of people instead of throwing it away.
            </p>
            <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
        </div>
    </div>
</footer>
<script  src="js/head.js"></script>
<script  src="js/main.js"></script>

</body>
</html>