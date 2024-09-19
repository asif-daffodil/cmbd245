<?php
if (isset($_POST['uploadFile'])) {
    $imgFile = $_FILES['imgFile'];
    $imgFileName = $imgFile['name'];
    $imgFileTmpName = $imgFile['tmp_name'];
    $fileNameArray = explode('.', $imgFileName);
    $fileActualExt = strtolower(end($fileNameArray));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    if (empty($imgFileName)) {
        $errImg = '<div style="color: red;">Please select a file to upload</div>';
    } elseif (!in_array($fileActualExt, $allowedExt)) {
        $errImg = '<div style="color: red;">Invalid file type. Please upload a jpg, jpeg, png or gif file</div>';
    } elseif ($imgFile['size'] > 1000000) {
        $errImg = '<div style="color: red;">File size is too large. Please upload a file less than 1MB</div>';
    } else {
        // create if upload directory is not exist
        if (!file_exists('uploads')) {
            mkdir('uploads');
        }
        $newFileName = uniqid('img-', true) . '.' . $fileActualExt;
        $imgUploadPath = 'uploads/' . $newFileName;
        $move = move_uploaded_file($imgFileTmpName, $imgUploadPath);
        if ($move) {
            $errImg = '<div style="color: green;">File uploaded successfully</div>';
        } else {
            $errImg = '<div style="color: red;">File upload failed</div>';
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="imgFile">
    <input type="submit" value="Upload" name="uploadFile">
</form>

<?= $errImg ?? null  ?>