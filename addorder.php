<?php
    require 'db.php';

    $data = $_POST;

    if ( isset($data['add_order']) ){
        $order = R::dispense('orders');
        $order->number = $order->count();
        $order->date = date("m.d.y");
        $order->author = $data['login'];
        $order->client = $data['client'];
        $order->text_order = $data['text_order'];
        $order->status = 'new_order';

        R::store($order);
        header('Location: /');
    }
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
        <div class="munu_item"><a href="#">Orders</a></div>
        <div class="munu_item"><a href="#">Complit orders</a></div>
        <div class="munu_item"><a href="#">Phone numbers</a></div>
        <div class="munu_item"><a href="#">Comps IP</a></div>
    </div>
    <div class="pole">
        <div class="order">
            <form action="/addorder.php" method="POST">
                <p>Заказчик: <?php echo $_SESSION['logged_user']->login; ?></p>
                <p>Клиент:
                <input type="text" name="client" value=""></p>
                <p>Заказ:</p>

                <div class="order_text" type="text" name="text_order" value="" onkeyup="Wall.postChanged()" onkeydown="onCtrlEnter(event, Wall.sendPost)" onfocus="Wall.showEditPost()" contenteditable="true" role="textbox" aria-multiline="true"></div>
                <button type="submit" name="add_order">Разместить заказ</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="cpr">© Artem2J, 2020</div>

    </div>

</body></html>