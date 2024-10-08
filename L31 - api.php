<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "GET request";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $account = $_POST['account'];
    $charge = $_POST['charge'];
    $token = $_POST['token'];

    if (empty($user)) {
        echo "User is required";
    } elseif (empty($account)) {
        echo "Account is required";
    } elseif (empty($charge)) {
        echo "Charge is required";
    } elseif (empty($token)) {
        echo "Token is required";
    } elseif ($token !== '123456') {
        echo "Invalid token";
    } else {
        if ($charge > 1000) {
            echo "./uploads/img-66ec5a289026d1.79365555.jpg";
        } else {
            echo "Payment successful";
        }
    }
}
