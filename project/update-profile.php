<?php
require_once './header.php';
if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href = 'sign-in.php';</script>";
    exit();
}
$id = $_SESSION['user']['id'];
$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
$query = $conn->query($sql);
$userData = $query->fetch_assoc();
if (isset($_POST['update123'])) {
    $fname = cleanData($_POST['fname']);
    $lname = cleanData($_POST['lname']);
    $email = cleanData($_POST['email']);
    $gender = isset($_POST['gender']) ? cleanData($_POST['gender']) : null;
    $mobile = cleanData($_POST['mobile']);
    $address_line_1 = cleanData($_POST['address_line_1']);
    $address_line_2 = cleanData($_POST['address_line_2']);
    $city = cleanData($_POST['city']);
    $zip = cleanData($_POST['zip']);

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
        $crrEmail = $email;
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    } else {
        $crrGender = $gender;
    }

    if (empty($mobile)) {
        $errMobile = "Mobile is required";
    } elseif (!preg_match("/^[0-9]*$/", $mobile)) {
        $errMobile = "Only numbers allowed";
    } else {
        $crrMobile = $mobile;
    }

    if (empty($address_line_1)) {
        $errAddressLine1 = "Address Line 1 is required";
    } else {
        $crrAddressLine1 = $address_line_1;
    }

    if ($address_line_1 == $address_line_2) {
        $errAddressLine2 = "Address Line 2 should not be same as Address Line 1";
    } else {
        $crrAddressLine2 = $address_line_2;
    }

    if (empty($city)) {
        $errCity = "City is required";
    } else {
        $crrCity = $city;
    }

    if (empty($zip)) {
        $errZip = "Zip is required";
    } elseif (!preg_match("/^[0-9]*$/", $zip)) {
        $errZip = "Only numbers allowed";
    } else {
        $crrZip = $zip;
    }

    if (empty($errFname) && empty($errLname) && empty($errEmail) && empty($errGender) && empty($errMobile) && empty($errAddressLine1) && empty($errAddressLine2) && empty($errCity) && empty($errZip)) {
        $sql = "UPDATE `users` SET `fname` = '$fname', `lname` = '$lname', `email` = '$email', `gender` = '$gender', `mobile` = '$mobile', `address_line_1` = '$address_line_1', `address_line_2` = '$address_line_2', `city` = '$city', `zip` = '$zip' WHERE `id` = '$id'";
        $query = $conn->query($sql);
        if ($query) {
            echo "<script>toastr.success('Profile updated successfully')</script>";
        } else {
            echo "<script>toastr.error('Something went wrong')</scrip>";
        }
    }
}
?>
<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-4 m-auto border rounded shadow p-3">
            <h2>Update Profile</h2>
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" placeholder="First Name" name="fname" class="form-control <?= isset($errFname) ? "is-invalid" : null ?>" value="<?= $fname ?? $userData['fname'] ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errFname ?? null ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="text" placeholder="Last Name" name="lname" class="form-control <?= isset($errLname) ? "is-invalid" : null ?>" value="<?= $lname ?? $userData['lname'] ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errLname ?? null ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="email" placeholder="Email" name="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" value="<?= $email ?? $userData['email'] ?? null ?>">
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
                        <input type="radio" class="form-check-input" name="gender" value="Male" id="mradio" <?= isset($gender) && $gender == "Male" ? "checked" : ($userData['gender'] == "Male" ? "checked" : null) ?> />
                        <label for="mradio" class="form-check-lebel">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="Female" id="fradio" <?= isset($gender) && $gender == "Female" ? "checked" : ($userData['gender'] == "Female" ? "checked" : null) ?> />
                        <label for="fradio" class="form-check-lebel">Female</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="<?= isset($errGender) ? "is-invalid" : null ?>">
                    <div class="invalid-feedback">
                        <?= $errGender ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Mobile" name="mobile" class="form-control <?= isset($errMobile) ? "is-invalid" : null ?>" value="<?= $mobile ?? $userData['mobile'] ?? null ?>">
                    <div class="invalid-feedback">
                        <?= $errMobile ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Address Line 1" name="address_line_1" class="form-control <?= isset($errAddressLine1) ? "is-invalid" : null ?>" value="<?= $address_line_1 ?? $userData['address_line_1'] ?? null ?>">
                    <div class="invalid-feedback">
                        <?= $errAddressLine1 ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Address Line 2" name="address_line_2" class="form-control <?= isset($errAddressLine2) ? "is-invalid" : null ?>" value="<?= $address_line_2 ?? $userData['address_line_2'] ?? null ?>">
                    <div class="invalid-feedback">
                        <?= $errAddressLine2 ?? null ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" placeholder="City" name="city" class="form-control <?= isset($errCity) ? "is-invalid" : null ?>" value="<?= $city ?? $userData['city'] ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errCity ?? null ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="text" placeholder="Zip" name="zip" class="form-control <?= isset($errZip) ? "is-invalid" : null ?>" value="<?= $zip ?? $userData['zip'] ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errZip ?? null ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="update123">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once './footer.php';
?>