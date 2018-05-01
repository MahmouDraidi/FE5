<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-25
 * Time: 12:13 AM
 */
session_start();
$_SESSION["FinishedReg"]='yeah';
$conn= new mysqli('localhost','root','','webproj');
//$sqlInsert="insert into product VALUES ('','maxxx','proooname','2500','2','see','yooo','im1','im2','im3')";
//$res = $conn->query($sqlInsert);
//$res=$conn->query($sql);

$sql="insert into feedback values('','baba','dfdf','fgd','fdgdff')";
$conn->query($sql);

/*
$to="+972595403748@txtlocal.co.uk";
$EmailSubject="Hey bro";
$msgBody="<p style='color: red'>This is the third access using email</p>";
$headers="From:bombardment123@gmail.com"."\r\n";

if(mail($to,$EmailSubject,$msgBody,$headers)){
    echo "message sent seccessfully";
}
*/
/*$conn = new mysqli($servername, $username,"","webproj");
$r=rand(100000,999999);

echo $r."\n";
$regUname="max";
$FBacc="https://www.facebook.com/mahmoud.draidii";
$sqlInsert="insert into usertable(FBaccount) VALUES ('$FBacc')WHERE username='$regUname'";
$result = $conn->query($sqlInsert);

$conn->close();*/
//$fbLink="https://www.facebook.com/";
//$FBacc ="dhttps://www.facebook.com/";
/*if (filter_var($FBacc, FILTER_VALIDATE_URL) && strpos($FBacc, $fbLink) == 0 ){
    echo "Valid url";
}
else echo 'error';*/


/*if($_SESSION["FinishedReg"]=='hello')
echo 'Go ahead';
session_destroy();*/



  // Create database connection

  // Initialize message variable
 /* $msg = "";
$target="productImages/";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
      header( "refresh:5;url=main.php" );
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text

  	// image file directory
echo $image;


  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target.$image)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }

?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">


  <form method="POST"  enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>

  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
      <p><?php echo $msg?></p>
  </form>
</div>
</body>
</html>*/?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>
</head>
<body>

<h2>Accordion</h2>

<button class="accordion">Section 1</button>
<div class="panel">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 2</button>
<div class="panel">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

</body>
</html>