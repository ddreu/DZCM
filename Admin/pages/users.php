<div class="dashboard-wrapper">
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

    $totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM users");
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
        <div class="hardware-table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Username</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($users = mysqli_fetch_assoc($result)): ?>
                        <tr class="user-row"
                            data-user-id="<?php echo $users['user_id']; ?>"
                            data-username="<?php echo htmlspecialchars($users['username']); ?>"
                            data-image="<?php echo htmlspecialchars($users['profile_image']); ?>"
                            data-bs-toggle="modal" data-bs-target="#editUserModal">

                            <td><?php echo htmlspecialchars($users['user_id']); ?></td>

                            <td>
                                <?php if ($users['profile_image']): ?>
                                    <img src="includes/uploads/users/<?php echo htmlspecialchars($users['profile_image']); ?>"
                                        alt="User Profile Image"
                                        class="profile-image"
                                        style="
                            width: 60px;
                            height: 60px;
                            border-radius: 50%; 
                            object-fit: cover;
                            border: 2px solid #ddd;
                        ">
                                <?php else: ?>
                                    <img src="includes/uploads/users/default-profile.png ?>"
                                        alt="User Profile Image"
                                        class="profile-image"
                                        style="
                            width: 60px;
                            height: 60px;
                            border-radius: 50%; 
                            object-fit: cover;
                            border: 2px solid #ddd;
                        ">
                                <?php endif; ?>
                            </td>

                            <!-- Username -->
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
    </div>

    <div id="contextMenu" class="dropdown-menu" style="display: none; position: absolute;">
        <button class="dropdown-item edit-user">Edit User</button>
        <button class="dropdown-item delete-user">Delete User</button>
    </div>

    <!-- EDIT USER MODAL -->

    <div id="editUserModal" class="modal fade" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" enctype="multipart/form-data">
                        <input type="hidden" id="editUserId" name="user_id">

                        <div class="mb-3 text-center">
                            <label class="form-label">Current Profile</label><br>
                            <div style="
                            width: 120px;
                            height: 120px;
                            border-radius: 50%;
                            overflow: hidden;
                            /* border: 3px solid #007bff; */
                            border: 3px solid #ddd;
                            margin: 0 auto;
                        ">
                                <img id="editUserProfilePreview"
                                    src=""
                                    alt="Profile"
                                    style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    display: none;
                                ">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="editUserImage" class="form-label">Upload New Image</label>
                            <input type="file" id="editUserImage" name="image" class="form-control" accept="image/*" onchange="previewEditImage(event)">
                        </div>

                        <div class="mb-3">
                            <label for="editUserName" class="form-label">Username</label>
                            <input type="text" id="editUserName" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="editUserPassword" class="form-label">Change Password</label>
                            <input type="password" id="editUserPassword" name="password" class="form-control" placeholder="Leave blank to keep current password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
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
                        <div class="mb-3 d-flex justify-content-center">
                            <div
                                style="
                                width: 120px;
                                height: 120px;
                                border: 2px solid #ddd;
                                border-radius: 50%;
                                overflow: hidden;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                background-color: #f9f9f9;
                            ">
                                <img id="imagePreview" src=""
                                    alt="Preview"
                                    style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    display: none;
                                ">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="userImage" class="form-label">Profile Picture</label>
                            <input type="file" id="userImage" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        </div>

                        <div class="mb-3">
                            <label for="userName" class="form-label">Username</label>
                            <input type="text" id="userName" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" id="userPassword" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>