<?php
// start point
// increment
// end point

$starPoint = 0;
$endPoint = 9;

while ($starPoint <= $endPoint) {
    echo $starPoint . "<br>";
    $starPoint = $starPoint + 1;
}

echo "<br>";

for ($i = 0; $i <= 9; $i++) {
    echo $i . "<br>";
}

echo "<br>";

$x = 20;
do {
    echo $x . "<br>";
    $x++;
} while ($x <= 9);
