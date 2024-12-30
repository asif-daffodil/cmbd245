<?php  
    $conn = mysqli_connect('localhost', 'root', '', 'project245');
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        $order_id = $_POST['order_id'];
        $query = "UPDATE order_items SET status = '$status' WHERE order_id = $order_id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Status changed successfully";
        } else {
            echo "Failed to change status";
        }
    }
?>