<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-26
 * Time: 9:44 PM
 */



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertiser</title>
    <link rel="stylesheet" type="text/css" href="css/profCSS.css" >
    <link rel="stylesheet" type="text/css" href="css/Head&side.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie" >

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
            <a   href="loggedUser.php" class="aside__link">
                <i  class="sideic fa fa-home "style="font-size: 32px;"></i>
                <p   class="asidetext w3-animate-bottom">Home</p>
            </a>
        </li>

        <li  class="home" data-hint="Home">
            <a id="chosen" href="Prof.html" class="aside__link">
                <i id="chosenicon"  class="sideic glyphicon glyphicon-user w3-xlarge " ></i>
                <p id="chosentext" class="asidetext w3-animate-bottom">Profile</p>
            </a>
        </li>

        <li class="home" data-hint="Home">
            <a href="add.php" class="aside__link">
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


            <a href="LoginPage.html" class="aside__link">
                <i class="sideic  glyphicon glyphicon-log-out w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">Sign out</p>
            </a>

        </li>



    </ul>

</div>
<!--lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->

<div id="mainProfile">
    <div  class="container post">
        <form>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-0 col-md-5 col-xs-offset-0 post-title"><img class="img-circle img-responsive" src="img/IMG_4763.JPG" alt="USER PHOTO" width="80%">
                    <h1 class="text-justify">Mahmoud Draidi</h1>
                    <p class="text-left author">mahmoud1997 </p>
                </div>
                <div class="col-lg-7 col-lg-offset-0 col-md-7 col-md-offset-0 post-body">
                    <p class="secTitle">About me</p>
                    <div class="row">
                        <div class="col-md-12">
                            <span class=" ProfLabel w3-col l4 m4 s4"> Sex</span>
                            <input  class="prof_inp input-lg " type="text" id="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4">Birthdate </span>
                            <input class="prof_inp input-lg " type="text" id="BD" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4"> Sex</span>
                            <input class="prof_inp input-lg" type="text" id="userSex"disabled >
                        </div>
                    </div>
                    <p class="secTitle">Contact info</p>


                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4 "> E-mail</span>
                            <input class="prof_inp input-lg" type="text" id="email" disabled >
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4" >Mobile Nom.</span>
                            <input class="prof_inp input-lg" type="text" id="mobile" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4" ><i id="fbIcon" class="fa fa-facebook-square  "></i></span>
                            <input class="prof_inp input-lg" type="text" id="FB" disabled >

                        </div>
                    </div>

                    <div style="margin: 30px 0px 30px -15px;" class="row ">
                        <div class=" col-md-12">
                            <input id="editButton" class="w3-button w3-col 4" type="submit" value="Save Changes"  >
                            <input id="cancel" class="w3-button w3-col 4" type="button" value="Cancel" onclick="open(Prof.html)">


                        </div>
                    </div>




                </div>

            </div>
        </form>
    </div>
</div>
<div id="editDiv" onclick="Prof_editProf()">
    <i id="editIcon" class="fa fa-edit  "></i>
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