<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-29
 * Time: 6:19 PM
 */


$db = new mysqli("localhost", 'root', '', 'webproj');


$userCount= mysqli_num_rows($db->query( "select username from usertable "));
$proCount= mysqli_num_rows($db->query( "select prodID from product "));
$messageCount =  mysqli_num_rows($db->query( "select messageID from feedback "));

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/newAdminCSS.css" >
    <script>
        function deleteMessage(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xmlhttp.open("POST", "adminDelete.php?id="+ str, true);
            xmlhttp.send();
            choosePage('mess');
        }

        function deleteUser(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xmlhttp.open("POST", "adminDelete.php?username=" + str, true);
            xmlhttp.send();
            choosePage('user');

        }

        function  deletePro(str){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xmlhttp.open("POST", "adminDelete.php?proID=" + str, true);
            xmlhttp.send();
            choosePage('pro');

        }

        function choosePage(str) {
            document.getElementById('messages-btn').classList.remove('active');
            document.getElementById('invites-btn').classList.remove('active');
            document.getElementById('events-btn').classList.remove('active');

            if(str == 'mess') {
           document.getElementById('messages-btn').classList.add('active');
}
            if(str == 'user'){
                document.getElementById('invites-btn').classList.add('active');
            }

            if(str == 'pro'){
                document.getElementById('events-btn').classList.add('active');
            }

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('N').innerHTML= this.responseText;
                }
            };
            xmlhttp.open("POST", "choosePage.php?k="+ str, true);
            xmlhttp.send();


        }



        function D() {

            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }

        }



    </script>


</head>





<body>
<form>
<aside id="sidebar" >
    <div class="logo">Lazmk?</div>
    <menu>
        <ul>
            <li><a  id="messages-btn" class="menu-link " onclick="choosePage('mess'); ">
                    <span class="icon fontawesome-envelope"></span>Messages
                    <div class="menu-box-number"><?php echo $messageCount?></div></a></li>

            <li><a   id="invites-btn" class="menu-link "  onclick="choosePage('user');">
                    <span class="icon entypo-paper-plane"></span>Users
                    <div class="menu-box-number"><?php echo $userCount?></div></a></li>

            <li><a id="events-btn" class="menu-link" onclick="choosePage('pro')">
                    <span class="icon entypo-calendar" ></span>Products
                    <div class="menu-box-number"><?php echo $proCount?></div></a></li>
        </ul>
    </menu>
    <div class="profile">
        <img src="userImages/DefaultUserImg.png" alt="Profile Picture" />
        <p>Admin</p>
    </div>
</aside>



</form>



<main>
    <div id="page-1" class="content box-active">
        <header>
            <h2>Messages</h2>

        </header>
    </div>




<div  id="N" style=" margin-left: 1%;   overflow-y: scroll;   max-height: 500px">

</div>




</div>
</main>


</body>
</html>