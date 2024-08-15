<?php
/* 
    i. array()
    ii. is_array()
    iii. in_array()
    iv. array_merge()
    v. array_keys()
    vi. array_key_exists()
    vii. array_shift()
    viii. array_unshift()
    ix. array_push()
    x. array_pop()
    xi. array_values()
    xii. array_map()
    xiii. array_unique()
    xiv. array_slice()
    xv. array_diff()
    xvi. array_search()
    xvii.array_reverse()
*/

// i. array()
$cities = array("Dhaka", "Chittagong", "Sylhet", "Khulna");

// ii. is_array()
if (is_array($cities)) {
    echo "This is an array.<br>";
} else {
    echo "This is not an array.<br>";
}

// iii. in_array()
if (in_array("Dhaka", $cities)) {
    echo "Dhaka is in the array.<br>";
} else {
    echo "Dhaka is not in the array.<br>";
}


// iv. array_merge()
$otherCities = array("Rajshahi", "Barishal", "Rangpur");
$allCities = array_merge($cities, $otherCities);
echo "<pre>";
print_r($allCities);
echo "</pre>";

// v. array_keys()
$person = ["name" => "John Doe", "age" => 30];
$keys = array_keys($person);
echo "<pre>";
print_r($keys);
echo "</pre>";

// vi. array_key_exists()
if (array_key_exists("name", $person)) {
    echo "Key exists.<br>";
} else {
    echo "Key does not exist.<br>";
}

// vii. array_shift()
$firstCity = array_shift($cities);
echo $firstCity . "<br>";
echo "<pre>";
print_r($cities);
echo "</pre>";

// viii. array_unshift()
array_unshift($cities, "Dhaka", "Chuyadanga");
echo "<pre>";
print_r($cities);
echo "</pre>";

// ix. array_push()
array_push($cities, "Rajshahi", "Barishal");
echo "<pre>";
print_r($cities);
echo "</pre>";

// x. array_pop()
$lastCity = array_pop($cities);
echo $lastCity . "<br>";
echo "<pre>";
print_r($cities);
echo "</pre>";

// xi. array_values()
$values = array_values($person);
echo "<pre>";
print_r($values);
echo "</pre>";

// xii. array_map()
function cityCapitalize($city)
{
    return strtoupper($city);
}

$capCities = array_map("cityCapitalize", $cities);
echo "<pre>";
print_r($capCities);
echo "</pre>";

// xiii. array_unique()
$dupCities = ["Dhaka", "Chittagong", "Sylhet", "Khulna", "Dhaka", "Chittagong"];
$uniqueCities = array_unique($dupCities);
echo "<pre>";
print_r($uniqueCities);
echo "</pre>";

// xiv. array_slice()
$someCities = array_slice($cities, 1, 3);
echo "<pre>";
print_r($someCities);
echo "</pre>";

// xv. array_diff()
$diffCities = array_diff($cities, $otherCities);
echo "<pre>";
print_r($diffCities);
echo "</pre>";

// xvi. array_search()
$cityIndex = array_search("Sylhet", $cities);
echo $cityIndex . "<br>";

// xvii. array_reverse()
$revCities = array_reverse($cities);
echo "<pre>";
print_r($revCities);
echo "</pre>";
