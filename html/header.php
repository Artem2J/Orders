<?php
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/master.css">
    <title>Orders</title>
</head>

<body>
<div class="header">
    <div class="logo">
        <a href="../index.php">
            <img src="../logo6.png" alt='Orders'>
        </a>
    </div>
    <?php if (isset($_SESSION['logged_user'])): ?>
    <div class="user"><?php echo $_SESSION['logged_user']->login; ?>&nbsp;<a href="../logout.php"> logout</a></div>
    <?php endif; ?>
</div>
<div class="main_body">



