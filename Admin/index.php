<?php
session_start();
require_once 'includes/conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <div class="dashboard-container">
        <?php include 'includes/sidebar.php'; ?>


        <main class="main-content">
            <?php

            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            $allowed_pages = ['dashboard', 'services', 'settings', 'company-profile', 'service-features', 'clients'];

            if (in_array($page, $allowed_pages) && file_exists("pages/$page.php")) {
                include("pages/$page.php");
            } else {
                echo "<h2>Page not found!</h2>";
            }

            ?>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <?php if (!empty($_SESSION['login_success'])): ?>
        <script>
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "Welcome!",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showClass: {
                    popup: "animate__animated animate__fadeInUp animate__faster "
                },
                hideClass: {
                    popup: "animate__animated animate__fadeOutDown animate__faster "
                }
            });
        </script>
    <?php endif; ?>
    <?php unset($_SESSION['login_success']); ?>


    </script>
</body>

</html>