<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">Dashboard</h1>
    </div>
</header>

<div class="container mt-4">
    <div class="row g-4">
        <div class="col-md-4 col-sm-6">
            <div class="card overview-card">
                <h5>Total Services</h5>
                <h2 id="totalServices">
                    <?php
                    $sqlServices = "SELECT COUNT(*) AS total_services FROM services";
                    $resultServices = con()->query($sqlServices);
                    $totalServices = $resultServices->fetch_assoc()['total_services'];
                    echo $totalServices;
                    ?>
                </h2>

            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card overview-card">
                <h5>Total Features</h5>
                <h2 id="totalFeatures">
                    <?php
                    $sqlServiceFeatures = "SELECT COUNT(*) AS total_service_features FROM service_features";
                    $resultServiceFeatures = con()->query($sqlServiceFeatures);
                    $totalServiceFeatures = $resultServiceFeatures->fetch_assoc()['total_service_features'];
                    echo $totalServiceFeatures;
                    ?>
                </h2>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card overview-card">
                <h5>Total Clients</h5>
                <h2 id="totalProjects">
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


<div class="row mt-4">
    <?php
    $sql = "SELECT email, phone, address, company_id FROM company_info WHERE company_id = 1";
    $result = con()->query($sql);
    $company = $result->fetch_assoc();

    $email = $company['email'] ?? 'N/A';
    $phone = $company['phone'] ?? 'N/A';
    $address = $company['address'] ?? 'N/A';
    ?>

    <div class="col-md-8">
        <div class="card p-3 shadow">
            <h5><strong>Company Profile</strong></h5>
            <form id="companyForm">
                <input type="hidden" name="company_id" value="<?= $company['company_id']; ?>">
                <div class="mb-3 d-flex align-items-center">
                    <label for="email" class="form-label me-2">Email:</label>
                    <input type="email" class="form-control me-2" name="email" id="email" value="<?= htmlspecialchars($email); ?>" disabled>
                    <button type="button" class="btn btn-primary btn-sm" id="editEmailBtn" onclick="toggleEdit('email', 'editEmailBtn')">Edit</button>
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="phone" class="form-label me-2">Phone:</label>
                    <input type="text" class="form-control me-2" name="phone" id="phone" value="<?= htmlspecialchars($phone); ?>" disabled>
                    <button type="button" class="btn btn-primary btn-sm" id="editPhoneBtn" onclick="toggleEdit('phone', 'editPhoneBtn')">Edit</button>
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="address" class="form-label me-2">Address:</label>
                    <input type="text" class="form-control me-2" name="address" id="address" value="<?= htmlspecialchars($address); ?>" disabled>
                    <button type="button" class="btn btn-primary btn-sm" id="editAddressBtn" onclick="toggleEdit('address', 'editAddressBtn')">Edit</button>
                </div>
            </form>
        </div>
    </div>




    <div class="col-md-4">
        <div class="card p-3 shadow quick-actions">
            <h5>Quick Actions</h5>
            <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                <i class="fas fa-plus"></i> Add New Service
            </button>
            <button class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#serviceFeaturesModal">
                <i class="fas fa-list"></i> Company Profile
            </button>
            <!-- <button class="btn btn-success w-100">
                <i class="fas fa-briefcase"></i> View Portfolio
            </button> -->
        </div>
    </div>
</div>
</div>