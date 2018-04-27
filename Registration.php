<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-23
 * Time: 6:46 PM
 */

$msgOfEmpty="";
$er=$er3=$er7=$er8=$er9=$er10=$er11=$er12="";
$msg="";
$msg1="";
$servername = "localhost";
$username = "root";
$password = "";

//email verification components
$to="";
$EmailSubject="Account activation code";
$msgBody="";
$headers="From: lazmk"."\r\n";
$emailSentMsg="";

$conn = new mysqli($servername, $username,"","webproj");
$sql = "SELECT username FROM usertable WHERE username='max'";
$result = $conn->query($sql);

/* ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["username"]. "<br>";
        if($x==$row["username"]){echo "found in DB";}
    }

} else {
    echo "0 results";
}*/

/*$tes1="My mobile number";
$tes2="0595403748";
$sql2 = "delete from test where uname='My mobile number'";

$result = $conn->query($sql2);*/



$myEmail="mahmoud.draidi1997@hotmail.com";
$mySubject="hello from the other side";
$myMSG="This is the first access using email";
/*if(mail($myEmail,$mySubject,$myMSG,'From:bombardment1234@gmail.com')){
    echo "message sent seccessfully";
}*/

$conn = new mysqli($servername, $username,"","webproj");

$regUname = $First =$last =$BD =$job =$sex =$buildNom =$street =$city =$regEmail = $mob ="";
$FBacc="https://www.facebook.com/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fbLink = "https://www.facebook.com/";

    if (empty($_POST["first"])) {
        echo "check if deleted";
    }

    $regUname = ($_POST["Reguname"]);
    $First = $_POST["first"];
    $last = $_POST["last"];
    $pw1 = $_POST["RegPW"];
    $pw2 = $_POST["confPW"];
    $BD = $_POST["birthdate"];
    $job = $_POST["Job"];
    $sex = $_POST["gender"];
    $buildNom = $_POST["BuildingNom"];
    $street = $_POST["Street"];
    $city = $_POST["city"];
    $regEmail = $_POST["RegEmail"];
    $mob = $_POST["mobile"];
    $FBacc = $_POST["facebook"];

    $conn = new mysqli($servername, $username,"","webproj");
    $sql = "SELECT username FROM usertable ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($regUname==$row["username"]){$er="The username  $regUname  is already taken ";
                //unset($_POST["register"]);
            break;
            }
        }
    } else {
        echo "0 results";
    }



    $sqlEmail = "SELECT email FROM usertable ";
    $result = $conn->query($sqlEmail);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($regEmail==$row["email"]){$er10="The Email:   $regEmail  is already in use  ";

                break;
            }
        }
    }

    $sqlMob = "SELECT mobileNom FROM usertable ";
    $result = $conn->query($sqlMob);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($mob==$row["mobileNom"]){$er12="The mobile nom:   $mob  is already used  ";

                break;
            }
        }
    }


    if( $First == $last ) {
        $er3='First name and last name cannot be same';
    }


    if( $pw1 != $pw2 ) {
        $er7='Password and confirm password does not match!';
    }
    if( $pw1 != "" && !preg_match( "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $_POST["RegPW"] ) ) {
        $er8='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"';
    }
    elseif( $regEmail != "" && !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["RegEmail"] ) ) {
        $er9='Enter valid email';
    }


    if (strpos($FBacc, $fbLink) != 0 ){
        $er11="Please paste valid account link";


    }

    if($regUname==null || $First==null ||  $last==null || $pw1==null || $pw2==null || $BD==null || $job==null || $buildNom==null || $street==null || $city==null || $regEmail==null || $mob==null || $FBacc==null ){
        $msgOfEmpty="Please fill all fields";
    }
 if(($er=="" && $er3=="" && $er7=="" && $er8=="" && $er9=="" && $er10=="" && $er11=="" &&$er12 =="" &&$msgOfEmpty=="")) {
$actiCode=rand(100000,999999);

     $sqlInsert = "insert into usertable VALUES('$regUname','$First','$last','$sex','$job','$pw1','$regEmail','$BD','$mob','No','$FBacc','$actiCode')";
     $result = $conn->query($sqlInsert);
     $sqlInsert="insert into usertable(FBaccount) VALUES ('$FBacc')WHERE username='$regUname'";
     $result = $conn->query($sqlInsert);

     $to=$regEmail;
     $msgBody="Your activation code is: '$actiCode' \n   
     Type this code in password field for the first time you attend to log in";
     if(mail($to,$EmailSubject,$msgBody,$headers)){
         $emailSentMsg= "Check your email you entered to activate your account.";
         echo "/n message sent";
     }
    // header('Location: loginAction.php');


 }
 //else unset($_POST["register"]);

    $conn->close();

  //  if (strpos($a, 'are') !== false)
      //  echo 'true';
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


