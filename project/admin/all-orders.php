<?php
require_once './header.php';

// field names
/**
 * orders
 * id
 * address
 * phone
 * payment_method
 * transaction_id
 * created_at
 */

/**
 * order_items
 * id
 * order_id
 * product_id
 * quantity
 * status
 * created_at
 */

// selelct query with inner join orders, order_items, and products
$query = "SELECT orders.*, order_items.*, products.product_name, products.product_price, products.product_image FROM orders INNER JOIN order_items ON orders.id = order_items.order_id INNER JOIN products ON order_items.product_id = products.id ORDER BY orders.id DESC";
$result = mysqli_query($conn, $query);
?>

<body class="sb-nav-fixed">
    <?php require_once './navbar.php' ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require_once "./sidebar.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">All Orders</h1>
                </div>
                <div class="container">
                    <table class="table" id="productTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Payment Method</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?= $row['order_id'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['product_price'] ?></td>
                                    <td><?= $row['quantity'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['payment_method'] ?></td>
                                    <td><?= $row['transaction_id'] ?></td>
                                    <td>
                                        <select name="" id="" class="productStatus" data-id="<?= $row['order_id'] ?>">
                                            <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>
                                                Pending</option>
                                            <option value="processing" <?= $row['status'] == 'processing' ? 'selected' : '' ?>>
                                                Processing</option>
                                            <option value="completed" <?= $row['status'] == 'completed' ? 'selected' : '' ?>>
                                                Completed</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
            <script>
                $(document).ready(function () {
                    let table = new DataTable('#productTable');

                    $('.productStatus').on("change", function () {
                        let status = $(this).val();
                        let order_id = $(this).data('id');
                        $.ajax({
                            url: './ajax/change-status.php',
                            method: 'POST',
                            data: {
                                status: status,
                                order_id: order_id
                            },
                            success: function (response) {
                                toastr.success('Status changed successfully');
                            }
                        });
                    });
                });
            </script>
            <?php require_once './footer.php' ?>
        </div>
    </div>
</body>

</html>