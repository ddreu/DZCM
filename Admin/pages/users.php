<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">Users</h1>
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
    SELECT * FROM users
    LIMIT $offset, $recordsPerPage  
";
$result = mysqli_query(con(), $query);
?>


<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <button id="addUserBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fas fa-plus"></i> Add New User
        </button>
    </div>
</div>


<div class="hardware-table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Username</th>
                <!-- <th>Features</th> -->
                <!--    <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php while ($users = mysqli_fetch_assoc($result)): ?>
                <tr class="user-row" data-service-id="<?php echo $users['user_id']; ?>"
                    data-service-name="<?php echo htmlspecialchars($users['username']); ?>"
                    data-description="<?php echo htmlspecialchars($users['password']); ?>"
                    data-image="<?php echo htmlspecialchars($users['profile_image']); ?>"
                    data-bs-toggle="modal" data-bs-target="#editUserModal">

                    <td><?php echo htmlspecialchars($users['user_id']); ?></td>
                    <td>
                        <?php if ($users['profile_image']): ?>
                            <img src="includes/uploads/user-profile/<?php echo htmlspecialchars($users['profile_image']); ?>"
                                alt="Service Image" class="img-thumbnail" style="width: 100px;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($users['username']); ?></td>
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
    <!-- <button class="dropdown-item add-feature">Add User</button> -->
    <button class="dropdown-item edit-service">Edit User</button>
    <button class="dropdown-item delete-service">Delete User</button>
</div>


<div id="editUserModal" class="modal fade" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <input type="hidden" id="editUserId" name="user_id">

                    <div class="mb-3">
                        <label for="editUserName" class="form-label">User Name</label>
                        <input type="text" id="editUserName" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Profile</label><br>
                        <img id="editUserProfilePreview" class="img-thumbnail" style="width: 150px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="editUserProfileImage" class="form-label">Upload New Image</label>
                        <input type="file" id="editUserProfile" name="user_profile" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="addUserModal" class="modal fade" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" id="userName" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="userProfile" class="form-label">User Profile</label>
                        <input type="file" id="userProfile" name="user_profile" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>