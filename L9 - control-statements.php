<?php
$age = 20;
$gender = "Male";

if ($age <= 12 && $age >= 0) {
    echo "You are a baby";
} elseif ($age <= 19 && $age > 12) {
    echo "You are a teenager";
} elseif ($age <= 29 && $age > 19) {
    echo "You are a young adult";
} elseif ($age <= 59 && $age > 29) {
    echo "You are an adult";
} elseif ($age <= 130 && $age > 59) {
    echo "You are an elder";
} else {
    echo "You are not in this world";
}

echo "<br>";

if ($gender == "Female") {
    if ($age >= 18) {
        echo "You are eligible for marriage";
    } else {
        echo "You are not eligible for marriage";
    }
} elseif ($gender == "Male") {
    if ($age >= 21) {
        echo "You are eligible for marriage";
    } else {
        echo "You are not eligible for marriage";
    }
}

echo "<br>";

// switch statement
$day = "Thursday";

switch ($day) {
    case "Monday":
        echo "Today is Monday";
        break;
    case "Tuesday":
        echo "Today is Tuesday";
        break;
    case "Wednesday":
        echo "Today is Wednesday";
        break;
    case "Thursday":
        echo "Today is Thursday";
        break;
    case "Friday":
        echo "Today is Friday";
        break;
    case "Saturday":
        echo "Today is Saturday";
        break;
    case "Sunday":
        echo "Today is Sunday";
        break;
}

echo "<br>";

// ternary operator
$city = "Dhaka";

/* if ($city == "Dhaka") {
    echo "You are in Dhaka";
} else {
    echo "You are not in Dhaka";
} */

echo $city == "Dhaka" ? "You are in Dhaka" : "You are not in Dhaka";
echo $cmbd ?? null;
