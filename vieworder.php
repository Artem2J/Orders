<?php
require 'db.php';

$data = $_GET;
$order_id = $data['id'];
$order = R::load('orders', $order_id);
    $number = $order->number;
    $date = $order->date;
    $text_order = $order->text_order;
    $client = $order->client;
    $author = $order->author;
    $status = $order->status;
    $comment = $order->comment;



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/vieworder.css">
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
    <div class="pole">
        <div class="order">
            <form action="saveorder.php" method="POST" onsubmit="javascript: return process();">
                <p>Заказчик: <?php echo $author; ?></p>
                <p>Клиент:
                    <input type="text" name="client" value="<?php echo $client; ?>"></p>
                <p>Заказ:</p>
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <input type="hidden" id="hidden_order_text" name="text_order" value="">
                <div class="order_text" type="text" contenteditable="true" id="content_order_text" name="text" value="" onkeyup="Wall.postChanged()" onkeydown="onCtrlEnter(event, Wall.sendPost)" onfocus="Wall.showEditPost()" contenteditable="true" role="textbox" aria-multiline="true"><?php echo $text_order;?></div>
                <p>Комментарии:</p>
                <input type="hidden" id="hidden_comment" name="comment" value="">
                <div class="comment" type="text" contenteditable="true" id="content_comment" name="text" value="" onkeyup="Wall.postChanged()" onkeydown="onCtrlEnter(event, Wall.sendPost)" onfocus="Wall.showEditPost()" contenteditable="true" role="textbox" aria-multiline="true"><?php echo $comment;?></div>
                <br>
                <select name="status">
                    <option <?php if ($status == 'new_order') echo 'selected'; ?> value="new_order">new_order</option>
                    <option <?php if ($status == 'Заказно частично') echo 'selected'; ?> value="Заказно частично">Заказно частично</option>
                    <option <?php if ($status == 'Заказано') echo 'selected'; ?> value="Заказано">Заказано</option>
                    <option <?php if ($status == 'Привезено') echo 'selected'; ?> value="Привезено">Привезено</option>
                    <option <?php if ($status == 'Завершено') echo 'selected'; ?> value="Завершено">Завершено</option>
                </select>
                <br>

                <button type="submit" name="save">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="cpr">© Artem2J, 2020</div>

    </div>
    <script>
        function process() {
            document.getElementById("hidden_order_text").value = document.getElementById("content_order_text").innerHTML;
            document.getElementById("hidden_comment").value = document.getElementById("content_comment").innerHTML;
            return true;
        }
    </script>
</body></html>