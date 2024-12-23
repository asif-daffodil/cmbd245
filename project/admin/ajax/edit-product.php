<?php  
    $conn = mysqli_connect('localhost', 'root', '', 'project245');
    // get product data by id
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        echo json_encode($product);
    }
?>