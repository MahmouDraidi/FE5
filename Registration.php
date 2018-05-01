<?php


session_start();
$msgOfEmpty="";
$er=$er3=$er7=$er8=$er9=$er10=$er11=$er12="";
$msg="";
$msg1="";
$servername = "localhost";
$username = "root";
$password = "";
$regSuccess="";
//email verification components
$to="";
$EmailSubject="Account activation code";
$msgBody="";
$headers="From: lazmk"."\r\n";
$emailSentMsg="";










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


    if (!(strpos($FBacc, $fbLink) ==0) && filter_var($FBacc, FILTER_VALIDATE_URL) ){
        $er11="Please paste url of your account!";


    }

    if($regUname==null || $First==null ||  $last==null || $pw1==null || $pw2==null || $BD==null || $job==null || $buildNom==null || $street==null || $city==null || $regEmail==null || $mob==null || $FBacc==null ){
        $msgOfEmpty="Please fill all fields";
    }


    /* finish registration */
 if(($er=="" && $er3=="" && $er7=="" && $er8=="" && $er9=="" && $er10=="" && $er11=="" &&$er12 =="" &&$msgOfEmpty=="")) {
$actiCode=rand(100000,999999);
     $_SESSION["FinishedReg"] = "Yeah";

     $pw1=md5($pw1);
     $sqlInsert = "insert into usertable VALUES('$regUname','$First','$last','$sex','$job','$pw1','$regEmail','$BD','$mob','No','$FBacc','$actiCode','#00bcd4')";
     $result = $conn->query($sqlInsert);
//     $sqlInsert="insert into usertable(FBaccount) VALUES ('$FBacc')WHERE username='$regUname'";

     $result = $conn->query($sqlInsert);
     $sqlInsert="insert into useradress VALUES ('$regUname','$buildNom','$street','$city')";
     $result = $conn->query($sqlInsert);

     $sqlInsert="insert into userimg VALUES ('$regUname','DefaultUserImg.png')";
     $result = $conn->query($sqlInsert);


     $to=$regEmail;
     $msgBody="Your activation code is: '$actiCode' \n   
     Type this code in password field for the first time you attend to log in";
     if(mail($to,$EmailSubject,$msgBody,$headers)){

         $emailSentMsg= "Check your email you entered to activate your account.";
         header( "refresh:5;url=loginAction.php" );
         $regSuccess="Your account has been created! <br> Check your email to get it activated.";

     }


 }


    $conn->close();


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
<body onload="openMSG()" style="background-image:url('img/whiteimg.jpg');background-position: left top; background-repeat: no-repeat; background-attachment: fixed;">


