<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-26
 * Time: 9:44 PM
 */

session_start();
$uname="";
if(!(isset($_SESSION["USERNAME"]))){
    header( "refresh:5;url=loginAction.php" );
    die("You need to log in first");

}
$target_dir = "userImages/";
$erEm=$erMob=$erPW=$erImage=$im1=$uimg="";
$color="";
$doneMSG="";

$conn=new mysqli('localhost',"root",'','webproj');
$uname=$_SESSION["USERNAME"];

$sql="select * from userimg WHERE username='$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$uimg=$row["userImage"];
echo $uimg;

$sql="select * from usertable WHERE username='$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$color=$row["userColor"];
$sql="select * from useradress WHERE username='$uname'";
$res=$conn->query($sql);
$addr=$res->fetch_assoc();



$First =$row["firstname"];
$Last =$row["lastname"];
$BD =$row["birthdate"];
$job =$row["job"];
$sex =$row["sex"];
$Email = $row["email"];
$oldPW=$row["pw"];
$FB=$row["FBaccount"];
$mob =$row["mobileNom"];
$buildNom =$addr["buildingNom"];
$street =$addr["street"];
$city =$addr["city"];
$im1="";

if(isset($_POST["submit"])){
    $conn=new mysqli('localhost',"root",'','webproj');

    $pw1 = $_POST["pw1"];
    $pw2 = $_POST["pw2"];
    $job = $_POST["Job"];
    $buildNom = $_POST["Bnom"];
    $street = $_POST["Street"];
    $city = $_POST["city"];
    $updatedEmail = $_POST["email"];
    $updatedMob = $_POST["Mnom"];
    $FBacc = $_POST["fb"];
    $im1=$_FILES["image"]["name"];



    $sqlEmail = "SELECT email FROM usertable ";
    $result = $conn->query($sqlEmail);
if($updatedEmail!=$Email){
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($updatedEmail==$row["email"]){
                $erEm="The Email:   $updatedEmail  is already in use  ";
                break;
            }
        }
    }}

    $sqlMob = "SELECT mobileNom FROM usertable ";
    $result = $conn->query($sqlMob);

if($mob!=$updatedMob){
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($updatedMob==$row["mobileNom"]){$erMob="The mobile nom:   $mob  is already used  ";

                break;
            }
        }
    }
}
if($pw1!=""){
    if( $pw1 != $pw2 ) {
        $erPW='Password and confirm password does not match!';
    }
    if( $pw1 != "" && !preg_match( "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $_POST["pw1"] ) ) {
        $erPW='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters';
    }
}
    if( $updatedEmail!= "" && !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"] ) ) {
        $erEM='Enter valid email';
    }
    if($im1!=""){

        $im1=rand(1000000,9999999);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir.$im1);
            $sql="update userimg  SET userImage='$im1' WHERE username='$uname'";
            $res=$conn->query($sql);


    }

    if($erMob=="" && $erEm=="" && $erPW=="" ){
    if($pw1==""&& $pw2=="")$pw1=$oldPW;
        $sql="update usertable SET job='$job',pw='$pw1',email='$updatedEmail',FBaccount='$FB' WHERE username='$uname'";
        $conn->query($sql);
        $sql="update useradress SET buildingNom='$buildNom',street='$street',city='$city' WHERE username='$uname'";
        $conn->query($sql);
        $SuccessMSG="";
        $doneMSG="Your information has been updated successfully!";


    }


}


$conn->close();
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



    <style>
        .errMSG{
            color: red;
            font-size: 1.8em;
            text-align: center;
        }
    </style>
</head>

<body onload="theme()">


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
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"> <span class="caret"></span><img src="userImages/<?php if($uimg==""){echo 'DefaultUserIMG.png';}else echo $uimg?>" class="dropdown-image" /></a>
                    <p style="float: right" class="w3-col " id="username"><?php if($uname==""){echo "Name";}else echo $First ?></p>
                    <ul style="position: absolute;right: 20px;top: 75px;" id="ddm" role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="<?php if($uname==""){echo "loginAction.php";}     else echo "prof.php" ?>"> <?php if($uname==""){echo "Login";}else echo "Profile" ?> </a></li>
                        <li role="presentation"><a href="<?php if($uname==""){echo "Registration.php";}else echo "add.php" ?>"><?php if($uname==""){      echo "Sign up";}else echo "Add product" ?>  </a></li>
                        <li role="presentation" class="activee"><a style="<?php if($color=="#FF6347")echo 'color:white;'?>" href="<?php if($uname==""){echo "contactUs.php";}else echo "Logout.php" ?>"><?php if($uname==""){      echo "Call Lazmk team";}else echo "Sign out" ?>  </a></li>
                    </ul>


</li>
        </ul>
    </span>
</div>

<!------------------------------siiiiide      menu----------------------------------------------------->
<div id="sss" class="sidediv" >
    <ul class="asidelist">
        <li title="Home" class="home" data-hint="Home">
            <a style="border-top-right-radius: 37px" href="main.php" class="aside__link">
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


            <a style="border-bottom-left-radius: 37px;" href="Logout.php" class="aside__link">
                <i class="sideic  glyphicon glyphicon-log-out w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">Sign out</p>
            </a>

        </li>



    </ul>

</div>
<!--lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->

