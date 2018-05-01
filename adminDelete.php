<?php

$db = new mysqli("localhost", 'root', '', 'webproj');






if ($_REQUEST['id']){  /**/

    $id = $_REQUEST['id'];
    $res = $db->query("delete from feedback where messageID ='".$id."'");

}

if ($_REQUEST['username']){  $u = $_REQUEST['username'];
    $res = $db->query("delete from usertable where username ='".$u."'");}

if ($_REQUEST['proID']){  $t = $_REQUEST['proID'];
    $res = $db->query("delete from product where prodID ='".$t."'");}

















?>