<?php
// string
var_dump("This is a string");

echo "<br>";

// integer
var_dump(123);

echo "<br>";

// float
var_dump(12.3);

echo "<br>";

// boolean
var_dump(true);

echo "<br>";

// array
var_dump(["apple", "banana", "cherry"]);

echo "<br>";

// object
class myInfo
{
    public $name = "Asif";
}

$myInfo = new myInfo;
var_dump($myInfo);

echo "<br>";

// NULL
var_dump(null);

echo "<br>";

// resource
$myfile = fopen("test.txt", "r");
var_dump($myfile);
