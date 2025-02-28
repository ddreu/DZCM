<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'includes/conn.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;

$totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM services");
$totalServices = mysqli_fetch_assoc($totalQuery)['count'];
$totalPages = ceil($totalServices / $recordsPerPage);

$query = "
    SELECT s.service_id, s.service_name, s.description, s.image, 
           COUNT(sf.service_feature_id) as feature_count
    FROM services s
    LEFT JOIN service_features sf ON s.service_id = sf.service_id
    GROUP BY s.service_id
    LIMIT $offset, $recordsPerPage
";
$result = mysqli_query(con(), $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <div class="dashboard-container">
        <?php include 'includes/sidebar.php'; ?>


        <main class="main-content">
            <header class="dashboard-header">
                <div class="header-content">
                    <h1>Services</h1>
                </div>

                <button id="addServiceBtn" class="addServiceBtn">
                    <i class="fas fa-plus"></i> Add New Service
                </button>
            </header>

            <div class="services-table-container">
                <table class="services-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Features</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($service = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                                <td><?php echo htmlspecialchars($service['service_name']); ?></td>
                                <td><?php echo htmlspecialchars($service['description']); ?></td>
                                <td>
                                    <?php if ($service['image']): ?>
                                        <img src="includes/uploads/services/<?php echo htmlspecialchars($service['image']); ?>"
                                            alt="Service Image" class="service-thumbnail">
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-features"
                                        data-service-id="<?php echo $service['service_id']; ?>">
                                        <?php echo $service['feature_count']; ?> Features
                                    </button>
                                </td>
                                <td>
                                        
                                    <button class="btn btn-edit"
                                        data-service-id="<?php echo $service['service_id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-delete"
                                        data-service-id="<?php echo $service['service_id']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="btn btn-prev">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                <?php endif; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="btn btn-next">
                        Next <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>

            <div id="addServiceModal" class="modal">
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h2>Add New Service</h2>
                    <form id="addServiceForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="serviceName">Service Name</label>
                            <input type="text" id="serviceName" name="service_name" required>
                        </div>
                        <div class="form-group">
                            <label for="serviceDescription">Description</label>
                            <textarea id="serviceDescription" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="serviceImage">Service Image</label>
                            <input type="file" id="serviceImage" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="submitServiceBtn"><i class="fas fa-plus"></i> Add Service</button>
                    </form>
                </div>
            </div>

            <div id="serviceFeaturesModal" class="modal">
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h2>Service Features</h2>
                    <button id="addFeatureBtn" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Feature
                    </button>
                    <div id="featuresContainer"></div>
                </div>
            </div>

            <div id="addFeatureModal" class="modal">
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h2>Add New Feature</h2>
                    <form id="addFeatureForm" enctype="multipart/form-data">
                        <input type="hidden" id="featureServiceId" name="service_id">
                        <div class="form-group">
                            <label for="featureName">Feature Name</label>
                            <input type="text" id="featureName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="featureDescription">Description</label>
                            <textarea id="featureDescription" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="featureImage">Feature Image</label>
                            <input type="file" id="featureImage" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Feature</button>
                    </form>
                </div>
            </div>


        </main>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const addServiceModal = $('#addServiceModal');
        const addServiceBtn = $('#addServiceBtn');
        const serviceFeaturesModal = $('#serviceFeaturesModal');
        const addFeatureModal = $('#addFeatureModal');
        const addFeatureBtn = $('#addFeatureBtn');
        const closeModalBtns = $('.close-modal');

        function openModal(modal) {
            modal.css('display', 'block');
        }

        function closeModal(modal) {
            modal.css('display', 'none');
        }

        addServiceBtn.click(() => openModal(addServiceModal));
        addFeatureBtn.click(() => openModal(addFeatureModal));

        closeModalBtns.click(function() {
            closeModal($(this).closest('.modal'));
        });

        $(window).click(function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal($(event.target));
            }
        });

        $('#addServiceForm').submit(function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: 'includes/handler.php?action=add_service',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const result = JSON.parse(response);
                    if (result.status === 'success') {
                        alert('Service added successfully');
                        location.reload();
                    } else {
                        alert('Error: ' + result.message);
                    }
                },
                error: function() {
                    alert('An error occurred while adding the service');
                }
            });
        });

        $('#addFeatureForm').submit(function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: 'includes/handler.php?action=add_service_feature',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const result = JSON.parse(response);
                    if (result.status === 'success') {
                        alert('Feature added successfully');
                        location.reload();
                    } else {
                        alert('Error: ' + result.message);
                    }
                },
                error: function() {
                    alert('An error occurred while adding the feature');
                }
            });
        });
    });
</script>
</body>

</html>