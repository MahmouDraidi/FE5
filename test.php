<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-25
 * Time: 12:13 AM
 */

$_SESSION["FinishedReg"]='yeah';
$x="";

if (isset($_REQUEST["q"])){
// get the q parameter from URL

        $color ='#'. $_REQUEST["q"];
        $conn=new mysqli('localhost',"root",'','webproj');
        $sql="update usertable set userColor='$color' WHERE username='max'";
        $conn->query($sql);
        echo $color;



}

//echo $x;
// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;

/*$conn= new mysqli('localhost','root','','webproj');
$sqlInsert="insert into product VALUES ('','maxxx','proooname','2500','2','see','yooo','im1','im2','im3')";
$res = $conn->query($sqlInsert);
//$res=$conn->query($sql);
if($res->num_rows >0)echo 'Hi, youuckingly succeeded\n';;
*/
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
     header( "refresh:5;url=loggedUser.php" );
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
</html>*/
?>
<html>
<head>
    <script>
        function showHint(str) {
            var col="";
            if(str=='1'){col="000000"}
            else if(str=='2'){col="00bcd4"}
            else if(str=='3'){col="FF6347"}
            else if(str=='4'){col="800080"}


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {


                        var x=(xmlhttp.responseText);
                        var y=x.substring(0,7);
                       alert(y);
                };
                xmlhttp.open("GET", "test.php?q=" + col, true);
                xmlhttp.send();

        }
    </script>
</head>
<body >

<p onclick="showHint(4)"><b>Start typing a name in the input field below:</b></p>
<form>
    First name: <input type="text" >

</form>
<p>Suggestions: <span id="txtHint"></span></p>
<div id="nope" style="display: ;background: #00BCD4" >

</body>

</html>