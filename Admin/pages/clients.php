<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;

$totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM clients");
$totalServices = mysqli_fetch_assoc($totalQuery)['count'];
$totalPages = ceil($totalServices / $recordsPerPage);

$query = "
    SELECT c.client_id, c.client_name, c.description, c.image, s.service_id
    FROM clients as c
    LEFT JOIN services as s ON c.service_id = s.service_id
    LIMIT $offset, $recordsPerPage  
";
$result = mysqli_query(con(), $query);
?>

<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">Clients</h1>
    </div>
</header>
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <button id="addClientBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
            <i class="fas fa-plus"></i> Add New Client
        </button>
    </div>
</div>


<div class="services-table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client Name</th>
                <th>Description</th>
                <th>Image</th>
                <!--<th>Features</th> -->
                <!--    <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php while ($clients = mysqli_fetch_assoc($result)): ?>
                <tr class="service-row" data-client-id="<?php echo $clients['client_id']; ?>"
                    data-service-id="<?php echo $clients['service_id']; ?>"
                    data-client-name="<?php echo htmlspecialchars($clients['client_name']); ?>"
                    data-description="<?php echo htmlspecialchars($clients['description']); ?>"
                    data-image="<?php echo htmlspecialchars($clients['image']); ?>"
                    data-bs-toggle="modal" data-bs-target="#editClientModal">
                    <td><?php echo htmlspecialchars($clients['client_id']); ?></td>
                    <td><?php echo htmlspecialchars($clients['client_name']); ?></td>
                    <td><?php echo htmlspecialchars($clients['description']); ?></td>
                    <td>
                        <?php if ($clients['image']): ?>
                            <img src="includes/uploads/clients/<?php echo htmlspecialchars($clients['image']); ?>"
                                alt="Service Image" class="img-thumbnail" style="width: 100px;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a href="?page=<?php echo $page - 1; ?>" class="page-link">
                    <i class="fas fa-chevron-left"></i> Previous
                </a>
            </li>
        <?php endif; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a href="?page=<?php echo $page + 1; ?>" class="page-link">
                    Next <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<div id="contextMenu" class="dropdown-menu" style="display: none; position: absolute;">
    <!--  <button class="dropdown-item add-feature">Add Feature</button> -->
    <button class="dropdown-item edit-client">Edit Client</button>
    <button class="dropdown-item delete-client">Delete Client</button>
</div>


<div id="editClientModal" class="modal fade" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editClientForm">
                    <input type="hidden" id="editClientId" name="client_id">

                    <div class="mb-3">
                        <label for="editClientName" class="form-label">Client Name</label>
                        <input type="text" id="editClientName" name="client_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editClientDescription" class="form-label">Description</label>
                        <textarea id="editClientDescription" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img id="editClientImagePreview" class="img-thumbnail" style="width: 150px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="editClientImage" class="form-label">Upload New Image</label>
                        <input type="file" id="editClientImage" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="addClientModal" class="modal fade" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClientForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="clientName" class="form-label">Client Name</label>
                        <input type="text" id="clientName" name="client_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="clientDescription" class="form-label">Description</label>
                        <textarea id="clientDescription" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="client-Service" class="form-label">Service</label>
                        <select class="form-select" id="client-Service" name="service_id" required>
                            <option value="">Select a Service</option>
                            <?php
                            $query = "SELECT service_id, service_name FROM services";
                            $result = mysqli_query(con(), $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {
                                    $selected = (isset($meta['service_id']) && $meta['service_id'] == $row['service_id']) ? 'selected' : '';
                                    echo "<option value='{$row['service_id']}' $selected>{$row['service_name']}</option>";
                                }
                            } else {
                                echo "<option value=''>No Services Found</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="clientImage" class="form-label">Client Image</label>
                        <input type="file" id="clientImage" name="image" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Service</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--
<div id="serviceFeaturesModal" class="modal fade" tabindex="-1" aria-labelledby="serviceFeaturesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceFeaturesModalLabel">Service Features</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button id="addFeatureBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
                    <i class="fas fa-plus"></i> Add Feature
                </button>
                <div id="featuresContainer"></div>
            </div>
        </div>
    </div>
</div> 

<div id="addFeatureModal" class="modal fade" tabindex="-1" aria-labelledby="addFeatureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFeatureModalLabel">Add New Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addFeatureForm" enctype="multipart/form-data">
                    <input type="hidden" id="featureServiceId" name="service_id">
                    <div class="mb-3">
                        <label for="featureName" class="form-label">Feature Name</label>
                        <input type="text" id="featureName" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="featureDescription" class="form-label">Description</label>
                        <textarea id="featureDescription" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="featureImage" class="form-label">Feature Image</label>
                        <input type="file" id="featureImage" name="image" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Feature</button>
                </form>
            </div>
        </div>
    </div>
</div> -->