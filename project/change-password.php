<?php
require_once './header.php';
if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href = 'sign-in.php';</script>";
    exit();
}
if (isset($_POST['changePassword'])) {
    $currentPassword = cleanData($_POST['currentPassword']);
    $newPassword = cleanData($_POST['newPassword']);
    $confirmPassword = cleanData($_POST['confirmPassword']);
    $id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $query = $conn->query($sql);
    $userData = $query->fetch_assoc();
    if (empty($currentPassword)) {
        $errCurrentPassword = "Current Password is required";
    } elseif (!password_verify($currentPassword, $userData['password'])) {
        $errCurrentPassword = "Current Password is incorrect";
    } else {
        $crrCurrentPassword = $currentPassword;
    }
    if (empty($newPassword)) {
        $errNewPassword = "New Password is required";
    } elseif (strlen($newPassword) < 8) {
        $errNewPassword = "Password must be at least 8 characters";
    } else {
        $crrNewPassword = $newPa    ssword;
    }
    if (empty($confirmPassword)) {
        $errConfirmPassword = "Confirm Password is required";
    } elseif ($newPassword !== $confirmPassword) {
        $errConfirmPassword = "Password does not match";
    } else {
        $crrConfirmPassword = $confirmPassword;
    }
    if (isset($crrCurrentPassword) && isset($crrNewPassword) && isset($crrConfirmPassword)) {
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$newPassword' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('Password changed successfully')</script>";
        }
    }
}
?>
<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-6 m-auto border rounded shadow p-5">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                    <span class="text-danger small"><?= $errCurrentPassword ?? null ?></span>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                    <span class="text-danger small"><?= $errNewPassword ?? null ?></span>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    <span class="text-danger small"><?= $errConfirmPassword ?? null ?></span>
                </div>
                <button type="submit" name="changePassword" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>