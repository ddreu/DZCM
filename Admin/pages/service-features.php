<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure $page is never less than 1
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;
$serviceId = $_GET['service_id'] ?? 0;

$totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM service_features where service_id = $serviceId");
$totalServiceFeature = mysqli_fetch_assoc($totalQuery)['count'];
$totalPages = ceil($totalServiceFeature / $recordsPerPage);

$query = "
    SELECT sf.service_feature_id, sf.service_id, sf.name, sf.description, sf.image, s.service_name as service_name
    FROM service_features as sf
    LEFT JOIN services as s ON sf.service_id = s.service_id
    WHERE sf.service_id = $serviceId

    LIMIT $offset, $recordsPerPage
";
$result = mysqli_query(con(), $query);
$services = mysqli_fetch_assoc($result);
$service_name = $services['service_name'];
?>

<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-5">Service Features</h1>
    </div>
</header>
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2 class="text-white">Service Name: <?php echo $services['service_name']; ?></h2>
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
                    <!-- <th>Features</th> -->
                    <!--    <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>

                <?php while ($service = mysqli_fetch_assoc($result)):
                ?>
                    <tr class="service-feature-row" data-service-id="<?php echo $service['service_id']; ?>"
                        data-service-feature-id="<?php echo $service['service_feature_id']; ?>"
                        data-feature-name="<?php echo htmlspecialchars($service['name']); ?>"
                        data-description="<?php echo htmlspecialchars($service['description']); ?>"
                        data-image="<?php echo htmlspecialchars($service['image']); ?>"
                        data-bs-toggle="modal" data-bs-target="#editServiceFeatureModal">
                        <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['service_feature_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['name']); ?></td>
                        <td><?php echo htmlspecialchars($service['description']); ?></td>
                        <td>
                            <?php if ($service['image']): ?>
                                <img src="includes/uploads/seervice-features/<?php echo htmlspecialchars($service['image']); ?>"
                                    alt="Service Feature Image" class="img-thumbnail" style="width: 100px;">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <!--  <td>
                        <button class="btn btn-info"
                            data-service-id="<?php echo $service['service_id']; ?>" data-bs-toggle="modal" data-bs-target="#serviceFeaturesModal">
                            <?php //echo $service['feature_count']; 
                            ?> Features
                        </button> 
                    </td> -->
                        <!-- <td>
                        <button class="btn btn-danger delete-service-btn"
                            data-service-id="<?php echo $service['service_id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteServiceModal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td> -->
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
</div>


<div id="contextMenu" class="dropdown-menu" style="display: none; position: absolute;">
    <!--<button class="dropdown-item add-feature">Add Feature</button>-->
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


<!--<div id="addServiceModal" class="modal fade" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" id="serviceName" name="service_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea id="serviceDescription" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Service Image</label>
                        <input type="file" id="serviceImage" name="image" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Service</button>
                </form>
            </div>
        </div>
    </div>
</div>-->

<!--<div id="serviceFeaturesModal" class="modal fade" tabindex="-1" aria-labelledby="serviceFeaturesModalLabel" aria-hidden="true">
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
</div>-->

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