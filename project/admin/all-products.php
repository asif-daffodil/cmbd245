<?php
require_once './header.php';
?>

<body class="sb-nav-fixed">
    <?php  
        // run seperate query each for with image or without image
        if(isset($_POST['editProduct'])){
            $productName = $_POST['product-name'];
            $productPrice = $_POST['product-price'];
            $productDescription = $conn->real_escape_string($_POST['product-description']);
            $productImage = $_FILES['product-image']['name'];
            $productImageTmp = $_FILES['product-image']['tmp_name'];
            $id = $_POST['id'];
            if($productImage){
                move_uploaded_file($productImageTmp, "../assets/images/$productImage");
                $query = "UPDATE products SET product_name = '$productName', product_price = '$productPrice', product_description = '$productDescription', product_image = '$productImage' WHERE id = $id";
            }else{
                $query = "UPDATE products SET product_name = '$productName', product_price = '$productPrice', product_description = '$productDescription' WHERE id = $id";
            }
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>toastr.success('Product updated successfully', '', { positionClass: 'toast-bottom-right' })</script>";
            }else{
                echo "<script>alert('Failed to update product')</script>";
            }
        }

        if(isset($_POST['deleteProduct'])){
            $id = $_POST['id'];
            $query = "DELETE FROM products WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>toastr.success('Product deleted successfully', '', { positionClass: 'toast-bottom-right' })</script>";
            }else{
                echo "<script>alert('Failed to delete product')</script>";
            }
        }
    ?>
    <?php require_once './navbar.php' ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require_once "./sidebar.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">All Products</h1>
                    <table class="table" id="productTable">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM products";
                            $result = mysqli_query($conn, $query);
                            $sn = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $sn ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['product_price'] ?></td>
                                    <td><img src="../assets/images/<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>" style="height: 60px"></td>
                                    <td>
                                        <!-- edit and deletale button mfir triger modal -->
                                        <button type="button" class="btn btn-primary editProductBtn" data-id=<?= $row['id'] ?>>
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger deleteProductBtn" data-id=<?= $row['id'] ?>>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                $sn++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
            <?php require_once './footer.php' ?>
        </div>
    </div>
    <script>
        let table = new DataTable('#productTable');
    </script>


    <!-- editModal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="close closeEditModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- field: product name, price, description, image -->
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="editId">
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
                                    <input type="file" class="form-control" id="product-image" name="product-image">
                                </div>
                                <button type="submit" class="btn btn-primary" name="editProduct">Edit Product</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" id="productImage" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                    <button type="button" class="close closeDeleteModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                    <form action="" method="post">
                        <input type="hidden" name="id" id="deleteId">
                        <button type="submit" class="btn btn-danger" name="deleteProduct">Delete Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editProductBtn').click(function() {
                let id = $(this).data('id');
                $.ajax({
                    url: './ajax/edit-product.php',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        let data = JSON.parse(response);
                        $('#product-name').val(data.product_name);
                        $('#product-price').val(data.product_price);
                        $('#product-description').val(data.product_description);
                        $('#productImage').attr('src', '../assets/images/' + data.product_image);
                        $('#editId').val(data.id);
                    }
                });
                $('#editModal').modal('show');
            });
            $('.closeEditModal').click(function() {
                $('#editModal').modal('hide');
            });

            $('.deleteProductBtn').click(function() {
                let id = $(this).data('id');
                $('#deleteId').val(id);
                $('#deleteModal').modal('show');
            });

            $('.closeDeleteModal').click(function() {
                $('#deleteModal').modal('hide');
            });
        });
    </script>

</body>

</html>