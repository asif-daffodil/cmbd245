<?php
date_default_timezone_set('Asia/Dhaka');
echo date('d/F/Y h:i:s A l');

echo "<br>";

// mktime(hour, minute, second, month, day, year);

$mydate = mktime(0, 0, 0, 1, 1, 2026);
echo date('d/F/Y l', $mydate);

echo "<br>";

// strtotime(time, now);

$mydate = strtotime('+3 years +2 months +5 days');
echo date('d/F/Y l', $mydate);

echo "<br>";

// date-time object

// my dob is 1987-10-9. find my age
$mydob = new DateTime('1987-9-10');
$now = new DateTime();
$diff = $now->diff($mydob);
echo $diff->format('I am %Y years, %m months, %d days old.');

// print php version
echo "<br>";
echo phpversion();
