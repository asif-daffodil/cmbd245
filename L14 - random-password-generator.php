<?php
// random password generator
echo uniqid() . "<br>";
echo uniqid('pass_', true) . "<br>";
echo md5(uniqid()) . "<br>";
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$elomeloChar = str_shuffle($chars);
$pass = substr($elomeloChar, 0, 8);
echo $pass . "<br>";
// strong password
$capitalLetter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$smallLetter = "abcdefghijklmnopqrstuvwxyz";
$number = "0123456789";
$specialChar = "!@#$%^&*()_+";
$strongPass = str_shuffle(substr($capitalLetter, 0, 2) . substr($smallLetter, 0, 2) . substr($number, 0, 2) . substr($specialChar, 0, 2));
echo $strongPass . "<br>";
?>
<a href="./L14 - random-password-generator.php">
    <button>Reload</button>
</a>