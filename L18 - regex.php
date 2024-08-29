<?php
// Regular Expression
$pattern = "/Hello/i";
$subject = "Mr Hello World";
echo preg_match($pattern, $subject) . "<br>";
$subject = "Mr hello World";
echo preg_match($pattern, $subject) . "<br>";

$pattern = "/[0-9]/";
$subject = "Mr Hello World 123";
echo preg_match($pattern, $subject) . "<br>";

//  ^ - start
$pattern = "/^Hello/i";
$subject = "Hello Mr Hello World";
echo preg_match($pattern, $subject) . "<br>";

// $ - end
$pattern = "/World$/i";
$subject = "Hello Mr Hello World";
echo preg_match($pattern, $subject) . "<br>";

// . - any character
$pattern = "/W.rld$/i";
$subject = "Hello Mr Hello Warld";
echo preg_match($pattern, $subject) . "<br>";

// * - 0 or more
$pattern = "/W*rld$/i";
$subject = "Hello Mr Hello Waarld";
echo preg_match($pattern, $subject) . "<br>";

// + - 1 or more
$pattern = "/W+rld$/i";
$subject = "Hello Mr Hello Wrld";
echo preg_match($pattern, $subject) . "<br>";

// ? - 0 or 1
$pattern = "/W?rld$/i";
$subject = "Hello Mr Hello World";
echo preg_match($pattern, $subject) . "<br>";

// {n} - exactly n
$pattern = "/W{3}rld/i";
$subject = "Hello WWWrld Wrld Wrld";
echo preg_match($pattern, $subject) . "<br>";

// strong password
$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$subject = "HelloWWW1@";
echo preg_match($pattern, $subject) . "<br>";

// email
$pattern = "/^([a-zA-Z0-9\._]+)@([a-zA-Z0-9]+)\.([a-zA-Z]{2,5})$/";
$subject = "kamal@jamal.com";
echo preg_match($pattern, $subject) . "<br>"; 


