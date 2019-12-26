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

    <link rel="stylesheet" href="css/master.css">
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
        <form action="/addorder.php" method="POST">
            <strong>Ваш логин</strong>
            <input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>

            <strong>Клиент</strong>
            <input type="text" name="client" value=""><br/>

            <strong>What you want order?</strong>
            <input type="text" name="text_order" value=""><br/>



            <button type="submit" name="add_order">Add</button>
        </form>
    </div>
    <div class="footer">
        <div class="cpr">© Artem2J, 2020</div>

    </div>

</body></html>