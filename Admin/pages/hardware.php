<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">Hardwares</h1>
    </div>
</header>


<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;

$totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM services");
$totalServices = mysqli_fetch_assoc($totalQuery)['count'];
$totalPages = ceil($totalServices / $recordsPerPage);

$query = "
    SELECT * FROM hardware
    LIMIT $offset, $recordsPerPage  
";
$result = mysqli_query(con(), $query);
?>


<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <button id="addHardwareBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHardwareModal">
            <i class="fas fa-plus"></i> Add New Hardware
        </button>
    </div>
</div>


<div class="hardware-table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hardware Name</th>
                <th>Description</th>
                <th>Image</th>
                <!-- <th>Features</th> -->
                <!--    <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php while ($hardware = mysqli_fetch_assoc($result)): ?>
                <tr class="hardware-row" data-hardware-id="<?php echo $hardware['hardware_id']; ?>"
                    data-hardware-name="<?php echo htmlspecialchars($hardware['name']); ?>"
                    data-hardware-description="<?php echo htmlspecialchars($hardware['description']); ?>"
                    data-image="<?php echo htmlspecialchars($hardware['image']); ?>"
                    data-bs-toggle="modal" data-bs-target="#editHardwareModal">
                    <td><?php echo htmlspecialchars($hardware['hardware_id']); ?></td>
                    <td><?php echo htmlspecialchars($hardware['name']); ?></td>
                    <td><?php echo htmlspecialchars($hardware['description']); ?></td>
                    <td>
                        <?php if ($hardware['image']): ?>
                            <img src="includes/uploads/hardware/<?php echo htmlspecialchars($hardware['image']); ?>"
                                alt="Hardware Image" class="img-thumbnail" style="width: 100px;">
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
    <button class="dropdown-item edit-hardware">Edit Hardware</button>
    <button class="dropdown-item delete-hardware">Delete Hardware</button>
</div>


<div id="editHardwareModal" class="modal fade" tabindex="-1" aria-labelledby="editHardwareModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHardwareModalLabel">Edit Hardware</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editHardwareForm">
                    <input type="hidden" id="editHardwareId" name="hardware_id" value=" <?php echo $hardware['hardware_id']; ?>">

                    <div class="mb-3">
                        <label for="editHardwareName" class="form-label">Hardware Name</label>
                        <input type="text" id="editHardwareName" name="hardware_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editHardwareDescription" class="form-label">Description</label>
                        <textarea id="editHardwareDescription" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img id="editHardwareImagePreview" class="img-thumbnail" style="width: 150px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="editHardwareImage" class="form-label">Upload New Image</label>
                        <input type="file" id="editHardwareImage" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="addHardwareModal" class="modal fade" tabindex="-1" aria-labelledby="addHardwareModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHardwareModalLabel">Add New Hardware</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addHardwareForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="hardwareName" class="form-label">Hardware Name</label>
                        <input type="text" id="hardwareName" name="hardware_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="hardwareDescription" class="form-label">Description</label>
                        <textarea id="hardwareDescription" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="hardwareImage" class="form-label">Hardware Image</label>
                        <input type="file" id="hardwareImage" name="image" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Hardware</button>
                </form>
            </div>
        </div>
    </div>
</div>