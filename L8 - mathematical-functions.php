<?php
// Mathematical Functions
/**
 * abs() - Returns the absolute value of a number
 * ceil() - Rounds a number up to the nearest integer
 * floor() - Rounds a number down to the nearest integer
 * round() - Rounds a floating-point number
 * rand() - Generates a random number
 * uniqid() - Generates a unique ID
 * pi() - Returns the value of PI
 * max() - Returns the highest value in an array
 * min() - Returns the lowest value in an array
 * sqrt() - Returns the square root of a number
 * pow() - Returns the value of a number raised to the power of another number
 */

echo abs(-6.7) . "<br>"; // 6.7
echo ceil(4.2) . "<br>"; // 5
echo floor(4.6) . "<br>"; // 4
echo round(4.6) . "<br>"; // 5
echo round(4.4) . "<br>"; // 4
echo rand() . "<br>"; // Random number
echo rand(1, 10) . "<br>"; // Random number between 1 and 10
echo uniqid() . "<br>"; // Unique ID
echo uniqid("Hello_") . "<br>"; // Unique ID with prefix
echo pi() . "<br>"; // 3.1415926535898
echo max(0, 150, 30, 20, -8, -200) . "<br>"; // 150
echo min(0, 150, 30, 20, -8, -200) . "<br>"; // -200
echo sqrt(64) . "<br>"; // 8
echo pow(2, 3) . "<br>"; // 8
