<?php
$r = false;
 $m = false;
 $n = null;
 $feedback = false;
$db = new mysqli("localhost", 'root', '123456', 'webproj');

if(isset($_POST['removeUser'])) {
    $user= $_POST["userToRemove"];
    $n = $db->query("select * from usertable where username ='".$user."'");
  if (  mysqli_fetch_row($n)){

         $q = "delete from usertable where username='".$user."'";$db->query($q); $r = true;}
     else {
        $r = false;
    }
   // $r = $db->query($q);


}

if(isset($_POST['removeProduct'])) {
    $product= $_POST['prodToRemove'];


    $k= $db->query("select * from product where prodID='".$product."'");
    if (mysqli_fetch_row($k) ){
    $q = "delete from product where prodID='".$product."'";   $db->query($q); $m = true; }
    else{
        $m = false;
   }


}
$userCount= mysqli_num_rows($db->query( "select username from usertable "));
$proCount= mysqli_num_rows($db->query( "select prodID from product "));



$sql= "select * from feedback" ;
    $result = $db->query($sql);

    if ($result->num_rows > 0) $feedback = true;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/loggedIn.css" >
    <link rel="stylesheet" type="text/css" href="css/Head&side.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/adminCSS.css" >

</head>
<body>
<div id="hhh" class="headerdiv w3-row" >



    <span class="w3-col s4">


    <span class="menuicon"  >
        <div id="mc" class="menuCont" onclick="myFunction(this),hide(sss)">
  <div id="bar1"></div>
  <div id="bar2"></div>
  <div id="bar3"></div>
       </div>
        <span class="menutitle"><p style=" font-family: 'Pacifico', cursive;">lazmk?</p></span>

    </span>


</span>
    <span class="searcharea w3-col s4" id="ic1">

             <form>
                <input  id="searchinp" class="w3-input w3-border w3-animate-input w3-white" type="text" placeholder="Search" style="background-image:url(img/searchicon.png); ">
             </form>

    </span>


    <span class="accountinf w3-col s4 w3-center">
       <!--

        <div id="sp" class="w3-row w3-right"><p id="username">Mahmoud</p></div>-->

        <ul id="nameAndImg" onmouseover="document.getElementById('ddm').style.display='block'" onmouseleave="document.getElementById('ddm').style.display=''" class=" navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"> <span class="caret"></span><img src="img\IMG_4763.jpg" class="dropdown-image" /></a>
                    <p style="float: right" class="w3-col " id="username">Mahmoud</p>
                    <ul id="ddm" role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="#">Edit Profile </a></li>
                        <li role="presentation"><a href="#">Add new product </a></li>
                        <li role="presentation" class="activee"><a href="#">Logout </a></li>
                    </ul>


</li>
        </ul>
    </span>
</div>



<!------------------------------------ users information -------------------------------------------------->

