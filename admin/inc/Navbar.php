<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav mx-4">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto mx-4">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <?php echo ($_SESSION['username']) ?></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="Backend/logoutApi.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                Logout</a>
        </li>
    </ul>
</nav>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- /.navbar -->