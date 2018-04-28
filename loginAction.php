<?php


session_start();

$warninMSG="";
$servername = "localhost";
$DBusername = "root";
$password = "";
$conn = new mysqli($servername, $DBusername,"","webproj");
$fromReg=isset($_SESSION["FinishedReg"]);
$modHead="";

/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["username"]. "<br>";
        if($x==$row["username"]){echo "found in DB";}
    }
}
else {
    echo "0 results";
}*/
/*$tes1="My mobile number";
$tes2="0595403748";
$sql2 = "delete from test where uname='My mobile number'";

$result = $conn->query($sql2);*/

// Check connection
$actiCode="";
$userNotFoundMsg="";
$uname="";
$activateMSG="";
$found="";




if(isset($_POST["submit"])) {

    $storedPw = "";
    $uname = $_POST["name"];
    $pw = $_POST["pw"];
    $sql = "SELECT * FROM usertable WHERE username='$uname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $found = "y";
        while ($row = $result->fetch_assoc()) {

            $storedPw = $row["pw"];

            if ($row["Verified"] == "No") {
                $activateMSG = "Please enter activation code!";
                $actiCode = $row["activationCode"];


            }
        }
    } else {
        $modHead="Warning!";
        $warninMSG= "NO users found with this username";
    }


    if ($found == "y" && $actiCode != "") {
        if ($actiCode == $pw) {
            $sql = "UPDATE usertable SET Verified='Yes' WHERE username='$uname'";
            $result = $conn->query($sql);
            $modHead="Welcome $uname";
            $warninMSG= "Account is activated \n You can log in using your password next time.";
            $_SESSION["USERNAME"]=$uname;
            header( "refresh:5;url=main.php" );

        } else {
            $modHead="Account not activated yet";
            $warninMSG= "Type activation code you received in email in password field.";
        }

    } elseif ($found == "y" && $actiCode == "") {

        if ($storedPw == $pw) {
           // header('Location:loggedIn.html');
            $modHead="Welcome $uname";
            $warninMSG= "We hope you enjoy surfing Lazmk website";
            $_SESSION["USERNAME"]=$uname;
            header( "refresh:5;url=main.php" );


        }
        else {
            $modHead="Login error";
            $warninMSG="Incorrect password or username ";
        }

    }

}



function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
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
<body onload="openMSG()" style="background-image:url('img/whiteimg.jpg');background-position: left top; background-repeat: no-repeat; background-attachment: fixed;">


<form action="loginAction.php" method="post">
<div id="par" class="parent">

    <div class="con">                                            <!--22222-->
        <h1>User Login</h1>
        <div class="userimg">
            <img  style="border-radius: 50%; border: 1px solid white;" width="120px " height="120px"  src="img/userimg1.png">

        </div>
        <input type="text" placeholder="Enter your username" name="name" value="<?php echo $uname?>">
        <i class="fa  fa-at fa-fw icon"></i>

        <input type="password" placeholder="<?php if($fromReg==true){echo 'Activation Code';unset($_SESSION["FinishedReg"]);}else echo 'Password' ?>" name="pw">
        <i class="fa fa-key fa-fw icon1"></i>

        <a id="link" href="resertPW.php">Forgot password?</a>
        <button id="loginButton" class="loginB" type="submit" name="submit" >Log in</button>

        <div class="reg">
        <p style="color: white;display: inline  ">Not a member of Lazmk family?</p>  <a  id="reglink" href="Registration.php">Register</a>
        </div>




    </div>                                                       <!--22222-->

</div>




</form><!--11111-->

<!--/////////////////////////////////////reg reg reg reg reg reg reg reg reg reg reg///////////////////////////////////////////////////-->





<div id="editDiv" onclick="Prof_editProf()">
    <a href="main.php">
        <i id="editIcon" class="fa fa-arrow-right "></i>
    </a>
</div>
<!--------------------------------------------------------------------------------------------------------------------->
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php echo $modHead ?></h2>
        </div>
        <div class="modal-body">
            <p><?php echo $warninMSG ?></p>
            <p></p>
        </div>

    </div>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery_admin.js"></script>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    function openMSG() {
        var x="<?php echo $warninMSG ?>";
        if(x!="")
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }


    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>

