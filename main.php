<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-26
 * Time: 9:31 PM
 */
session_start();


$color="";
$Fname="";
$uname="";
$uimg="";
$icon="";
if(isset($_SESSION["USERNAME"])){
    $uname=$_SESSION["USERNAME"];



    $conn=new mysqli('localhost',"root",'','webproj');
    $sql="select * from usertable WHERE username='$uname'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    $Fname=$row["firstname"];
    $color=$row["userColor"];


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


    <style>
        #allproInfo{
            display: none;
            position: absolute;
            background: rgba(0,0,0,.2);
            width: 100%;
            height: 100%;
            margin: auto;
        }
       .pID, .pOwner{
            text-align: left;
        }
       .prodDiv{
           margin:10px 0px;


       }
       .pType{
           font-size: 15px;
       }
       .prodDiv>img{
           border: 1px solid <?php if($color!="")echo $color;else echo "#00bcd4" ?>;
           height: 180px;
       }
       .pPrice{
           background: <?php if($color!="")echo $color;else echo "#00bcd4" ?>;border-radius: 5px;
           font-size: 20px;

           color: white;
       }
       .prodDiv:hover{
           cursor: pointer;
           opacity: .5;

       }
       .prodDiv:hover>p>i{

           opacity: .9;

       }
       .ownerUname{
           display: none;
       }
       @media (max-width:600px) {
           .prodDiv>img{
               height: 380px;
           }

       }
    </style>

</head>
<body onload="theme()">
<div id="hhh" class="headerdiv w3-row" >



    <span class="w3-col s4">


    <span class="menuicon"  >
        <div id="mc" class="menuCont" onclick="myFunction(this)">
  <div id="bar1"></div>
  <div id="bar2"></div>
  <div id="bar3"></div>
       </div>
        <span  class="menutitle"><p style=" font-family: 'Pacifico', cursive;">lazmk?</p></span>

    </span>


</span>
    <span class="searcharea w3-col s4" id="ic1">

             <form>
                <input onkeyup="filter()"  id="searchinp" class="w3-input w3-border w3-animate-input w3-white" type="text" placeholder="Search" style="background-image:url(img/searchicon.png); ">
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
                        <li role="presentation" class="activee"><a  style="<?php if($color=="#FF6347")echo 'color:white;'?>"  href="<?php if($uname==""){echo "contactUs.php";}else echo "Logout.php" ?>"><?php if($uname==""){      echo "Call Lazmk team";}else echo "Sign out" ?>  </a></li>

                        <div>
                            <ul style="list-style: none;border: none;">
                                <p style="text-align: center;font-size: 1.5em">Theme</p>
                                <li onclick="changeCol(1)" style="background:#000;   " class="themeCol"></li>
                                <li onclick="changeCol(2)" style="background:#00BCD4 " class="themeCol"></li>
                                <li onclick="changeCol(3)" style="background:#FF6347 " class="themeCol"></li>
                                <li onclick="changeCol(4)" style="background:#800080 " class="themeCol"></li>
                                <li onclick="changeCol(5)" style="background:#008000 " class="themeCol"></li>
                                <li onclick="changeCol(6)" style="background:#ff0000 " class="themeCol"></li>
                                <li onclick="changeCol(7)" style="background:#00008b " class="themeCol"></li>
                                <li onclick="changeCol(8)" style="background:#50942f " class="themeCol"></li>
                            </ul>
                        </div>
                    </ul>
                </li>
        </ul>
    </span>
</div>
<!------------------------------siiiiide      menu----------------------------------------------------->
<div id="sss" class="sidediv" onmouseleave="myFunction(this)" >
    <ul class="asidelist">
        <li style="border-top-right-radius: 37px;" title="Home" class="home" data-hint="Home">
            <a style="border-top-right-radius: 37px" id="chosen" href="main.php" class="aside__link">
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
            <a  href="<?php if($uname==""){echo "loginAction.php";}else echo "Logout.php" ?>" class="aside__link" style="border-bottom-left-radius: 37px; <?php if($uname==""){echo "background: tomato";}?>">
                <i style="<?php if($uname==""){echo "color: white";}?>" class="sideic  glyphicon glyphicon-log-out w3-xlarge <?php if($uname=="")echo "w3-spin"?>"></i>
                <p style="<?php if($uname==""){echo "color: white";}?>" class="asidetext w3-animate-bottom"><?php if($uname=="")echo "Sign in"; else echo "Sign Out" ?></p>
            </a>
        </li>



    </ul>

</div>

<!------------------------------------Slider----------------------------------------------->

