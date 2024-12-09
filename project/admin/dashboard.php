<?php
require_once './header.php';
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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                </div>
            </main>
            <?php require_once './footer.php' ?>
        </div>
    </div>
</body>

</html>