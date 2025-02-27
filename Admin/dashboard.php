<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'includes/sidebar.php'; ?>


        <main class="main-content">
            <header class="dashboard-header">
                <div class="header-content">
                    <h1>Dashboard</h1>
                    <!--<div class="user-info">
                        <span class="username">Admin User</span>
                        <img src="assets/img/user-avatar.png" alt="User Avatar" class="user-avatar">
                    </div>-->
                </div>
            </header>

            <div class="dashboard-metrics row">
                <!-- Metrics content here -->
            </div>
        </main>
    </div>

</body>

</html>