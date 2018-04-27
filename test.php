<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-25
 * Time: 12:13 AM
 */

$servername = "localhost";
$username = "root";
$password = "";

echo 'Hi\n';
$to="+972595403748@txtlocal.co.uk";
$EmailSubject="Hey bro";
$msgBody="<p style='color: red'>This is the third access using email</p>";
$headers="From:bombardment123@gmail.com"."\r\n";

if(mail($to,$EmailSubject,$msgBody,$headers)){
    echo "message sent seccessfully";
}

/*$conn = new mysqli($servername, $username,"","webproj");
$r=rand(100000,999999);

echo $r."\n";
$regUname="max";
$FBacc="https://www.facebook.com/mahmoud.draidii";
$sqlInsert="insert into usertable(FBaccount) VALUES ('$FBacc')WHERE username='$regUname'";
$result = $conn->query($sqlInsert);

$conn->close();*/
?>