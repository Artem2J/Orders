<?php
    require 'db.php';

    $data = $_POST;

    if ( isset($data['add_order']) ){
        $order = R::dispense('orders');
        $order_count = R::count('orders');
        $order->number = R::findLast('orders')['number'] + 1;
        $order->date = date("d.m.y");
        $order->author = $_SESSION['logged_user']->login;
        if ($data['client'] == '')$order->client = $_SESSION['logged_user']->login;
        else $order->client =$data['client'];
        $order->text_order = $data['text_order'];
        $order->status = 'new_order';
        $order->comment = '';

        R::store($order);
        header('Location: /');
    }

require 'html/header.php';
require 'html/menu.php';
?>

    <div class="pole">
        <div class="order">
            <form action="/addorder.php" method="POST" onsubmit="javascript: return process();">
                <p>Заказчик: <?php echo $_SESSION['logged_user']->login; ?></p>
                <p>Клиент:
                <input type="text" name="client" value=""></p>
                <p>Заказ:</p>
                <input type="hidden" id="hidden" name="text_order" valaue="">
                <div class="order_text" type="text" contenteditable="true" id="content" name="text" value="" onkeyup="Wall.postChanged()" onkeydown="onCtrlEnter(event, Wall.sendPost)" onfocus="Wall.showEditPost()" contenteditable="true" role="textbox" aria-multiline="true"></div>
                <button type="submit" name="add_order">Разместить заказ</button>
            </form>
        </div>
    </div>
    <?php require 'html/footer.php'?>
    <script>
        function process() {
            document.getElementById("hidden").value = document.getElementById("content").innerHTML;
            return true;
        }
    </script>
</body></html>