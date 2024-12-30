<div class="container">
    <h2 class="text-center mt-5">Latest Products</h2>
    <div class="row mt-5">
        <?php
        $latest8Products = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT 8");
        if (isset($_POST['addToCart'])) {
            $product_id = $_POST['product_id'];
            if (isset($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$product_id]++;
                } else {
                    $_SESSION['cart'][$product_id] = 1;
                }
            } else {
                $_SESSION['cart'][$product_id] = 1;
            }

            echo "<script>toastr.success('Product added to cart', '', { positionClass: 'toast-bottom-right' })</script>";
        }
        ?>
        <?php while ($product = $latest8Products->fetch_assoc()): ?>
            <div class="col-md-3 mb-3">
                <div class="card py-3">
                    <img src="./assets/images/<?= $product['product_image'] ?>" class="card-img-top mb-3"
                        alt="<?= $product['product_name'] ?>" style="height: 160px; object-fit: contain">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $product['product_name'] ?></h5>
                        <p class="card-text">Price: <?= $product['product_price'] ?></p>
                        <form action="" class="d-inline" method="post">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button type="submit" class="btn btn-primary" name="addToCart">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                        <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>