<?php
require_once './header.php';
if (isset($_POST['uploadPp'])) {
    $file = $_FILES['pp'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = './assets/images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE users SET image = '$fileDestination' WHERE id = {$_SESSION['user']['id']}";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['user']['image'] = $fileDestination;
                    echo "<script>toastr.success('Profile picture upload successfully')</script>";
                }
            } else {
                $errPp = 'Your file is too big!';
            }
        } else {
            $errPp = 'There was an error uploading your file!';
        }
    } else {
        $errPp = 'You cannot upload files of this type!';
    }
}
?>
<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-3 m-auto border rounded shadow p-5">
            <form action="" method="post" enctype="multipart/form-data" class="text-center">
                <label for="pp" class="mb-3">
                    <img src="<?= $_SESSION['user']['image'] ?? "./assets/images/pp.jpg " ?>" alt="" class="img-fluid img-thumbnail">
                    <input type="file" id="pp" class="d-none" name="pp">
                    <span class="text-danger small"><?= $errPp ?? null ?></span>
                </label>
                <button class="btn btn-primary" type="submit" name="uploadPp">Upload</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('pp').addEventListener('change', function() {
        let file = this.files[0];
        let reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('label[for="pp"] img').src = e.target.result;
        }
        reader.readAsDataURL(file);
    });
</script>
<?php
require_once './footer.php';
?>