<form class=" adminForm" method="post" action="">

    <div class="container " style="text-align: center">


        <div class="row rowAdminDiv">
            <div class="col-md-3"></div>
            <div class="col-md-6 colAdminDiv"><h1 class="adminTitle">Admin Page</h1></div>
            <div class="col-md-3"></div>
        </div>


        <div class="row rowAdminDiv ">
            <div class="col-md-5" ></div>
            <div class="col-md-2" style="background-color: #00bcd4" >
                <h4>Rigestered Users : </h4>
                <?php echo " <h4 style='color: red'>".$userCount."</h4>" ?>

            </div>

        </div>
        <!------------------------------------------------------------->


        <!------------------------------------------------------------->

        <div class=" row rowAdminDiv">

            <div class="col-md-5" ></div>
            <div class="col-md-2" style="background-color: #00bcd4" >
                <h4>All Products : </h4>
                <?php echo " <h4 style='color: red'>".$proCount."</h4>" ?>
            </div>

        </div>
        <!------------------------------------------------------------->
        <div class=" row spaceAdminDiv"></div>


        <!------------------------------------------------------------->
        <div class="row rowAdminDiv">

            <div class="col-md-2"></div>

            <div class="col-md-8 container " style="background-color: #00bcd4">


                <div class="row" >

                <div class="col-md-4 colAdminDiv" style=" background-color: #00bcd4">
                    <h3>Delete Account :</h3>
                </div>

                    <div class="col-md-4 colAdminDiv">
                        <input class=" w3-border searchInput" name="userToRemove" placeholder="Account username">
                    </div>

                    <div class="col-md-2 colAdminDiv">
                        <input type="submit" value="Delete"  name="removeUser"  class="deleteSubmet" style="background-color: white">
                    </div>


                    <div class="col-md-2 colAdminDiv">

                    <?php
                    if (isset($_POST['removeUser'])) {

                    ?>

                        <!--    <input class=" w3-border resultInput" placeholder="Result"  > -->
                        <?php   if ($r  ){echo "<h4 class='resultOut'>done</h4>";
                        }
                        else {echo "<h4 class='resultOut'> not found </h4>";
                        }

                        unset($_POST['removeUser']);

                        }

                        else{echo "<h4 class='resultOut'>  </h4>";}?>
                    </div>

                </div>
            </div>

        </div>

        <!------------------------------------------------------------->


        <!------------------------------------------------------------->


        <div class="row rowAdminDiv">
            <div class="col-md-2"></div>

            <div class="col-md-8 container " style="background-color: #00bcd4">

                <div class="row" >

                    <div class="col-md-4 colAdminDiv " style=" background-color: #00bcd4">
                        <h3>Delete Product :</h3>
                    </div>

                    <div class="col-md-4 colAdminDiv">
                        <input class=" w3-border searchInput" placeholder="Product Id" name="prodToRemove">
                    </div>
                    <div class="col-md-2 colAdminDiv">
                        <input type="submit" value="Delete"  name="removeProduct"  class="deleteSubmet" style="background-color: white">
                    </div>

                    <div class="col-md-2 colAdminDiv">

                    <?php
                    if (isset($_POST['removeProduct'])) {
                    ?>
                    <!--    <input class=" w3-border resultInput" placeholder="Result"  > -->
                     <?php   if ($m){echo "<h4 class='resultOut'>done</h4>";
                     }
                        else {echo "<h4 class='resultOut'>not found</h4>";}

                        unset($_POST['removeProduct']);

                           }

                           else{echo "<h4>  </h4>";}?>
                    </div>
                    </div>

            </div>

                </div>




        <div class="spaceAdminDiv row"></div>
        <!--------------------------------------------------->




        <div class="rowAdminDiv row " >
            <div class=" col-md-12 colAdminDiv"><h1>feedback</h1>
        </div>
        </div>

        <div class="row">
            <div class="col-md-2" ></div>
            <div class="col-md-8 container" style='background-color: #8f9296'>
                <div class=' col-md-1 colFixed' >ID</div>
                <div class=' col-md-1 colFixed' >sender</div>
                <div class=' col-md-2 colFixed' >email</div>
                <div class=' col-md-2 colFixed' >mobile</div>
                <div class=' col-md-2 colFixed'>message</div>
            </div>
        </div>



        <div class="row" >
            <div class="col-md-12 scrollDiv"  >

        <!--------------------------------------------------->
       <?php if ($feedback ) {

               while($row = $result->fetch_assoc()) {
                   echo "
               <div class='row rowAdminDiv'>
               
               <div class='col-md-2'></div>
               
               <div class='col-md-8 container  ' style='background-color: #00bcd4'>
               <div class='row ' >
               <div class='colAdminDiv col-md-1 feebackDiv' >" . $row['messageID'] . "</div>
               <div class='colAdminDiv col-md-1 feebackDiv' >" . $row['sender'] . "</div>
               <div class='colAdminDiv col-md-2 feebackDiv' >" . $row['email'] . "</div>
               <div class='colAdminDiv col-md-2 feebackDiv' >" . $row['mobile'] . "</div>
               <div class='colAdminDiv col-md-2 feebackDiv'>" . $row['message'] . "</div> 
               </div>
        
                </div>
               
                   
                   </div>         ";

}
       }
                ?>

            </div>
        </div>










    </div>


</form>


</body>
</html>
