<?php
// $x = 5;
// include_once("home.php");
try {
    if (isset($x)) {
        echo $x;
    } else {
        throw new Exception("Variable is not set.");
    }
} catch (Exception $err) {
    echo $err->getMessage();
} finally {
    echo "<br>Finally block executed.";
}
