<?php
$conn = mysqli_connect("localhost", "root", "", "cmbd245");



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->query("INSERT INTO users (name, email, gender, password) VALUES ('$name', '$email', '$gender', '$password')");

    if ($insert) {
        echo "User added successfully";
        // header("Refresh:0");
    } else {
        echo "Failed to add user";
    }
}

if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $delete = $conn->query("DELETE FROM users WHERE id = $id");

    if ($delete) {
        header("Location: ./L35%20-%20crud.php");
    } else {
        echo "Failed to delete user";
    }
}


$users = $conn->query("SELECT * FROM users");
$userArr = $users->fetch_all(MYSQLI_ASSOC);

?>
<h2>Add User</h2>
<form action="" method="post">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required>Female
    <input type="radio" name="gender" value="Others" required>Others
    <br><br>
    <input type="password" name="password" placeholder="password" required>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<table border="1">
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>gender</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($userArr as $key => $user) : ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['gender'] ?></td>
            <td>
                <a href="./L35 - crud.php?eid=<?php echo $user['id'] ?>">Edit</a>
                <a href="./L35 - crud.php?did=<?php echo $user['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
if (isset($_POST['update'])) {
    $id = $_GET['eid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $update = $conn->query("UPDATE `users` SET `name` = '$name', `email` = '$email', `gender` = '$gender' WHERE id = $id");

    if ($update) {
        header("locAtion: ./L35%20-%20crud.php");
    } else {
        echo "Failed to update user";
    }
}

if (isset($_GET['eid'])) {
    $id = $_GET['eid'];
    $user = $conn->query("SELECT * FROM users WHERE id = $id")->fetch_assoc();
?>
    <h2>Edit User</h2>
    <form action="" method="post">
        <input type="text" name="name" value="<?php echo $user['name'] ?>" placeholder="Name" required><br><br>
        <input type="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Email" required><br><br>
        <input type="radio" name="gender" value="Male" <?= $user['gender'] == 'Male' ? 'checked' : null ?> required>Male
        <input type="radio" name="gender" value="Female" <?= $user['gender'] == 'Female' ? 'checked' : null ?> required>Female
        <input type="radio" name="gender" value="Others" <?= $user['gender'] == 'Others' ? 'checked' : null ?> required>Others
        <br><br>
        <input type="submit" value="Update" name="update">
    </form>
<?php } ?>