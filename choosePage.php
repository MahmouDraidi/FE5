<?php
$db = new mysqli("localhost", 'root', '', 'webproj');

$result = $db->query('select * from feedback');
$userResult = $db->query('select * from usertable');
$proResult =$db->query('select * from product');









if ($_REQUEST['k']) {
    $c = $_REQUEST['k'];


    if ($c == "mess") {
        while ($row = $result->fetch_assoc()) {
            echo " <button class=\"accordion\" onclick='D()'>" . $row['message'] . "</button>
                 <div class=\"panel\">
        <p style='font-size: 15px'> From : " . $row['sender'] . "
        </br>" . "Mobile: " . $row['mobile'] . "</br>
        " . "Email : " . $row['email'] . "</br> </br>
        <img class='deleteIcon' id=" . $row['messageID'] . " src='removeIcon.png' onclick=deleteMessage('" . $row['messageID'] . "') ></p>  </div> ";
        }
    }


    if ($c == "user") {
        if ($userResult) {
            while ($row = $userResult->fetch_assoc()) {
                echo " <button class=\"accordion\" onclick='D()'>" . $row['firstname'] . "\x20" . $row['lastname'] . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(" . $row['username'] . ")</button>
            <div class=\"panel\">
                <p style='font-size: 15px'> email : " . $row['email'] . "</br>Mobile: " . $row['mobileNom'] . "</br>Gender : " . $row['sex'] . "</br>BirthDate : " . $row['birthdate'] .
                    "</br> </br> <img class='deleteIcon' id=" . $row['username'] . " src='removeIcon.png' onclick=deleteUser('" . $row['username'] . "')></p>  </div>";

            }
        }
    }
    if ($c == "pro") {
        if ($proResult) {
            while ($row = $proResult->fetch_assoc()) {
                echo " <button class=\"accordion\" onclick='D()'>Type :" . $row['type'] . " &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By : (" . $row['username'] . ")</button>
            <div class=\"panel\">
                <p style='font-size: 15px'> ID : " . $row['prodID'] . "\x20\x20 </br> Price : " . $row['price'] . "</br>" . "Amount : " . $row['amount'] . "</br>" . "info : " . $row['info'] .

                    "</br></br><img class='deleteIcon' id='" . $row['prodID'] . "'src='removeIcon.png' onclick=deletePro('" . $row['prodID'] . "') </p>  </div> ";

            }
        }
    }


}

?>