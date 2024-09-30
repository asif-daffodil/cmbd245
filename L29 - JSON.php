<!-- 
<script>
    const myInfoJson = {
        name: "John Doe",
        email: "john.doe@gmail",
        password: "JohnDoe123"
    };
</script> 
-->

<?php
$myInfo = [
    "name" => "John Doe",
    "email" => "john.doe@gmail",
    "password" => "JohnDoe123"
];

$myInfoJson = json_encode($myInfo);
echo $myInfoJson;

echo "<br>";

$myInfoArr = json_decode($myInfoJson, true);
echo "<pre>";
print_r($myInfoArr);
echo "</pre>";
?>