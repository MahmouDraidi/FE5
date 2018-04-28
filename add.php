<?php
session_start();

$pName=$pType=$pPrice=$pInfo=$pAmount=$im1=$im2=$im3=$message="";
$servername = "localhost";
$DBusername = "root";
$target_dir = "productImages/";
$uploadOk=0;
$conn = new mysqli($servername, $DBusername,"","webproj");

if(!(isset($_SESSION["USERNAME"]))){
    die("You need to log in first");
}
$uname=$_SESSION["USERNAME"];

$sql="select * from usertable WHERE username='$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$Fname=$row["firstname"];
echo $Fname;

$sql="select * from userimg WHERE username='$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$uimg=$row["userImage"];

if(isset($_POST["add"])){

$pName   =trim($_POST["prodName"]);
$pType   =$_POST["prodType"];
$pPrice  =$_POST["prodPrice"];
$pInfo   =$_POST["prodInfo"];
$pAmount =$_POST["prodAmount"];
$im1=$_FILES["Image1"]["name"];
$im2=$_FILES["Image2"]["name"];
$im3=$_FILES["Image3"]["name"];


if(!(isset($pName)&&isset($pType)&&isset($pPrice)&&isset($pInfo)&&isset($pAmount)&&isset($im1)&&isset($im2)&&isset($im3))){
    $message="Please fill all fields";
}
if(!(is_numeric($pAmount))||!(is_numeric($pPrice))){
    $message="Amount and Price should be integers";
}
    if (file_exists($target_dir.$im1)||file_exists($target_dir.$im2)||file_exists($target_dir.$im2)) {
        $message= "Sorry, file already exists. try to change name of files";

    }
// Check file size

if($message==""){

    move_uploaded_file($_FILES['Image1']['tmp_name'], $target_dir.$im1);
    move_uploaded_file($_FILES['Image2']['tmp_name'], $target_dir.$im2);
    move_uploaded_file($_FILES['Image3']['tmp_name'], $target_dir.$im3);


         $sqlInsert="insert into product VALUES ('','$uname','$pName','$pPrice','$pAmount','$pType','$pInfo','$im1','$im2','$im3')";
        $result = $conn->query($sqlInsert);

        $message="Product added successfully";




}

}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertiser</title>
    <link rel="stylesheet" type="text/css" href="css/addCSS.css" >
    <link rel="stylesheet" type="text/css" href="css/Head&side.css" >

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    !--===============================================================================================-->
    <link rel="icon" type="image/png" href="../dashboard/img/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Addfonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Addfonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../dashboard/Addcss/util.css">
    <link rel="stylesheet" type="text/css" href="../dashboard/Addcss/main.css">
    <!--===============================================================================================-->



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
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"> <span class="caret"></span><img src="userImages/<?php if($uimg==""){echo 'DefaultUserIMG.png';}else echo $uimg?>" class="dropdown-image" /></a>
                    <p style="float: right" class="w3-col " id="username"><?php if($Fname==""){echo "Name";}else echo $Fname ?></p>
                    <ul style="position: absolute;right: 20px;top: 75px;" id="ddm" role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="<?php if($uname==""){echo "loginAction.php";}     else echo "prof.php" ?>"> <?php if($uname==""){echo "Login";}else echo "Profile" ?> </a></li>
                        <li role="presentation"><a href="<?php if($uname==""){echo "Registration.php";}else echo "add.php" ?>"><?php if($uname==""){      echo "Sign up";}else echo "Add product" ?>  </a></li>
                        <li role="presentation" class="activee"><a href="<?php if($uname==""){echo "contactUs.php";}else echo "Logout.php" ?>"><?php if($uname==""){      echo "Call Lazmk team";}else echo "Sign out" ?>  </a></li>
                    </ul>


</li>
        </ul>
    </span>
</div>
<!------------------------------siiiiide      menu----------------------------------------------------->
<div id="sss" class="sidediv" onmouseleave="myFunction(this)">
    <ul class="asidelist">
        <li title="Home" class="home" data-hint="Home">
            <a href="main.php" class="aside__link">
                <i class="sideic fa fa-home "style="font-size: 32px;"></i>
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
            <a id="chosen" href="add.php" class="aside__link">
                <i id="chosenicon" class="sideic  glyphicon glyphicon-plus w3-xlarge "></i>
                <p id="chosentext" class="asidetext w3-animate-bottom">  Add Ad</p>
            </a>
        </li>

        <li class="home" data-hint="Home">
            <a  href="contactUs.php" class="aside__link">
                <i   class=" sideic fa fa-envelope w3-xlarge "></i>
                <p  class="asidetext w3-animate-bottom">Call us</p>
            </a>
        </li>

        <li class="home" data-hint="Home">


            <a href="#" class="aside__link">
                <i class="sideic  glyphicon glyphicon-log-out w3-xlarge "></i>
                <p class="asidetext w3-animate-bottom">Sign_out</p>
            </a>

        </li>



    </ul>

</div>
<!------------------------------------products menu----------------------------------------------->
<div id="addMenu" class="w3-row">
    <div class="container-contact100">

        <button class="contact100-btn-show">
            <i style="color: white" class="fa fa-plus" aria-hidden="true"></i>
        </button>

        <div class="wrap-contact100">
            <button class="contact100-btn-hide">
                <i class="fa fa-replay" aria-hidden="true"></i>
                &times;
            </button>

            <form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Add new product
				</span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Product name</span>
                    <input class="input100" type="text" name="prodName" placeholder="" value="<?php echo  $pName?>">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Product type</span>

                    <select class="input100" name="prodType" >
                        <option value="" disabled selected>Choose option</option>
                        <option value="Cars">Cars</option>
                        <option value="Furninure">Furninure</option>
                        <option value="Mobiles">Mobiles</option>
                        <option value="Computer">Computer</option>
                        <option value="Cameras">Cameras</option>
                        <option value="Toys">Toys</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Sport equipments">Sport equipments</option>>
                        <option value="Building Tools">Building Tools</option>
                        <option value="Other">Other</option>

                    </select>
                    <span style="border: none;outline: none" class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" >
                    <span class="label-input100">Price</span>
                    <input class="input100" type="number" min="1" name="prodPrice" placeholder="" value="<?php echo  $pPrice?>">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input">
                    <span class="label-input100">Amount</span>
                    <input class="input100" type="number" min="1" name="prodAmount" placeholder="" value="<?php echo  $pAmount?>">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Message is required" >
                    <span class="label-input100">Info</span>
                    <textarea class="input100" name="prodInfo" placeholder="Additional info about your product status"><?php echo $pInfo?></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" >
                    <span class="label-input100">Choose 3 images for your product</span>

                    <input class="" type="file" name="Image1" accept="image/gif, image/jpeg, image/png" placeholder="">
                    <input class="" type="file" name="Image2" accept="image/gif, image/jpeg, image/png" placeholder="">
                    <input class="" type="file" name="Image3" accept="image/gif, image/jpeg, image/png" placeholder="">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit" name="add">
						<span>
							Proceed
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>


        </div>
    </div>



    <div id="dropDownSelect1"></div>




</div>
<div>
    <p id="warnMSG"><?php echo $message?></p>
</div>

<footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3 id="footerhead"><a href="#">Lazmk<span id="footerlogo">? </span></a></h3>
            <p class="links"><a href="loginAction.php">Home</a><strong> · </strong><a href="#">Add product</a><strong> · </strong><a href="#">About</a><strong> ·  </strong><a href="contactUs.php">Contact</a></p>
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

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>

<!--===============================================================================================-->
<script src="js/addPage.js"></script>

<script src="js/head.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>



</body>
</html>