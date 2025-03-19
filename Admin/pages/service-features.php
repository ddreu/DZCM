<?php
$page = isset($_GET['current_page']) ? (int)$_GET['current_page'] : 1;
$page = max($page, 1);
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;

$serviceId = isset($_GET['service_id']) ? (int)$_GET['service_id'] : 0;

$totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM service_features WHERE service_id = $serviceId");
$totalQuotes = mysqli_fetch_assoc($totalQuery)['count'];
$totalPages = ceil($totalQuotes / $recordsPerPage);

$serviceQuery = mysqli_query(con(), "SELECT service_name FROM services WHERE service_id = $serviceId");
$service = mysqli_fetch_assoc($serviceQuery);
$service_name = $service['service_name'] ?? 'N/A';

$query = "
    SELECT sf.service_feature_id, sf.service_id, 
           IFNULL(sf.name, 'N/A') as name, 
           IFNULL(sf.description, 'N/A') as description, 
           IFNULL(sf.image, '') as image
    FROM service_features as sf
    WHERE sf.service_id = $serviceId
    ORDER BY sf.service_feature_id DESC
    LIMIT $offset, $recordsPerPage
";
$result = mysqli_query(con(), $query);
?>

<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-5">Service Features</h1>
    </div>
</header>

<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2 class="text-white">Service Name: <?php echo htmlspecialchars($service_name); ?></h2>
        <button id="addFeatureBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
            <i class="fas fa-plus"></i> Add New Service Feature
        </button>
    </div>

    <div class="services-table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service ID</th>
                    <th>Feature Name</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($service = mysqli_fetch_assoc($result)): ?>
                    <tr class="service-feature-row"
                        data-service-id="<?php echo htmlspecialchars($service['service_id']); ?>"
                        data-service-feature-id="<?php echo htmlspecialchars($service['service_feature_id']); ?>"
                        data-feature-name="<?php echo htmlspecialchars($service['name']); ?>"
                        data-description="<?php echo htmlspecialchars($service['description']); ?>"
                        data-image="<?php echo htmlspecialchars($service['image']); ?>"
                        data-bs-toggle="modal" data-bs-target="#editServiceFeatureModal">

                        <td><?php echo htmlspecialchars($service['service_feature_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['name']); ?></td>
                        <td><?php echo htmlspecialchars($service['description']); ?></td>
                        <td>
                            <?php if ($service['image']): ?>
                                <img src="includes/uploads/service-features/<?php echo htmlspecialchars($service['image']); ?>"
                                    alt="Service Feature Image" class="img-thumbnail" style="width: 100px;">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=service-features&service_id=<?php echo htmlspecialchars($_GET['service_id']); ?>&current_page=<?php echo $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=service-features&service_id=<?php echo htmlspecialchars($_GET['service_id']); ?>&current_page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=service-features&service_id=<?php echo htmlspecialchars($_GET['service_id']); ?>&current_page=<?php echo $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<div id="contextMenu" class="dropdown-menu" style="display: none; position: absolute;">
    <button class="dropdown-item edit-feature">Edit Feature</button>
    <button class="dropdown-item delete-feature ">Delete Feature</button>
</div>


<div id="editServiceFeatureModal" class="modal fade" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editFeatureForm">
                    <input type="hidden" id="editServiceId" name="service_id">
                    <input type="hidden" id="editServiceFeatureId" name="service_feature_id">

                    <div class="mb-3">
                        <label for="editFeatureName" class="form-label">Feature Name</label>
                        <input type="text" id="editFeatureName" name="service_feature_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editFeatureDescription" class="form-label">Description</label>
                        <textarea id="editFeatureDescription" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img id="editFeatureImagePreview" class="img-thumbnail" style="width: 150px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="editServiceImage" class="form-label">Upload New Image</label>
                        <input type="file" id="editFeatureImage" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
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
                    <input type="hidden" id="featureServiceId" name="service_id" value="<?php echo $serviceId; ?>">
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
</div>