<?php
require 'db.php';

$data = $_POST;

if ( isset($data['save']) ){

    $order2 = R::load('orders',$data['order_id']);
    $order2->text_order = $data['text_order'];
    $order2->client = $data['client'];
    $order2->comment = $data['comment'];
    $order2->status_id = $data['status'];
    R::store($order2);
    header('Location: /');

}

