<?php
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/addorder.css">
    <title>Orders</title>
</head>

<body>
<div class="header">
    <div class="logo"><img src="logo6.png"></div>
    <div class="user"><?php echo $_SESSION['logged_user']->login; ?><a href="logout.php">logout</a></div>

</div>
<div class="main_body">


    <div class="menu">
        <div class="munu_item"><a href="/">Orders</a></div>
        <div class="munu_item"><a href="#">Complit orders</a></div>
        <div class="munu_item"><a href="#">Phone numbers</a></div>
        <div class="munu_item"><a href="#">Comps IP</a></div>
    </div>
