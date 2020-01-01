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
    $status_id = $order->status_id;
    $comment = $order->comment;

$statuses = R::getAll('SELECT * FROM statuses');

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
  <?php  require 'html/menu.php'; ?>

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
                    <?php foreach ($statuses as $somestatus): ?>
                        <option <?php if ($status_id == $somestatus['id']) echo 'selected'; ?> value=<?php echo $somestatus['id']; ?>><?php echo $somestatus['status']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>

                <button type="submit" name="save">Сохранить</button>
            </form>
        </div>
    </div>
    <?php require 'html/footer.php'?>
    <script>
        function process() {
            document.getElementById("hidden_order_text").value = document.getElementById("content_order_text").innerHTML;
            document.getElementById("hidden_comment").value = document.getElementById("content_comment").innerHTML;
            return true;
        }
    </script>
</body></html>