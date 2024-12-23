<?php
require_once './header.php';
?>

<body class="sb-nav-fixed">
    <?php require_once './navbar.php' ?>
    <?php  
        if(isset($_POST['addProduct'])){
            $productName = $_POST['product-name'];
            $productPrice = $_POST['product-price'];
            $productDescription = $conn->real_escape_string($_POST['product-description']);
            $productImage = $_FILES['product-image']['name'];
            $productImageTmp = $_FILES['product-image']['tmp_name'];
            move_uploaded_file($productImageTmp, "../assets/images/$productImage");
            $query = "INSERT INTO products (product_name, product_price, product_description, product_image) VALUES ('$productName', '$productPrice', '$productDescription', '$productImage')";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>toastr.success('Product added successfully', '', { positionClass: 'toast-bottom-right' })</script>";
            }else{
                echo "<script>alert('Failed to add product')</script>";
            }
        }
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require_once "./sidebar.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add New Product</h1>
                    <!-- field: product name, price, description, image -->
                    <div class="row">
                        <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product-name" name="product-name" required>
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="product-price" name="product-price" required>
                            </div>
                            <div class="mb-3">
                                <label for="product-description" class="form-label">Product Description</label>
                                <textarea class="form-control" id="product-description" name="product-description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="product-image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="product-image" name="product-image" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                        </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php require_once './footer.php' ?>
        </div>
    </div>
</body>

</html>