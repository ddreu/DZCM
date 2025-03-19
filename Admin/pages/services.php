<?php
$page = isset($_GET['current_page']) ? (int)$_GET['current_page'] : 1;
$page = max($page, 1);
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;

$totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM services");
$totalQuotes = mysqli_fetch_assoc($totalQuery)['count'];
$totalPages = ceil($totalQuotes / $recordsPerPage);


$query = "
    SELECT s.service_id, s.service_name, s.description, s.image, s.category, 
           COUNT(sf.service_feature_id) as feature_count
    FROM services s
    LEFT JOIN service_features sf ON s.service_id = sf.service_id
    GROUP BY s.service_id
    ORDER BY s.service_id DESC
    LIMIT $offset, $recordsPerPage  
";
$result = mysqli_query(con(), $query);
?>

<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">Services</h1>
    </div>
</header>
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <button id="addServiceBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
            <i class="fas fa-plus"></i> Add New Service
        </button>
    </div>



    <div class="services-table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Features</th>
                    <!--    <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php while ($service = mysqli_fetch_assoc($result)): ?>
                    <tr class="service-row" data-service-id="<?php echo $service['service_id']; ?>"
                        data-service-category="<?php echo $service['category']; ?>"
                        data-service-name="<?php echo htmlspecialchars($service['service_name']); ?>"
                        data-description="<?php echo htmlspecialchars($service['description']); ?>"
                        data-image="<?php echo htmlspecialchars($service['image']); ?>"
                        data-bs-toggle="modal" data-bs-target="#editServiceModal">
                        <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['service_name']); ?></td>
                        <td><?php echo htmlspecialchars($service['description']); ?></td>
                        <td>
                            <?php if ($service['image']): ?>
                                <img src="includes/uploads/services/<?php echo htmlspecialchars($service['image']); ?>"
                                    alt="Service Image" class="img-thumbnail" style="width: 100px;">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?page=service-features&service_id=<?php echo $service['service_id']; ?>" class="btn btn-info"
                                data-service-id="<?php echo $service['service_id']; ?>">
                                <?php echo $service['feature_count']; ?> Features
                            </a>
                        </td>
                        <!-- <td>
                        <button class="btn btn-info"
                            data-service-id="<?php echo $service['service_id']; ?>">
                            <a href="index.php?page=service-features&service_id=<?php echo $service['service_id']; ?>">
                                <?php echo $service['feature_count']; ?> Features </a>
                        </button>
                    </td>-->
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
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=services&current_page=<?php echo $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=services&current_page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=services&current_page=<?php echo $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<div id="contextMenu" class="dropdown-menu" style="display: none; position: absolute;">
    <button class="dropdown-item add-feature">Add Feature</button>
    <button class="dropdown-item edit-service">Edit Service</button>
    <button class="dropdown-item delete-service">Delete Service</button>
</div>


<div id="editServiceModal" class="modal fade" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm" enctype="multipart/form-data" method="POST" action="update_service.php">
                    <input type="hidden" id="editServiceId" name="service_id">

                    <div class="mb-3">
                        <label for="editServiceName" class="form-label">Service Name</label>
                        <input type="text" id="editServiceName" name="service_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editServiceDescription" class="form-label">Description</label>
                        <textarea id="editServiceDescription" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="editServiceCategory" class="form-label">Category</label>
                        <select id="editServiceCategory" name="category" class="form-control" required onchange="toggleEditCategoryInput(this)">
                            <option value="" selected disabled>-- Select Category --</option>
                            <?php
                            con();
                            $query = "SELECT DISTINCT category FROM services WHERE category IS NOT NULL";
                            $result = con()->query($query);
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['category']) . '">' . htmlspecialchars($row['category']) . '</option>';
                            }
                            ?>
                            <option value="add-new">Add New</option>
                        </select>
                        <input type="text" id="editNewCategory" name="new_category" class="form-control mt-2" placeholder="Enter new category" style="display: none;">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img id="editServiceImagePreview" class="img-thumbnail" style="width: 150px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="editServiceImage" class="form-label">Upload New Image</label>
                        <input type="file" id="editServiceImage" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="addServiceModal" class="modal fade" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm" enctype="multipart/form-data" method="POST" action="add_service.php">
                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" id="serviceName" name="service_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea id="serviceDescription" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceCategory" class="form-label">Category</label>
                        <select id="serviceCategory" name="category" class="form-control" required onchange="toggleCategoryInput(this)">
                            <option value="" selected disabled>-- Select Category --</option>
                            <?php
                            con();
                            $query = "SELECT DISTINCT category FROM services WHERE category IS NOT NULL";
                            $result = con()->query($query);
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['category']) . '">' . htmlspecialchars($row['category']) . '</option>';
                            }
                            ?>
                            <option value="add-new">Add New</option>
                        </select>
                        <input type="text" id="newCategory" name="new_category" class="form-control mt-2" placeholder="Enter new category" style="display: none;">
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
</div>


<!-- <div id="addServiceModal" class="modal fade" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
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
                        <label for="serviceCategory" class="form-label">Category</label>
                        <select id="serviceCategory" name="category" class="form-control" required>
                            <option value="" selected disabled>-- Select Category --</option>
                            <option value="web-app">Web App</option>
                            <option value="mobile-app">Mobile App</option>
                            <option value="desktop-app">Desktop App</option>
                        </select>
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
</div> -->


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
</div>

<script>
    function toggleCategoryInput(select) {
        const newCategoryInput = document.getElementById('newCategory');
        if (select.value === 'add-new') {
            newCategoryInput.style.display = 'block';
            newCategoryInput.required = true;
        } else {
            newCategoryInput.style.display = 'none';
            newCategoryInput.required = false;
        }
    }

    function toggleEditCategoryInput(select) {
        const newCategoryInput = document.getElementById('editNewCategory');
        if (select.value === 'add-new') {
            newCategoryInput.style.display = 'block';
            newCategoryInput.required = true;
        } else {
            newCategoryInput.style.display = 'none';
            newCategoryInput.required = false;
        }
    }
</script>