<span id="regSpan"  >
<div class="mainregdiv">

    <div class=" ">
        <h2 style="text-align: center">Account Info</h2>
        <h3>Personal info</h3><p style="display: <?php if($msgOfEmpty!="")echo 'none' ?>" id="req1">All fields are required</p>
        <p id="moe"> <?php echo $msgOfEmpty ?></p>

    </div>


    <div class="">
        <form method="post">
            <div style="margin-top: 10px" class="w3-row">
                <label class="reg_lab w3-col s4">Username</label>
                <input class="reg_inp w3-border w3-white w3-col s8 " type="text" placeholder=" username" name="Reguname"  value="<?php echo $regUname;?>">

                <p class="errorMSG"><?php echo $er ?></p>

            </div>
            <div style="margin-top: 10px" class=" w3-row">

                <div style="margin-top: 10px" class="w3-row">
                    <label class="reg_lab w3-col s4">First Name</label>
                    <input class="reg_inp w3-border w3-white w3-col s8" type="text" placeholder="First name" name="first"  value="<?php echo $First;?>">
                    <p class="errorMSG"></p>
                </div>

                <div style="margin-top: 10px" class="w3-row">
                    <label class="reg_lab w3-col s4 ">Last Name</label>
                    <input class="reg_inp w3-border w3-white w3-col s8" type="text" placeholder="Last name" name="last"  value="<?php echo $last;?>">
                    <p class="errorMSG"></p>
                    <p class="errorMSG"><?php echo $er3 ?></p>
                </div>
                <div style="margin-top: 10px" class="w3-row">
                    <label class="reg_lab w3-col s4">Password</label>
                    <input class="reg_inp w3-border w3-white w3-col s8" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="RegPW" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                    <p class="errorMSG"></p>
                </div>
                <div style="margin-top: 10px">
                    <p class="errorMSG"><?php echo $er8?></p>
                    <label class="reg_lab w3-col s4">Confirm </label>

                    <input class="reg_inp w3-border w3-white w3-col s8 " type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="confPW" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                    <p class="errorMSG"><?php echo $er7?></p>
                </div>
                <div style="margin-top: 10px" class="w3-row">
                    <label class="reg_lab w3-col s4">Birth date</label>
                <input class="reg_inp w3-border w3-white w3-col s8" type="Date" name="birthdate"  value="<?php echo $BD;?>">
                </div>
                <div style="margin-top: 10px" class="w3-row">
                    <label class="reg_lab w3-col s4">Job</label>
                    <input class="w3-col s8 reg_inp" list="jobs" name="Job"  value="<?php echo $job;?>">
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



                <div style="margin-top: 10px" class="sexdiv w3-row">

                    <label class="reg_lab w3-col s4">
                        <p>Sex</p>

                     </label>
                    <label class="w3-col s4 "><input class="w3-radio" type="radio" name="gender" value="male" checked >  Male</label>

                    <label class="w3-col s4"><input class="w3-radio" type="radio" name="gender" value="female"> Female</label>



                </div>


                <div style="margin: 5px 0px;" class ="addressdiv w3-row">
                    <span class="adresslabspan">

                        <h3>Adress</h3>
                    </span>
                    <span style="margin-top: 10px">

                         <div style="margin: 5px 0px;" class="w3-row">
                        <label class="w3-col m4 reg_lab ">Building Nom.
                         </label>
                            <input class="reg_inp w3-border w3-white w3-col m8" type="text"  value="<?php echo $buildNom;?>" placeholder=" Building Nom. (required)" name="BuildingNom">

                         </div>

                        <div style="margin: 5px 0px;" class="w3-row">
                        <label  class="reg_lab w3-col m4">Street
                         </label>
                            <input class="reg_inp w3-border w3-white w3-col m8" type="text"  value="<?php echo $street;?>" placeholder=" Street (required)" name="Street">

                        </div>
                        <div class="w3-row" style="margin: 10px 0px;">
                            <label class="reg_lab w3-col m4">City </label>

                            <input class="w3-col m8 reg_inp" list="cities" name="city"  value="<?php echo $city;?>">
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

                <div class="contactinf w3-row">
                    <h3>Contact info</h3>

                    <div class="w3-row" style="margin: 10px 0px;">
                    <label class="reg_lab w3-col m4">Email</label>
                    <input class="reg_inp1 w3-border w3-white w3-col m8" type="email" placeholder="name123@example.com" value="<?php echo $regEmail;?>" name="RegEmail">
                    <p class="errorMSG"><?php echo $er9 ?></p>
                    <p class="errorMSG"><?php echo $er10 ?></p>
                    </div>




                    <div class="w3-row" style="margin:10px 0px;">
                    <label class="reg_lab w3-col m4">Phone Nom.</label>
                    <input class="reg_inp w3-border w3-white w3-col m8" type="number" name="mobile"  value="<?php echo $mob;?>">
                   <p class="errorMSG"> <?php echo $er12 ?></p>
                    </div>

                    <div class="w3-row" style="margin: 10px 0px;">
                        <label class="reg_lab w3-col m4">Facebook</label>
                        <input class="reg_inp w3-border w3-white w3-col m8" type="text" name="facebook" value="<?php echo $FBacc;?>">
                        <p class="errorMSG"><?php echo $er11 ?></p>
                    </div>
                </div>






            </div>
    </div>
    <div>

    </div>

            <br><br>
    <div id="reCaptcha">
    <div  class="g-recaptcha" data-sitekey="6Lfo9lUUAAAAAHsKrH9VSOhUxsEKnwEA8JNzihof">
    </div>

    </div>
<br><br>

    <div>

        <button class="login w3-col s5 " type="submit" name="register" >Register</button>

        <button class="login w3-col s5" type="reset">Reset</button>

    </div><br><br><br>
    </form>

</div>




</span>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span id="modSpan" class="close">&times;</span>
            <h2>Welcome to 'Lazmk?' family</h2>
        </div>
        <div class="modal-body">
            <p><?php echo $regSuccess ?></p>
            <p></p>
        </div>

    </div>

</div>



<div id="editDiv" onclick="Prof_editProf()">
    <a href="loginAction.php">
        <i id="editIcon" class="fa fa-arrow-right "></i>
    </a>
</div>




<script src='https://www.google.com/recaptcha/api.js'></script>

<script>

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    function openMSG() {
        var x="<?php echo $regSuccess?>";
        if(x!="")
            modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    modSpan.onclick = function() {
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
