<?php
include('../includes/functions.php');
adminLogin();
?>
 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a href="dashboard.php"><img class="logo-image ms-3" src="../uploads/logo_image.png" alt="Logo Image"></a>
        <div class="d-flex ms-auto">
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
    </div>
</nav>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Recipes Management</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="#">User Management</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Cooking Tips & Tricks</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Comments & Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Featured Recipes</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Reports & Analytics</a></li>
    </ul>
</div>