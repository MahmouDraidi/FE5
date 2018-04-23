<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-20
 * Time: 2:19 PM
 */




$sql = "SELECT username FROM usertable";
$result = $conn->query($sql);
$x="max";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["username"]. "<br>";
        if($x==$row["username"]){echo "found in DB";}
    }
} else {
    echo "0 results";
}
/*$tes1="My mobile number";
$tes2="0595403748";
$sql2 = "delete from test where uname='My mobile number'";

$result = $conn->query($sql2);*/
$conn->close();
// Check connection



if(isset($_POST["submit"])){
    $uname=$_POST["name"];
    $pw=$_POST["pw"];
    if($uname=="max@d" && $pw==123 ){
            $msg="You have succefully logged in";
    }
    else{
        $msg="Ooooooooops";
    }

}





function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Advertiser</title>
    <link rel="stylesheet" type="text/css" href="css/LoginCSS.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">


</head>
<body style="background-image:url('img/whiteimg.jpg');background-position: left top; background-repeat: no-repeat; background-attachment: fixed;">


<form action="loginAction.php" method="post">
<div id="par" class="parent">

    <div class="con">                                            <!--22222-->
        <h1>User Login</h1>
        <div class="userimg">
            <img  style="border-radius: 50%; border: 1px solid white;" width="120px " height="120px"  src="img/userimg1.png">

        </div>
        <input type="text" placeholder="Enter your email or username" name="name">
        <i class="fa  fa-at fa-fw icon"></i>

        <input type="password" placeholder="Password" name="pw">
        <i class="fa fa-key fa-fw icon1"></i>

        <a id="link" href="#">Reset password</a>
        <button class="loginB" type="submit" name="submit" >Log in</button>

        <div class="reg">
        <p style="color: white;display: inline  ">Not a member of Lazmk family?</p>  <a  id="reglink" href="Registration.php">Register</a>
        </div>


    </div>                                                       <!--22222-->

</div>
</form><!--11111-->
<p><?php echo $msg  ?></p>
<!--/////////////////////////////////////reg reg reg reg reg reg reg reg reg reg reg///////////////////////////////////////////////////-->


<script src="js/jquery-3.2.1.min.js"></script>


<div id="editDiv" onclick="Prof_editProf()">
    <a href="noLogin.html">
        <i id="editIcon" class="fa fa-arrow-right "></i>
    </a>
</div>



<script src="js/jquery_admin.js"></script>
<script>
    function fun(num){


        if(num==0){
            document.getElementById("regSpan").style.display="none";
            document.getElementById("par").style.display="block"
        }
        else {
            document.getElementById("regSpan").style.display="block";
            document.getElementById("par").style.display="none";
        }
    }
    window.onclick = function(event) {
        if (event.target == regSpan) {
            regSpan.style.display = "none";
            par.style.display="block";

        }}
</script>
</body>
</html>

