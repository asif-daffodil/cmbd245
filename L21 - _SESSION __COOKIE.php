<?php
session_start();

$_SESSION['name'] = "Kamal";
$_SESSION['age'] = 25;

echo $_SESSION['name'] . "<br>";

session_unset();

// cookie

setcookie("name", "Kamal", time() + 10);
