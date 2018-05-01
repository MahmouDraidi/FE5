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

if(isset($_REQUEST["del"])){
    $conn=new mysqli('localhost',"root",'','webproj');
    $target_dir = "productImages/";
    $pID=$_REQUEST["del"];
    $pID=trim($pID);

    $sql="select * from product  WHERE prodID='$pID'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    $im1=$row["image1"];
    $im2=$row["image2"];
    $im3=$row["image3"];
    unlink($target_dir.$im1);
    unlink($target_dir.$im2);
    unlink($target_dir.$im3);

    $sql="DELETE from product  WHERE prodID='$pID'";
    $res=$conn->query($sql);

}
?>