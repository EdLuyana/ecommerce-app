<?php
require_once '../controller/Order.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (key_exists('customerName', $_POST)) {
        $order = new Order($_POST['customerName']);

        $message = 'commande créee';
    }

}

require_once '../view/index-view.php';