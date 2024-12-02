<?php
require_once './header.php';
if (isset($_SESSION['user'])) {
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
if (isset($_POST['signin'])) {
    $email = cleanData($_POST['email']);
    $password = cleanData($_POST['password']);

    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $crrEmail = $email;
    }

    if (empty($password)) {
        $errPassword = "Password is required";
    } else {
        $crrPassword = $password;
    }

    if (empty($errEmail) && empty($errPassword)) {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user'] = $row;
                // toastr success message then redirect to index.php after 2 seconds
                echo "<script>toastr.success('Sign-in successful')</script>";
                header("refresh:2;url=index.php");
            } else {
                $errPassword = "Invalid password";
            }
        } else {
            $errEmail = "Email not found";
        }
    }
}
?>
<div class="container py-5">
    <div class="row py-5 my-5">
        <div class="col-md-4 m-auto border rounded shadow p-3">
            <h2>Sign-in</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="email" placeholder="Email" name="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" value="<?= $email ?? null ?>">
                    <div class="invalid-feedback">
                        <?= $errEmail ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Password" name="password" class="form-control <?= isset($errPassword) ? "is-invalid" : null ?>">
                    <div class="invalid-feedback">
                        <?= $errPassword ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="signin">Sign-in</button>
                </div>
                <div class="mb-3">
                    don't have an account? <a href="sign-up.php">Sign-up</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>