<div id="mainProfile">
    <div  class="container post">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-0 col-md-5 col-xs-offset-0 post-title"><img class="img-circle img-responsive" src="userImages/<?php if($uimg==""){echo 'DefaultUserIMG.png';}else echo $uimg?>" alt="USER PHOTO" width="80%">
                    <h1 class="text-justify"><?php echo $First ." ". $Last ;?></h1>
                    <p style="font-size: 1.7em" class="text-left author"><?php echo $uname ;?> </p>
                    <p class="errorMSG"> <?php echo $erImage?></p>
                    <input id="UpImage" name="image" type="file" style="display: none">
                </div>
                <div class="col-lg-7 col-lg-offset-0 col-md-7 col-md-offset-0 post-body">
                    <p class="secTitle">About me</p>

                 <!--   <div class="row">
                        <div class="col-md-12">
                            <span class=" ProfLabel w3-col l4 m4 s4"> Job</span>
                            <input  class="prof_inp input-lg " type="text"  disabled>
                        </div>
                    </div>-->
                    <div class="row">
                    <span style="margin-left: 10px" class=" ProfLabel w3-col l4 m4 s4">Job</span>
                    <input style="    width: 48%; margin-left: -6px" class="prof_inp input-lg" list="jobs" name="Job" id="job" value="<?php echo $job ;?>" disabled>


                    <datalist id="jobs" class="">
                        <option value="Engineer">
                        <option value="Police man">
                        <option value="Teacher">
                        <option value="Student">
                        <option value="Doctor">
                        <option value="Farmer">
                        <option value="Worker">
                    </datalist>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4"> Sex</span>
                            <input style="width: 50%" class="prof_inp input-lg"name="Sex" value="<?php echo $sex ;?>" type="text" id="userSex"disabled >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4">Birthdate </span>
                            <input style="width: 50%" class="prof_inp input-lg " name="BD" value="<?php echo $BD ;?>" type="date" id="BD" disabled>
                        </div>
                    </div>

                    <p class="secTitle">Adress info</p>
                    <div class="row">
                        <span style="margin-left: 10px" class=" ProfLabel w3-col l4 m4 s4">City</span>
                        <input style="width: 48%;margin-left: -6px;" class="prof_inp input-lg" list="cities" name="city" id="city" value="<?php echo $city;?>" disabled>


                        <datalist id="cities" class="">
                            <option value="Tulkarm">
                            <option value="Jenin">
                            <option value="Nablus">
                            <option value="Jerusalem">
                            <option value="Hebron">
                            <option value="Ramallah">
                            <option value="Qalqilieh">
                        </datalist>
                    </div>

                   <!-- <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4 "> Street</span>
                            <input style="width: 50%" class="prof_inp input-lg" value="" type="text" id="str1" disabled >
                        </div>
                    </div>-->

                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4 "> Street</span>
                            <input style="width: 50%" class="prof_inp input-lg" name="Street" value="<?php echo $street ;?>" type="text" id="hell" disabled >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4 "> Buiding Nom</span>
                            <input style="width: 50%" class="prof_inp input-lg" name="Bnom" value="<?php echo $buildNom ;?>" type="text" id="bnom" disabled >
                        </div>
                    </div>




                    <p class="secTitle">Contact info</p>


                    <div class="row">
                        <div class="col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4 "> E-mail</span>
                            <input style="width: 50%" class="prof_inp input-lg" name="email" value="<?php echo $Email ;?>" type="text" id="email" disabled >
                            <p class="errorMSG"><?php echo $erEm?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4" >Mobile Nom.</span>
                            <input style="width: 50%" class="prof_inp input-lg" name="Mnom" value="<?php echo $mob ;?>" type="text" id="mobile" disabled>
                            <p class="errorMSG"><?php echo $erMob?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12">
                           <span class="ProfLabel  w3-col l4 m4 s4" ><a href="<?php echo $FB?>"> <i id="fbIcon" class="fa fa-facebook-square  "></i></a></span>
                            <input style="width: 50%" class="prof_inp input-lg" name="fb" value="<?php echo $FB ;?>" type="text" id="FB" disabled >

                        </div>
                    </div>

                    <div id="PW1_div" class="row" style="display: none">
                        <div class=" col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4" >New password</span>
                            <input style="width: 50%" class="prof_inp input-lg" name="pw1"  type="text" id="PW1" disabled >

                        </div>
                    </div>
                    <div id="PW2_div" class="row" style="display: none">
                        <div class=" col-md-12">
                            <span class="ProfLabel  w3-col l4 m4 s4" >Confirm</span>
                            <input style="width: 50%"  class="prof_inp input-lg" name="pw2" type="text" id="PW2" disabled >


                        </div>
                    </div>
                    <p class="errorMSG"><?php echo $erPW?></p>
                    <p class="errMSG"><?php echo $doneMSG?></p>
                    <div style="margin: 30px 0px 30px -15px;" class="row ">
                        <div class=" col-md-12">
                            <input id="editButton" name="submit" class="w3-button w3-col 4" type="submit" value="Save new info"  >
                            <input id="cancel" class="w3-button w3-col 4" type="button" value="Cancel">
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
            <h3 id="footerhead"><a href="#">Lazmk<span id="footerlogo">? </span></a></h3>
            <p class="links"><a href="loginAction.php">Home</a><strong> · </strong><a href="add.php">Add product</a><strong> · </strong><a href="#">Profile</a><strong> ·  </strong><a href="contactUs.php">Contact</a></p>
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
<script>
    function theme() {
        var html = document.getElementsByTagName('html')[0];
        html.style.cssText = "--main-site-col: <?php if($color!="")echo $color;  ?>";
    }
</script>
</body>
</html>