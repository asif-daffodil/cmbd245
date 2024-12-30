<?php
require_once './header.php';
if (isset($_POST['checkout'])){
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $payment_method = $_POST['payment_method'];
    $transaction_id = $_POST['transaction_id'];
    $total = array_sum(array_map(function ($product_id, $quantity) use ($conn) {
        $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
        return $product['product_price'] * $quantity;
    }, array_keys($_SESSION['cart']), $_SESSION['cart']));

    $query = "INSERT INTO orders (address, phone, payment_method, transaction_id, total) VALUES ('$address', '$phone', '$payment_method', '$transaction_id', $total)";
    $result = $conn->query($query);
    if ($result) {
        $order_id = $conn->insert_id;
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)";
            $conn->query($query);
        }   
        unset($_SESSION['cart']);
        echo "<script>
    toastr.success('Order placed successfully', '', { positionClass: 'toast-bottom-right' });
    setTimeout(() => location.href = './', 2000);
        </script>";

    } else {
        echo "<script>alert('Failed to place order')</script>";
    }
}
?>
<!-- checkout page with total price, payment method, and customer address -->
<?php if(isset($_SESSION['cart'])){ ?>
<div class="container">
    <h2 class="text-center mt-5">Checkout</h2>
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5>Customer Address</h5>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <!-- payment method -->
                        <h5>Payment Method</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash" checked>
                            <label class="form-check-label" for="cash">
                                Cash on Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="bkash" value="bkash">
                            <label class="form-check-label" for="bkash">
                                Bkash
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="transaction_id" class="form-label">Transaction ID (if Bkash)</label>
                            <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction ID">
                        </div>

                        <!-- cart summary -->
                        <h5>Cart</h5>
                        <?php if (isset($_SESSION['cart'])) { ?>
                            <?php foreach ($_SESSION['cart'] as $product_id => $quantity) : ?>
                                <?php
                                $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
                                ?>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <img src="./assets/images/<?= $product['product_image'] ?>" class="img-fluid" alt="<?= $product['product_name'] ?>">
                                    </div>
                                    <div class="col-8">
                                        <h6><?= $product['product_name'] ?></h6>
                                        <p>Price: <?= $product['product_price'] ?></p>
                                        <p>Quantity: <?= $quantity ?></p>
                                        <p>Total: <?= $product['product_price'] * $quantity ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>

                        <div class="row">
                            <div class="col-12">
                                <h5>Total: $<?= array_sum(array_map(function ($product_id, $quantity) use ($conn) {
                                    $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
                                    return $product['product_price'] * $quantity;
                                }, array_keys($_SESSION['cart']), $_SESSION['cart'])) ?></h5>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3" name="checkout">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="container">
        <h2 class="text-center mt-5">No items in cart</h2>
    </div>
<?php } ?>
<?php
require_once './footer.php';
?>
