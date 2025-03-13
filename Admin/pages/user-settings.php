<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">User Settings</h1>
    </div>
</header>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-4 rounded">
                <h4 class="mb-4 border-bottom pb-2"><strong>Profile Settings</strong></h4>
                <form id="userForm" method="POST" action="update-profile.php">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">

                    <div class="text-center mb-4">
                        <div class="position-relative" style="
                            width: 120px;
                            height: 120px;
                            border-radius: 50%;
                            overflow: hidden;
                            border: 3px solid #ddd;
                            margin: 0 auto;
                            background-color: #f8f9fa;
                        ">
                            <img id="profilePreview"
                                src="<?= isset($user['user_profile']) && $user['user_profile'] ? 'includes/uploads/users/' . $user['user_profile'] : 'includes/uploads/users/default-profile.png'; ?>"
                                alt="Profile Picture"
                                class="img-thumbnail rounded-circle border"
                                style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    background-color: #e9ecef;
                                "
                                onerror="this.onerror=null; this.src='includes/uploads/users/default-profile.png';">
                        </div>

                        <input type="file" id="userProfile" name="userProfile" class="d-none" onchange="previewLogo(event)">
                        <button type="button" class="btn btn-outline-secondary btn-sm mt-2"
                            onclick="document.getElementById('userProfile').click();">
                            Change Picture
                        </button>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label"><strong>Username:</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" id="username"
                                value="<?= htmlspecialchars($_SESSION['username']); ?>" disabled>
                            <button type="button" class="btn btn-outline-primary" onclick="toggleEdit('username')">Edit</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="oldPassword" class="form-label"><strong>Current Password:</strong></label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="oldPassword" id="oldPassword" disabled>
                            <button type="button" class="btn btn-outline-primary" onclick="enablePasswordEdit()">Edit</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="newPassword" class="form-label"><strong>New Password:</strong></label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="newPassword" id="newPassword" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label"><strong>Confirm New Password:</strong></label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" disabled oninput="checkPasswordMatch()">
                        </div>
                        <small id="passwordMatchMessage" class="form-text mt-3"></small>
                    </div>

                    <div class="text-end mt-4">
                        <button id="saveCompanyInfoBtn" type="submit" class="btn btn-success px-4">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>