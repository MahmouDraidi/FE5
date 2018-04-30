<?php

$Fname="";
session_start();
$Fname="";
$uname="";
$uimg="";
$uEmail="";
$Lname="";
$uMobNum="";
$conEmail=$conMSG=$conName=$conMob=$warningMSG="";


if(isset($_SESSION["USERNAME"])){
    $uname=$_SESSION["USERNAME"];
    $conn=new mysqli('localhost',"root",'','webproj');
    $sql="select * from usertable WHERE username='$uname'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    $Fname=$row["firstname"];
    $Lname=$row["lastname"];
    $uMobNum=$row["mobileNom"];
    $uEmail=$row["email"];


    $sql="select * from userimg WHERE username='$uname'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    $uimg=$row["userImage"];






    $conn->close();
}

if(isset($_POST["submit"])){
    $conName =$_POST["Name"];
    $conMob  =$_POST["mobile"];
    $conEmail=$_POST["email"];
    $conMSG  =$_POST["feedbackMSG"];



    if($conName!="" && $conMob!="" && $conEmail!="" && $conMSG !=""  ){
        $conn=new mysqli('localhost',"root",'','webproj');
        $sql="insert into feedback values('','$conName','$conEmail','$conMob','$conMSG')";
        $conn->query($sql);
        $warningMSG="Your message has been sent. <br> Thanks for your feedback" ;
        $conMSG="";

    }
    else $warningMSG="Input error, make sure of the information!";







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
    <script src="js/main.js"></script>
    <script src="js/head.js"></script>

    <style>

        #warnMSG{
            text-align: center;
            font-size: 1.5em;
            animation:alarm ;
            transition: .8s;
            animation-name: alarm;
            animation-duration: 1s;
            animation-delay: .1s;
            animation-iteration-count:5;
        }
        @keyframes alarm {
            from {color: red;}
            to {color: white;}
        }
        form{
            color: #FFF;
        }
        #maincalldiv{

            /* width: 40%; */
            /* height: 100%; */
            top: 100px;
            margin: auto;
            padding: 2%;
            border-radius: 10%;
            background-color: rgba(0,188,212,0.2);
            position: relative;
            width :50%;

        }
        @media (max-width:700px){
            #maincalldiv{

                /* width: 40%; */
                /* height: 100%; */
                top: 120px;

                width :90%;
            }

        }
        .button {
            border-radius: 4px;
            background-color: #00BCD4;
            border: none;
            color: #FFFFFF;
            text-align: center;
            padding: 10px;
            width: 100%;
            font-size: 1.2em;
            transition: all 0.5s;
            cursor: pointer;
            margin: auto;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.85s;
            font-size:1.1em;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }


    </style>

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
                     <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"> <span class="caret"></span><img src="userImages/<?php if($uname==""){echo 'DefaultUserIMG.png';}else echo $uimg?>" class="dropdown-image" /></a>
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
            <a style="border-top-right-radius: 37px" href="main.php" class="aside__link">
                <i  class="sideic fa fa-home "style="font-size: 32px;"></i>
                <p   class="asidetext w3-animate-bottom">Home</p>
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
            <a id="chosen" href="#" class="aside__link">
                <i id="chosenicon" class=" sideic fa fa-envelope w3-xlarge "></i>
                <p id="chosentext" class="asidetext w3-animate-bottom">Call us</p>
            </a>
        </li>



        <li class="home" data-hint="Home">
            <a style="border-bottom-left-radius: 37px" href="<?php if($uname==""){echo "ioginAction.php";}else echo "Logout.php" ?>" class="aside__link" style="<?php if($uname==""){echo "background: tomato";}?>">
                <i style="<?php if($uname==""){echo "color: white";}?>" class="sideic  glyphicon glyphicon-log-out w3-xlarge <?php if($uname=="")echo "w3-spin"?>"></i>
                <p style="<?php if($uname==""){echo "color: white";}?>" class="asidetext w3-animate-bottom"><?php if($uname=="")echo "Sign in"; else echo "Sign Out" ?></p>
            </a>
        </li>



    </ul>

</div><!------------------------------------products menu----------------------------------------------->
<div id="maincalldiv">
    <form style="color: white" method="post" class="w3-container w3-card-4   w3-margin">
    <h2 class="w3-center "style="color: black">Send your notes</h2>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="contactDivIcons w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border w3-white" name="Name" type="text" placeholder=" Name"  value="<?php echo "$Fname  $Lname" ; ?>" <?php if($uname!="") echo "readonly"?>>
        </div>
    </div>



    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="contactDivIcons w3-xxlarge fa fa-envelope-o"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border w3-white" name="email" type="email" placeholder="Email" value="<?php echo "  $uEmail" ; ?>" <?php if($uname!="")echo "readonly"?>>
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="contactDivIcons contactDivIcons w3-xxlarge fa fa-phone"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border w3-white" name="mobile" type="number" placeholder="Phone" value="<?php echo "$uMobNum";?>" <?php if($uname!="")echo "readonly"?>>
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil "></i></div>
        <div class="w3-rest">
            <textarea name="feedbackMSG" class="w3-input w3-border w3-white" rows="5" placeholder="Write your message"><?php echo "$conMSG";?></textarea>
        </div>
    </div>

    <button name="submit" id="sendNotes" class="button "><span>Send </span></button>

        <div class="">
            <p id="warnMSG"><?php echo $warningMSG?></p>
        </div>

    </form>

</div>

<footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3 id="footerhead"><a href="#">Company<span id="footerlogo">logo </span></a></h3>
            <p class="links"><a href="#">Home</a><strong> · <a href=<?php if($Fname=="") echo"#";else echo "prof.php"?>>Profile</a><strong> · </strong><a href="<?php if($Fname=="") echo"#";else echo "add.php"?>">Add product</a><strong> ·  </strong><a href="contactUs.php">Contact</a></p> <p class="company-name">Lazmk © 2018 </p>
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

<script>

    var prevScrollpos = window.pageYOffset;
    var e = document.getElementById("hhh");
    var height = getStyle(e, 'height');
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("hhh").style.top = "0";
        } else {
            document.getElementById("hhh").style.top ="-"+height;
        }
        prevScrollpos = currentScrollPos;
    }
</script>
</body>
</html>