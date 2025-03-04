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
                    $sqlServices = "SELECT COUNT(*) AS total_services FROM service_features";
                    $resultServices = con()->query($sqlServices);
                    $totalServices = $resultServices->fetch_assoc()['total_services'];
                    echo $totalServices;
                    ?>
                </h2>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card overview-card">
                <h5>Total Projects</h5>
                <h2 id="totalProjects">
                    <?php
                    $sqlServices = "SELECT COUNT(*) AS total_services FROM services";
                    $resultServices = con()->query($sqlServices);
                    $totalProjects = $resultServices->fetch_assoc()['total_services'];
                    echo $totalProjects;
                    ?>
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card p-3 shadow">
            <h5>Recent Activity</h5>
            <ul id="recentActivity" class="list-group list-group-flush">
                <li class="list-group-item">No recent activity.</li>
            </ul>
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