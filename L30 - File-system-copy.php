<?php
// basename()
$path = "C:/xampp/htdocs/php/L30 - File-system.php";
echo basename($path);

echo "<br>";

// dirname()
echo dirname($path);

// copy()
copy('./L30 - File-system.php', './L30 - File-system-copy.php');

// file()
/* echo "<pre>";
print_r(file('./L30 - File-system.php'));
echo "</pre>"; */

echo "<br>";
// file_exists()
echo file_exists('./L30 - File-system.php') ? "File exists" : "File does not exist";

// file_get_contents()
/* echo "<pre>";
echo file_get_contents('./L30 - File-system.php');
echo "</pre>"; */

// file_put_contents()
// file_put_contents('./L30 - File-system.php', 'Hello World');

echo "<br>";
// filesize()
echo filesize('./L30 - File-system.php');

echo "<br>";
// iletype()
echo filetype('./L30 - File-system.php');

echo "<br>";
// is_dir()
echo is_dir('./L30 - File-system.php') ? "It is a directory" : "It is not a directory";

echo "<br>";
// is_file()
echo is_file('./L30 - File-system.php') ? "It is a file" : "It is not a file";

echo "<br>";
//  link()
// echo link('./L30 - File-system.php', './L30 - File-system-link.php');

// unlink()
// unlink('./L30 - File-system-link.php');

// mkdir()
mkdir('./new-dir');

// rmdir()
rmdir('./new-dir');

// move_uploaded_file()
// move_uploaded_file($_FILES['file']['tmp_name'], './new-dir/' . $_FILES['file']['name']);

echo "<br>";
// pathinfo()
echo "<pre>";
print_r(pathinfo('./L30 - File-system.php'));
echo "</pre>";
