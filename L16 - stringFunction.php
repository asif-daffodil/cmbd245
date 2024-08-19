<?php
$x = "Hello world!";
echo $x . "<br>";

// Concatenating strings
$y = "Hello";
$z = "World!";
echo $y . " " . $z . "<br>";

// Trimming strings
$trim = "    Hello World!    ";
echo trim($trim) . "<br>";


// Removing slashes
$slash = "hi / World!";
echo stripslashes($slash) . "<br>";

// String functions
echo strlen($x) . "<br>";
echo str_word_count($x) . "<br>";
echo strrev($x) . "<br>";
echo strpos($x, "world") . "<br>";
echo str_replace("world", "Dolly", $x) . "<br>";
echo strtolower($x) . "<br>";
echo strtoupper($x) . "<br>";
echo ucfirst($x) . "<br>";
echo ucwords($x) . "<br>";
echo substr($x, -6) . "<br>";
