<?php
require 'db.php';
if ( isset ($_SESSION['logged_user']) ) {
    if ($_SESSION['logged_user']->group == 'admin') {
        $orders = R::getAll('SELECT * FROM orders WHERE status_id = :status', [':status' => 5]);
    } else {
        $orders = R::getAll('SELECT * FROM orders WHERE author = :author AND status_id = :status', [':author' => $_SESSION['logged_user']->login, ':status' => 5]);
    }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/master.css">
    <title>Orders</title>
</head>

<body>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
<div class="header">
    <div class="logo"><img src="logo6.png" alt="Orders"></div>
    <div class="user"><?php echo $_SESSION['logged_user']->login; ?><a href="logout.php">logout</a></div>

</div>
<div class="main_body">

    <?php require 'html/menu.php'?>

    <div class="pole">
        <div class='preorder'><a href="addorder.php" class="add_order">+ add_order</a></div>

        <?php    foreach ($orders as $order): ?>

            <div class="order">
                <a href="vieworder.php?id=<?php echo $order['id']; ?>" class="order_link"></a>
                <div class="order_body">
                    <div class="order_menu">
                        <div class="number"><?php echo $order['number']; ?></div>
                        <div class="date"><?php echo $order['date']; ?></div>
                        <div class="owner"><?php echo $order['author']; ?></div>
                        <div class="client"><?php echo $order['client']; ?></div>
                    </div>
                    <div class="order_text">
                        <?php echo $order['text_order']; ?>
                    </div>
                </div>
                <div class="order_status">
                    <div class="st"><?php echo R::load('statuses', $order['status_id'])['status']; ?></div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

    <?php else : ?>
    <div class="header">
        <div class="logo"><img src="logo6.png" alt="Orders"></div>


    </div>
    <div class="main_body">
        Вы не авторизованы<br/>
        <a href="/login.php">Авторизация</a>
        <a href="/signup.php">Регистрация</a>
        <?php endif; ?>
    </div>
    <?php require 'html/footer.php'?>

</body></html>
