<?php
// GLOBALS
$myVar = "Hello World";

function myFunc()
{
    return $GLOBALS['myVar'];
}

echo myFunc() . "<br>";

// $_SERVER
echo $_SERVER['PHP_SELF'] . "<br>";
echo $_SERVER['SERVER_NAME'] . "<br>";
echo $_SERVER['HTTP_HOST'] . "<br>";
echo $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo $_SERVER['SCRIPT_NAME'] . "<br>";
echo $_SERVER['SERVER_ADDR'] . "<br>";

// #_REQUEST
echo $_REQUEST['name'] ?? "Request not found" . "<br>";

// $_POST
echo $_POST['uname'] ?? "Post not found" . "<br>";

// $_GET
echo $_GET['sname'] ?? "Get not found" . "<br>";

?>

<form action="" method="post">
    <input type="text" name="uname">
    <button type="submit">Submit</button>
</form>

<?php
// $_ENV
$_ENV['user'] = "Kamal";
echo $_ENV['user'] . "<br>";
?>