<?php
require_once '../controller/Order.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (key_exists('customerName', $_POST)) {

        try {
            $order = new Order($_POST['customerName']);
            $message = 'commande créee';
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
    }

}

require_once '../view/index-view.php';