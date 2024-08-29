<?php
// trimming
$name = "    Kamal Hossain    ";
echo strlen($name) . "<br>";

echo strlen(trim($name)) . "<br>";

// stripslashes
$str = "Hello, I\'m Kamal Hossain";
echo stripslashes($str) . "<br>";
