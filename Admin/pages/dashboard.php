<div class="dashboard-wrapper">
    <header class="dashboard-header">
        <div class="container">
            <h1 class="mb-0 text-white">Dashboard</h1>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row g-4">
            <div class="col-md-4 col-sm-6">
                <div class="card overview-card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon bg-primary-subtle rounded-circle p-3 me-3">
                            <i class="fas fa-cog fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Services</h6>
                            <h2 id="totalServices" class="mb-0">
                                <?php
                                $sqlServices = "SELECT COUNT(*) AS total_services FROM services";
                                $resultServices = con()->query($sqlServices);
                                $totalServices = $resultServices->fetch_assoc()['total_services'];
                                echo $totalServices;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card overview-card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon bg-success-subtle rounded-circle p-3 me-3">
                            <i class="fas fa-check fs-3 text-success"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Features</h6>
                            <h2 id="totalFeatures" class="mb-0">
                                <?php
                                $sqlServiceFeatures = "SELECT COUNT(*) AS total_service_features FROM service_features";
                                $resultServiceFeatures = con()->query($sqlServiceFeatures);
                                $totalServiceFeatures = $resultServiceFeatures->fetch_assoc()['total_service_features'];
                                echo $totalServiceFeatures;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card overview-card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon bg-warning-subtle rounded-circle p-3 me-3">
                            <i class="fas fa-user-tie fs-3 text-warning"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Clients</h6>
                            <h2 id="totalProjects" class="mb-0">
                                <?php
                                $sqlClients = "SELECT COUNT(*) AS total_clients FROM clients";
                                $resultClients = con()->query($sqlClients);
                                $totalClients = $resultClients->fetch_assoc()['total_clients'];
                                echo $totalClients;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Stats Row -->
        <div class="row g-4 mt-3">
            <div class="col-md-4 col-sm-6">
                <div class="card overview-card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon bg-info-subtle rounded-circle p-3 me-3">
                            <i class="fas fa-wrench fs-3 text-info"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Hardwares</h6>
                            <h2 id="totalHardwares" class="mb-0">
                                <?php
                                $sqlHardware = "SELECT COUNT(*) AS total_hardwares FROM hardware";
                                $resultHardware = con()->query($sqlHardware);
                                $totalHardware = $resultHardware->fetch_assoc()['total_hardwares'];
                                echo $totalHardware;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card overview-card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon bg-danger-subtle rounded-circle p-3 me-3">
                            <i class="fas fa-users fs-3 text-danger"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Users</h6>
                            <h2 id="totalUsers" class="mb-0">
                                <?php
                                $sqlUsers = "SELECT COUNT(*) AS total_users FROM users";
                                $resultUsers = con()->query($sqlUsers);
                                $totalUsers = $resultUsers->fetch_assoc()['total_users'];
                                echo $totalUsers;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card overview-card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon bg-secondary-subtle rounded-circle p-3 me-3">
                            <i class="fas fa-envelope fs-3 text-secondary"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Emails</h6>
                            <h2 id="totalQuotes" class="mb-0">
                                <?php
                                $sqlQuotes = "SELECT COUNT(*) AS total_quotes FROM quote";
                                $resultQuotes = con()->query($sqlQuotes);
                                $totalQuotes = $resultQuotes->fetch_assoc()['total_quotes'];
                                echo $totalQuotes;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Profile and Recent Emails -->
        <div class="row g-4 mt-3">
            <?php
            $sql = "SELECT email, phone, address, company_id FROM company_info WHERE company_id = 1";
            $result = con()->query($sql);
            $company = $result->fetch_assoc();

            $email = $company['email'] ?? 'N/A';
            $phone = $company['phone'] ?? 'N/A';
            $address = $company['address'] ?? 'N/A';
            ?>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0"><i class="bi bi-building me-2"></i>Company Profile</h5>
                    </div>
                    <div class="card-body">
                        <form id="companyForm">
                            <input type="hidden" name="company_id" value="<?= $company['company_id']; ?>">

                            <div class="mb-3 row align-items-center">
                                <label for="email" class="col-md-2 col-form-label text-md-start">Email:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control border-start-0" name="email" id="email" value="<?= htmlspecialchars($email); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editEmailBtn" onclick="toggleEdit('email', 'editEmailBtn')">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center">
                                <label for="phone" class="col-md-2 col-form-label text-md-start">Phone:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control border-start-0" name="phone" id="phone" value="<?= htmlspecialchars($phone); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editPhoneBtn" onclick="toggleEdit('phone', 'editPhoneBtn')">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center">
                                <label for="address" class="col-md-2 col-form-label text-md-start">Address:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" class="form-control border-start-0" name="address" id="address" value="<?= htmlspecialchars($address); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editAddressBtn" onclick="toggleEdit('address', 'editAddressBtn')">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM quote ORDER BY quote_id DESC LIMIT 4";
            $result = con()->query($sql);
            $emails = $result->fetch_all(MYSQLI_ASSOC);
            date_default_timezone_set('Asia/Manila');
            function timeAgo($timestamp)
            {
                $time = strtotime($timestamp);
                $diff = time() - $time;

                if ($diff < 60) {
                    return $diff . " seconds ago";
                } elseif ($diff < 3600) {
                    return floor($diff / 60) . " mins ago";
                } elseif ($diff < 86400) {
                    return floor($diff / 3600) . " hrs ago";
                } elseif ($diff < 604800) {
                    return floor($diff / 86400) . " days ago";
                } elseif ($diff < 2592000) {
                    return floor($diff / 604800) . " weeks ago";
                } else {
                    return floor($diff / 2592000) . " months ago";
                }
            }
            ?>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-envelope-open me-2"></i>Recent Emails</h5>
                        <span class="badge bg-primary rounded-pill"><?= count($emails) ?></span>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($emails as $email): ?>
                                <li class="list-group-item border-0 py-3 px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-light me-3">
                                            <span><?= strtoupper(substr($email['email'], 0, 1)) ?></span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 fw-medium"><?= htmlspecialchars($email['email']) ?></p>
                                            <small class="text-muted">Requested a quote - <?= timeAgo($email['date']) ?></small>
                                        </div>
                                        <!-- <div>
                                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle">
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div> -->
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer bg-white text-center border-0 py-3">
                        <a href="#" class="text-decoration-none">View all emails <i class="bi bi-chevron-right small"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>