<div id="mainDiv">

    <div  class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="img/p1.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="img/42a750ec11a71441440bbc6287cc5b93.png" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="img/dsaasd.JPG" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="img/slide3-1024x387.jpg" style="width:100%">
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
<!------------------------------------products menu----------------------------------------------->
<div>
 <div  class="w3-row-padding w3-padding-16 w3-center " id="MPDiv">
         <!-- <div class="w3-quarter prodDiv">

            <img  src="productImages/12-nikon-d3400.jpg" alt="Sandwich" style="width:100%">
            <h3>Canon</h3>
            <p>Type: Cameras</p>
            <p class="pPrice" >18$</p>
            <p class="pOwner">Owner: Mahmoud Draidi</p>
            <p class="pID">Product ID:5<i style="float: right;font-size: 20px;" class="fa fa-trash"></i></p>
            <p class="ownerUname"></p>

        </div>-->


        <?php
       // if($uname!="")

        $conn=new mysqli('localhost',"root",'','webproj');

        $sqlProd = "SELECT * FROM product ";
        $result = $conn->query($sqlProd);


        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $prodUname=$row['username']; $prodPrice=$row["price"];$pName=$row["productName"];$pType=$row["type"];$pImage=$row["image1"];$pID=$row["prodID"];

            if($uname==$prodUname){$icon="<i style=\"color:red;float: right;font-size: 20px;\" onclick='deleteProd(this)' class=\"fa fa-trash \"></i>";}
            else $icon="";

            $userFLname = "SELECT firstname,lastname FROM usertable WHERE username='$prodUname'";
            $res=$conn->query($userFLname);
            $row1=$res->fetch_assoc();
            $FF=$row1["firstname"];
            $LL=$row1["lastname"];

            // output data of each row

//echo $row["prodID"].$row["productName"].$row["type"].$row["price"].$row["image1"];

                echo "
                
                <div class=\"w3-quarter prodDiv\">
            <img src=\"productImages/".$pImage."\" alt=\"Sandwich\" style=\"width:100%\">
            <h3 class=\"pName\">".$pName."</h3>
            <p class=\"pType\">Type: ".$pType."</p>
            <p class=\"pPrice\">".$prodPrice."&#8362;</p>
            <p class=\"pOwner\">Owner: ".$FF." ".$LL."</p>
            <p class=\"pID\">Product ID:   ".$pID."   ".$icon."</p>
            <p class=\"ownerUname\">".$prodUname."</p>
        </div>
                ";
                }
}


        ?>








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
<div id="hell" style="display: none"></div>
    <div id="allproInfo" ></div>

<script  src="js/head.js"></script>
<script  src="js/main.js"></script>

<script>
    function theme() {
        var html = document.getElementsByTagName('html')[0];
        html.style.cssText = "--main-site-col: <?php if($color!="")echo $color;else echo "#00bcd4" ?>";
    }
</script>
<script>
    function changeCol(str) {
        var u=<?php echo "\"$uname\""; ?> ;

        var col="";
        if(str=='1'){col="000"}
        else if(str=='2'){col="00bcd4"}
        else if(str=='3'){col="FF6347"}
        else if(str=='4'){col="800080"}
        else if(str=='5'){col="008000"}
        else if(str=='6'){col="ff0000"}
        else if(str=='7'){col="00008b"}
        else if(str=='8'){col="50942f"}


        var html = document.getElementsByTagName('html')[0];
        html.style.cssText = "--main-site-col:#"+col;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            var x=(xmlhttp.responseText);
            var y=x.substring(0,7);

        };
        xmlhttp.open("GET", "ajaxHandler.php?q=" + col+"&u="+u, true);
        xmlhttp.send();

    }

    function filter() {
        var input, filter, ul, li, a,a1,a2, i;
        input = document.getElementById("searchinp");//search input
        filter = input.value.toUpperCase();
        ul = document.getElementById("MPDiv");
        li = ul.getElementsByClassName("prodDiv");

        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByClassName("pType")[0];
            a1=li[i].getElementsByClassName("pName")[0];
            a2=li[i].getElementsByClassName("pOwner")[0];

            if (a.innerHTML.toUpperCase().indexOf(filter) > -1||a1.innerHTML.toUpperCase().indexOf(filter) > -1||a2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";

            }
        }
    }
    function deleteProd(ee) {
        var uu=<?php echo "\"$uname\""; ?> ;
       if (confirm('Are you sure you want to delete?')){

           var x=ee.parentElement.parentElement.getElementsByClassName("pID")[0].innerHTML;
           x=x.substring(12,17);

alert(x);
           ee.parentElement.parentElement.style.display="none";


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            var x=(xmlhttp.responseText);


        };

        xmlhttp.open("GET", "ajaxHandler.php?del=" + x, true);
        xmlhttp.send();
       }
    }






</script>
</body>
</html>





