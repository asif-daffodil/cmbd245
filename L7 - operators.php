<?php
// Arethmetic Operators

/**
 * + Addition
 * - Subtraction
 * * Multiplication
 * / Division
 * % Modulus
 * ** Exponentiation
 */

$x = 10;
$y = 5;

echo $x + $y . "<br>"; // 15
echo $x - $y . "<br>"; // 5
echo $x * $y . "<br>"; // 50
echo $x / $y . "<br>"; // 2s
echo $x % $y . "<br>"; // 0
echo $x ** $y . "<br>"; // 100000

// Assignment Operators
/**
 * = Assign
 * += Add and assign
 * -= Subtract and assign
 * *= Multiply and assign
 * /= Divide and assign
 * %= Modulus and assign
 */

$x = 10;
$y = 5;

$x += $y; // $x = $x + $y = 15
echo $x . "<br>";

$x -= $y; // $x = $x - $y = 10
echo $x . "<br>";

$x *= $y; // $x = $x * $y = 50
echo $x . "<br>";

$x /= $y; // $x = $x / $y = 10
echo $x . "<br>";

$x %= $y; // $x = $x % $y = 0
echo $x . "<br>";

// Comparison Operators
/**
 * == Equal
 * === Identical
 * != Not equal
 * <> Not equal
 * !== Not identical
 * > Greater than
 * < Less than
 * >= Greater than or equal to
 * <= Less than or equal to
 */

$x = 5;
$y = "5";

var_dump($x == $y); // true
echo "<br>";

var_dump($x === $y); // false
echo "<br>";

var_dump($x != $y); // false
echo "<br>";

var_dump($x !== $y); // true
echo "<br>";

var_dump($x > $y); // false
echo "<br>";

var_dump($x < $y); // false
echo "<br>";

var_dump($x >= $y); // true
echo "<br>";

var_dump($x <= $y); // true
echo "<br>";

// Increment/Decrement Operators
/**
 * ++$x Pre-increment
 * $x++ Post-increment
 * --$x Pre-decrement
 * $x-- Post-decrement
 */

$x = 5;

echo ++$x . "<br>"; // 6
echo $x++ . "<br>"; // 6
echo $x . "<br>"; // 7

echo --$x . "<br>"; // 6
echo $x-- . "<br>"; // 6
echo $x . "<br>"; // 5

// Logical Operators
/**
 * and, &&
 * or, ||
 * xor
 */

$x = 100;
$y = 50;

if ($x == 100 && $y == 50) {
    echo "Hello World! <br>";
}

if ($x == 100 || $y == 80) {
    echo "Hello World! <br>";
}

if ($x == 100 xor $y == 50) {
    echo "Hello World! <br>";
}

// String Operators
/**
 * . Concatenation
 * .= Concatenation assignment
 */

$x = "Hello";
$y = "World!";
echo $x . " " . $y . "<br>"; // Hello World!

$x .= " $y"; // $x = $x . $y
echo $x . "<br>"; // Hello World!

// Operator precedence
/**
 * 1. ()
 * 2. ++
 * 3. **
 * 4. * / %
 * 5. + -
 * 6. = += -= *= /= %=
 */

$x = (10 + 5) * 10;