<span id="regSpan"  >
<div class="mainregdiv">

    <div class=" ">
        <h2 style="text-align: center">Account Info</h2>
        <h3>Personal info</h3>
        <p>All fields are required</p>
        <p> <?php echo $msgOfEmpty ?></p>

    </div>


    <div class="">
        <form method="post">
            <div class="">
                <label class="reg_lab">Username</label>
                <input class="reg_inp w3-border w3-white " type="text" placeholder=" username" name="Reguname"  value="<?php echo $regUname;?>">

                <p class="errorMSG"><?php echo $er ?></p>

            </div>
            <div class=" ">

                <div class="">
                    <label class="reg_lab">First Name</label>
                    <input class="reg_inp w3-border w3-white" type="text" placeholder="First name" name="first"  value="<?php echo $First;?>">
                    <p class="errorMSG"></p>
                </div>

                <div class="">
                    <label class="reg_lab">Last Name</label>
                    <input class="reg_inp w3-border w3-white" type="text" placeholder="Last name" name="last"  value="<?php echo $last;?>">
                    <p class="errorMSG"></p>
                    <p class="errorMSG"><?php echo $er3 ?></p>
                </div>
                <div>
                    <label class="reg_lab">Password</label>
                    <input class="reg_inp w3-border w3-white" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="RegPW" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                    <p class="errorMSG"></p>

                    <p class="errorMSG"><?php echo $er8?></p>
                    <label class="reg_lab">Confirm </label>
                    <input class="reg_inp w3-border w3-white" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="confPW" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                    <p class="errorMSG"><?php echo $er7?></p>
                </div>
                <div class="">
                    <label class="reg_lab">Birth date</label>
                <input class="reg_inp w3-border w3-white" type="Date" name="birthdate"  value="<?php echo $BD;?>">
                </div>
                <div class="">
                    <label class="reg_lab">Job</label>
                    <input list="jobs" name="Job"  value="<?php echo $job;?>">
                    <datalist id="jobs">
                        <option value="Engineer">
                        <option value="Police man">
                        <option value="Teacher">
                        <option value="Student">
                         <option value="Doctor">
                         <option value="Farmer">
                         <option value="Worker">
                    </datalist>
                </div>



                <div class="sexdiv">

                    <label class="reg_lab">Sex</label>


                    <label class="reg_lab"><input class="w3-radio" type="radio" name="gender" value="male" checked >  Male</label>

                    <label class="reg_lab"><input class="w3-radio" type="radio" name="gender" value="female"> Female</label>
                </div>


                <div class ="addressdiv">
                    <span class="adresslabspan">

                        <h3>Adress</h3>
                    </span>
                    <span style="margin-top: 10px">

                        <label class="reg_lab">Building Nom.</label>
                        <input class="reg_inp1 w3-border w3-white" type="text"  value="<?php echo $buildNom;?>" placeholder=" Building Nom. (required)" name="BuildingNom">
                        <div>
                        <label class="reg_lab">Street </label>
                        <input class="reg_inp1 w3-border w3-white" type="text"  value="<?php echo $street;?>" placeholder=" Street (required)" name="Street">
                        </div>

                        <div>
                        <label class="reg_lab">City </label>

                           <input list="cities" name="city"  value="<?php echo $city;?>">
                         <datalist id="cities">
                        <option value="Tulkarm">
                        <option value="Jenin">
                        <option value="Nablus">
                        <option value="Jerusalem">
                         <option value="Hebron">
                         <option value="Ramallah">
                         <option value="Qalqilieh">
                    </datalist>
                        </div>
                    </span>
                </div>

                <div class="contactinf">
                    <h3>Contact info</h3>
                    <label class="reg_lab">Email</label>
                    <input class="reg_inp w3-border w3-white" type="email" placeholder="name123@example.com" value="<?php echo $regEmail;?>" name="RegEmail">
                    <p class="errorMSG"><?php echo $er9 ?></p>
                    <p class="errorMSG"><?php echo $er10 ?></p>
                    <label class="reg_lab">Phone Nom. </label>
                    <input class="reg_inp w3-border w3-white" type="number" name="mobile"  value="<?php echo $mob;?>">
                   <p class="errorMSG"> <?php echo $er12 ?></p>
                </div>


                <label class="reg_lab">Facebook </label>
                <input class="reg_inp w3-border w3-white" type="text" name="facebook" value="<?php echo $FBacc;?>">
                <p class="errorMSG"><?php echo $er11 ?></p>




            </div>
    </div>
    <div>

    </div>

            <br><br>


    <div>

        <button class="login" type="submit" name="register" >Register</button>

        <button class="login" type="reset">Reset</button>

    </div>
    </form>

</div>




</span>


<script src="js/jquery-3.2.1.min.js"></script>


<div id="editDiv" onclick="Prof_editProf()">
    <a href="noLogin.html">
        <i id="editIcon" class="fa fa-arrow-right "></i>
    </a>
</div>




</body>
</html>
