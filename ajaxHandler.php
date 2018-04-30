<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-30
 * Time: 4:41 PM
 */


if (isset($_REQUEST["q"])){
// get the q parameter from URL
$uname=$_REQUEST["u"];
    $color ='#'. $_REQUEST["q"];
    $conn=new mysqli('localhost',"root",'','webproj');
    $sql="update usertable set userColor='$color' WHERE username='$uname'";
    $conn->query($sql);
    echo $color;



}
?>