<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-26
 * Time: 9:31 PM
 */
session_start();
$Fname="";
$uname="";
$uimg="";
if(isset($_SESSION["USERNAME"])){
    $uname=$_SESSION["USERNAME"];
    $conn=new mysqli('localhost',"root",'','webproj');
    $sql="select * from usertable WHERE username='$uname'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    $Fname=$row["firstname"];

    $sql="select * from userimg WHERE username='$uname'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    $uimg=$row["userImage"];



$conn->close();
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertiser</title>
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
        <div id="mc" class="menuCont" onclick="myFunction(this)">
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
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"> <span class="caret"></span><img src="userImages/<?php if($uimg==""){echo 'DefaultUserIMG.png';}else echo $uimg?>" class="dropdown-image" /></a>
                    <p style="float: right" class="w3-col " id="username"><?php if($Fname==""){echo "Name";}else echo $Fname ?></p>
                    <ul id="ddm" role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="<?php if($uname==""){echo "loginAction.php";}     else echo "prof.php" ?>"> <?php if($uname==""){echo "Login";}else echo "Profile" ?> </a></li>
                        <li role="presentation"><a href="<?php if($uname==""){echo "Registration.php";}else echo "add.php" ?>"><?php if($uname==""){      echo "Sign up";}else echo "Add product" ?>  </a></li>
                        <li role="presentation" class="activee"><a href="<?php if($uname==""){echo "contactUs.php";}else echo "Logout.php" ?>"><?php if($uname==""){      echo "Call Lazmk team";}else echo "Sign out" ?>  </a></li>
                    </ul>


</li>
        </ul>
    </span>
</div>
<!------------------------------siiiiide      menu----------------------------------------------------->
<div id="sss" class="sidediv" onmouseleave="myFunction(this)" >
    <ul class="asidelist">
        <li title="Home" class="home" data-hint="Home">
            <a  id="chosen" href="#" class="aside__link">
                <i id="chosenicon" class="sideic fa fa-home "style="font-size: 32px;"></i>
                <p id="chosentext"  class="asidetext w3-animate-bottom">Home</p>
            </a>
        </li>

        <li  class="home" data-hint="Home">
            <a  href="<?php if($uname==""){echo '#';}else{echo "prof.php";}?>"  style="<?php if($uname==""){echo "cursor: not-allowed";}?>" class="aside__link" >
            <i   class="sideic glyphicon glyphicon-user w3-xlarge " ></i>
                <p class="asidetext w3-animate-bottom">Profile</p>
            </a>
        </li>

        <li class="home" data-hint="Home">
            <a  href="<?php if($uname==""){echo '#';}else{echo "add.php";}?>"  style="<?php if($uname==""){echo "cursor: not-allowed";}?>" class="aside__link" >
                <i class="sideic  glyphicon glyphicon-plus w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">  Add Ad</p>
            </a>
        </li>

        <li class="home" data-hint="Home">
            <a href="contactUs.php" class="aside__link">
                <i class=" sideic fa fa-envelope w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">Call us</p>
            </a>
        </li>

        <li class="home" data-hint="Home">


            <a href="<?php if($uname==""){echo "ioginAction.php";}else echo "Logout.php" ?>" class="aside__link" style="<?php if($uname==""){echo "background: tomato";}?>">
                <i style="<?php if($uname==""){echo "color: white";}?>" class="sideic  glyphicon glyphicon-log-out w3-xlarge <?php if($uname=="")echo "w3-spin"?>"></i>
                <p style="<?php if($uname==""){echo "color: white";}?>" class="asidetext w3-animate-bottom"><?php if($uname=="")echo "Sign in"; else echo "Sign Out" ?></p>
            </a>

        </li>



    </ul>

</div>

<!------------------------------------products menu----------------------------------------------->

<div id="mainDiv">

    <div  class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img/img_nature_wide.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img/img_fjords_wide.jpg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img/img_mountains_wide.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img/p1.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>



<footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3 id="footerhead"><a href="#">Lazmk<span id="footerlogo">? </span></a></h3>
            <p class="links"><a href="#">Home</a><strong> · <a href=<?php if($uname=="") echo"#";else echo "prof.php"?>>Profile</a><strong> · </strong><a href="<?php if($uname=="") echo"#";else echo "add.php"?>">Add product</a><strong> ·  </strong><a href="contactUs.php">Contact</a></p>
            <p class="company-name">Lazmk © 2018 </p>
        </div>
        <div class="col-md-4 col-sm-6 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span">Main Street</span> Tulkarm, Jenin</p>

            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-info email text-left"> +972 595403748  </p>
                <p class="footer-center-info email text-left"> +972 595435114  </p>
            </div>
            <div><i class="fa fa-envelope footer-contacts-icon"></i>
                <p> <a href="contactUs.php" target="_blank">support@Lazmk</a></p>
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





