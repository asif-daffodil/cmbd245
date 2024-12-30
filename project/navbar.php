<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="./">Navbar</a>
        <button class="d-block d-lg-none ms-auto btn text-white" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fa-solid fa-cart-shopping"></i>
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "index.php" ? "active" : null ?>" aria-current="page"
                        href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $pageName == "sign-in.php" ? "active" : null ?>" href="./sign-in.php">Sign
                            In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pageName == "sign-up.php" ? "active" : null ?>" href="./sign-up.php">Sign
                            Up</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $_SESSION['user']['fname']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./update-profile.php">Update Profile</a></li>
                            <li><a class="dropdown-item" href="./profile-picture.php">Profile Picture</a></li>
                            <li><a class="dropdown-item" href="./change-password.php">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                                <li><a class="dropdown-item" href="./admin/dashboard.php">Dashboard</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <div class="" style="width: 280px">
                <form class="input-group" role="search">
                    <input class="form-control" type="search" placeholder="Search Product..." aria-label="Search">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
        <button class="d-none d-md-block ms-2 btn text-white" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fa-solid fa-cart-shopping"></i>
        </button>
    </div>
</nav>