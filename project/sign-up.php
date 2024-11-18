<?php
require_once './header.php';
if (isset($_POST['signup123'])) {
    $fname = cleanData($_POST['fname']);
    $lname = cleanData($_POST['lname']);
    $email = cleanData($_POST['email']);
    $gender = isset($_POST['gender']) ? cleanData($_POST['gender']) : null;
    $password = cleanData($_POST['password']);
    $cpassword = cleanData($_POST['cpassword']);

    if (empty($fname)) {
        $errFname = "First Name is required";
    } elseif (!preg_match("/^[a-zA-Z-.' ]*$/", $fname)) {
        $errFname = "Only letters and white space allowed";
    } else {
        $crrFname = $fname;
    }

    if (empty($lname)) {
        $errLname = "Last Name is required";
    } elseif (!preg_match("/^[a-zA-Z-.' ]*$/", $lname)) {
        $errLname = "Only letters and white space allowed";
    } else {
        $crrLname = $lname;
    }

    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        // check if email already exists
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errEmail = "Email already exists";
        } else {
            $crrEmail = $email;
        }
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    } else {
        $crrGender = $gender;
    }

    if (empty($password)) {
        $errPassword = "Password is required";
    } elseif (strlen($password) < 8) {
        $errPassword = "Password must be at least 8 characters";
    } else {
        $crrPassword = $password;
    }

    if (empty($cpassword)) {
        $errCpassword = "Confirm Password is required";
    } elseif ($cpassword != $password) {
        $errCpassword = "Password does not match";
    } else {
        $crrCpassword = $cpassword;
    }

    if (isset($crrFname) && isset($crrLname) && isset($crrEmail) && isset($crrGender) && isset($crrPassword) && isset($crrCpassword)) {
        $password = password_hash($crrPassword, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `gender`) VALUES ('$crrFname', '$crrLname', '$crrEmail', '$password', '$crrGender')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('New account created successfully');setTimeout(() => location.href='./sign-in.php', 2000)</script>";
        } else {
            echo "<script>toastr.error('Some went wrong')</script>";
        }
    }
}
?>
<div class="container">
    <div class="row min-vh-100 d-flex">
        <div class="col-md-4 border rounded shadow p-4 m-auto">
            <h3 class="mb-3">Sign Up</h3>
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" placeholder="First Name" name="fname" class="form-control <?= isset($errFname) ? "is-invalid" : null ?>" value="<?= $fname ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errFname ?? null ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="text" placeholder="Last Name" name="lname" class="form-control <?= isset($errLname) ? "is-invalid" : null ?>" value="<?= $lname ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errLname ?? null ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="email" placeholder="Email" name="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" value="<?= $email ?? null ?>">
                    <div class="invalid-feedback">
                        <?= $errEmail ?? null ?>
                    </div>
                </div>
                <!-- gender -->
                <div class="py-1 <?= isset($errGender) ? "border border-danger rounded" : null ?>">
                    <div class="form-check form-check-inline">
                        <label for="" class="form-check-lebel">Gender</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="Male" id="mradio" <?= isset($gender) && $gender == "Male" ? "checked" : null ?> />
                        <label for="mradio" class="form-check-lebel">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="Female" id="fradio" <?= isset($gender) && $gender == "Female" ? "checked" : null ?> />
                        <label for="fradio" class="form-check-lebel">Female</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="<?= isset($errGender) ? "is-invalid" : null ?>">
                    <div class="invalid-feedback">
                        <?= $errGender ?? null ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="password" placeholder="Password" name="password" class="form-control <?= isset($errPassword) ? "is-invalid" : null ?>">
                        <div class="invalid-feedback">
                            <?= $errPassword ?? null ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="password" placeholder="Confirm Password" name="cpassword" class="form-control <?= isset($errCpassword) ? "is-invalid" : null ?>">
                        <div class="invalid-feedback">
                            <?= $errCpassword ?? null ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="signup123">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>