<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- get products from session -->
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
            <?php foreach ($_SESSION['cart'] as $product_id => $quantity){ ?>
                <?php
                $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
                ?>
                <div class="row mb-3">
                    <div class="col-4">
                        <img src="./assets/images/<?= $product['product_image'] ?>" class="img-fluid"
                            alt="<?= $product['product_name'] ?>">
                    </div>
                    <div class="col-8">
                        <h6><?= $product['product_name'] ?></h6>
                        <p>Price: <?= $product['product_price'] ?></p>
                        <p>Quantity: <?= $quantity ?></p>
                        <p>Total: <?= $product['product_price'] * $quantity ?></p>
                    </div>
                </div>
            <?php } ?>

        <div class="row">
            <div class="col-12">
                <h5>Total: $<?= array_sum(array_map(function ($product_id, $quantity) use ($conn) {
                    $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
                    return $product['product_price'] * $quantity;
                }, array_keys($_SESSION['cart']), $_SESSION['cart'])) ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="./checkout.php" class="btn btn-primary">Checkout</a>
            </div>
        </div>

        <?php } ?>
    </div>
</div>
</body>

</html>