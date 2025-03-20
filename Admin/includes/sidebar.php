<div class="sidebar">
    <div class="sidebar-brand">
        <a href="index.php?page=dashboard" class="logo">
            <img src="assets/img/DZCM.png" alt="Dashboard Logo">
            <!-- <span class="brand-text">DZCM</span> -->
        </a>
        <!-- <div class="curved-cutout"></div> -->
    </div>

    <div class="user-profile">
        <div class="user-avatar">
            <img src="includes/uploads/users/<?php echo $_SESSION['profile_image'] ?? 'default-profile.png'; ?>" alt="User Avatar">
        </div>
        <div class="user-info">
            <h6 class="user-name"><?php echo $_SESSION['username']; ?></h6>
            <span class="user-role">Administrator</span>
        </div>
    </div>

    <nav class="sidebar-menu">
        <div class="menu-category">
            <span>Main</span>
        </div>
        <ul>
            <li class="nav-item">
                <a href="index.php?page=dashboard" class="nav-link active">
                    <i class="fas fa-grip-vertical"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <div class="menu-category">
                <span>Management</span>
            </div>

            <li class="nav-item">
                <a href="index.php?page=messages" class="nav-link">
                    <i class="fas fa-message"></i>
                    <span>Messages</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="index.php?page=services" class="nav-link">
                    <i class="fas fa-desktop"></i>
                    <span>Services</span>
                    <span class="menu-badge">
                        <?php
                        $sqlServices = "SELECT COUNT(*) AS total_services FROM services";
                        $resultServices = con()->query($sqlServices);
                        $totalServices = $resultServices->fetch_assoc()['total_services'];
                        echo $totalServices;
                        ?>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=hardware" class="nav-link">
                    <i class="fas fa-wrench"></i>
                    <span>Hardware</span>
                    <span class="menu-badge">
                        <?php
                        $sqlHardware = "SELECT COUNT(*) AS total_hardwares FROM hardware";
                        $resultHardware = con()->query($sqlHardware);
                        $totalHardware = $resultHardware->fetch_assoc()['total_hardwares'];
                        echo $totalHardware;
                        ?>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=clients" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Clients</span>
                    <span class="menu-badge">
                        <?php
                        $sqlClients = "SELECT COUNT(*) AS total_clients FROM clients";
                        $resultClients = con()->query($sqlClients);
                        $totalClients = $resultClients->fetch_assoc()['total_clients'];
                        echo $totalClients;
                        ?>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=email" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <span>Email</span>
                    <span class="menu-badge new">
                        <?php
                        $sqlQuotes = "SELECT COUNT(*) AS total_quotes FROM quote";
                        $resultQuotes = con()->query($sqlQuotes);
                        $totalQuotes = $resultQuotes->fetch_assoc()['total_quotes'];
                        echo $totalQuotes;
                        ?>
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a href="index.php?page=users" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                    <span class="menu-badge">
                        <?php
                        $sqlUsers = "SELECT COUNT(*) AS total_users FROM users";
                        $resultUsers = con()->query($sqlUsers);
                        $totalUsers = $resultUsers->fetch_assoc()['total_users'];
                        echo $totalUsers;
                        ?>
                    </span>
                </a>
            </li>

            <div class="menu-category">
                <span>Settings</span>
            </div>


            <li class="nav-item">
                <a href="index.php?page=company-profile" class="nav-link">
                    <i class="fas fa-building"></i>
                    <span>Company Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=user-settings" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>User Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <a id="logout-link" href="#" class="logout-link">
            <i class="fas fa-power-off"></i>
            <span>Logout</span>
        </a>
    </div>
</div>