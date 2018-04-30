<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-04-28
 * Time: 5:44 PM
 */
session_start();
unset($_SESSION["USERNAME"]);

session_destroy();
header( "refresh:2;url=loginAction.php" );

?>

<!DOCTYPE HTML>
<head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900);
        html {
            min-height: 100%;
        }

        body {
            height: 100%;
            margin: 0;
            background: #3498db;
            font-family: 'Roboto', sans-serif;
            font-weight: 100;
            overflow: hidden;
        }

        h1, h2, h3 {
            font-weight: 500;
            color: #217dbb;
        }

        .container {
            text-align: center;
        }
        .container:hover .box {
            opacity: 0.4;
        }

        .box {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            transition: all .35s;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .box:hover {
            background: #fff;
            cursor: pointer;
        }
        .box.open {
            width: 100vw;
            height: 100vh;
            z-index: 8;
        }
        .box.open:hover {
            width: 100vw;
            height: 100vh;
        }
        .box.open .content {
            opacity: 1;
            visibility: visible;
            margin: 30px;
            transition: opacity .2s .35s;
        }
        .box .content {
            opacity: 0;
            visibility: hidden;
            transition: none;
        }

        .box-1 {
            background: #3498db;
            box-shadow: -30px 34px 80px #217dbb;
            width: 20vh;
            height: 20vh;
            z-index: 4;
        }
        .box-1:hover {
            opacity: 1 !important;
            width: 23vh;
            height: 23vh;
        }

        .box-2 {
            background: #3498db;
            box-shadow: -30px 34px 80px #217dbb;
            width: 40vh;
            height: 40vh;
            z-index: 3;
        }
        .box-2:hover {
            opacity: 1 !important;
            width: 46vh;
            height: 46vh;
        }

        .box-3 {
            background: #3498db;
            box-shadow: -30px 34px 80px #217dbb;
            width: 60vh;
            height: 60vh;
            z-index: 2;
        }
        .box-3:hover {
            opacity: 1 !important;
            width: 69vh;
            height: 69vh;
        }

        .box-4 {
            background: #3498db;
            box-shadow: -30px 34px 80px #217dbb;
            width: 80vh;
            height: 80vh;
            z-index: 1;
        }
        .box-4:hover {
            opacity: 1 !important;
            width: 92vh;
            height: 92vh;
        }

    </style>
</head>
<body>
<div class='app'>
    <div class='container'>
        <div class='box box-1'>
            <h3>Go back to Main page?<br>Click!</h3>
            <a href="main.php"><div class='content'>

                 </div></a>
        </div>
        <div class='box box-2'>
            <h3>our website</h3>
            <div class='content'>
             </div>
        </div>
        <div class='box box-3'>
            <h3> you enjoyed</h3>
            <div class='content'>

             </div>
        </div>
        <div class='box box-4'>
            <h3>We hope that</h3>
            <div class='content'>
                <p>Hi</p>
             </div>
        </div>
    </div>
</div>






<script>
    $('.box').click(function(){
        $(this).toggleClass('open');
    });
</script>
</body>
