<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-27
 * Time: 9:27 AM
 */

$servername = "localhost";
$DBusername = "root";
$password = "";
$conn = new mysqli($servername, $DBusername,"","webproj");
$email="";
$user="";
$found="";
$warninMSG="";
$EmailSubject="Password reset code";
$headers="From: lazmk"."\r\n";
$dis="";
$newPW       ="";
$CheckResCode="";

if(isset($_POST["SendCode"])){

    $user=$_POST["resUname"];
    $sql = "SELECT * FROM usertable WHERE username='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $found = "y";
        $row = $result->fetch_assoc();
        $email=$row["email"];
    } else {

        $warninMSG= "NO users found with this username";
    }

    if($found=="y"){

        $resCode=rand(100000,999999);
        $sql = "UPDATE usertable SET activationCode='$resCode' WHERE username='$user'";
        $conn->query($sql);
        $msgBody="Your reset code is $resCode";
        if(mail($email,$EmailSubject,$msgBody,$headers)){
            $warninMSG="Your reset code has been sent to your email";
        }
        $dis="y";

    }



}

if(isset($_POST["Update"])){
    $user=$_POST["resUname"];
    $dis         ="y";
    $newPW       =$_POST["newPW"];
    $CheckResCode=$_POST["resCodeInp"];
    $sql         = "SELECT * FROM usertable WHERE username='$user'";
    $result=$conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

        $row = $result->fetch_assoc();

        if($row["activationCode"]!=$CheckResCode){
            $warninMSG="Wrong reset code";

        }


        elseif ( $newPW == "" || !preg_match( "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $_POST["newPW"] ) ){
            $warninMSG="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
        }
        else{
            $sql         = "UPDATE usertable SET pw='$newPW' WHERE username='$user'";
            $conn->query($sql);
            $warninMSG="Password updated successfully.";
            header( "refresh:5;url=loginAction.php" );
        }


    }



}





$conn->close();
?>
<!DOCTYPE HTML>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <style>
        *{
            //margin-t: 10px;
        }
        #backArrow{
            text-decoration: none;
        }
        #butn1{
            margin-top: 10px;
            display: <?php if($dis!="")echo 'none'; ?> ;
        }
        #butn2{
            margin-top: 10px;
            display: <?php if($dis=="")echo 'none'; ?>;
        }
        input{
        text-align: center;
        }
        .modal {
            display: block; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            -webkit-animation-name: fadeIn; /* Fade in the background */
            -webkit-animation-duration: 0.4s;
            animation-name: fadeIn;
            animation-duration: 0.4s
        }

        /* Modal Content */
        .modal-content {

            bottom: 0;
            background-color: #fefefe;
            width: 100%;
            -webkit-animation-name: slideIn;
            -webkit-animation-duration: 0.4s;
            animation-name: slideIn;
            animation-duration: 0.4s;
            top: 160px;
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #00BCD4;
            color: white;
            text-align: center;

        }

        .modal-body {
            padding: 2px 16px;
            text-align: center;
            font-size: 20px;
            color: red;
        }




    </style>
</head>


<body>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close"><a id="backArrow" href="loginAction.php"> &#8680;</a></span>
            <h2>Reset Password</h2>
        </div>
        <div class="modal-body">
            <form method="post">

                <label class="w3-text-blue"><b>Username</b></label>
                <input name="resUname" class="w3-input w3-border" type="text" value="<?php echo $user ?>" <?php if($dis!="")echo 'readonly' ; ?> >

        <div style="display:<?php if($dis=="")echo 'none' ; ?>">

                    <label class="w3-text-blue"><b>Reset code</b></label>
                <input name="resCodeInp" class="w3-input w3-border" type="text" value="<?php echo $CheckResCode?>">

                <label  class="w3-text-blue"><b>Enter your new password</b></label>
                <input name="newPW" class="w3-input w3-border" type="password" >
        </div>

                <button name="SendCode" id="butn1" class="w3-btn w3-white w3-border w3-border-red w3-round-large">Send reset code!</button>

                <button name="Update" id="butn2" class="w3-btn w3-white w3-border w3-border-red w3-round-large">Update password</button>

                <p><?php echo $warninMSG ?></p>


        </div>
        </form>
    </div>

</div>
</body>