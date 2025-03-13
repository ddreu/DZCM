<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">User Settings</h1>
    </div>
</header>


<?php

// $sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
// $result = con()->query($sql);
// $user = $result->fetch_assoc();

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow p-5">
                <h4 class="mb-4"><strong>User Profile</strong></h4>
                <form id="userForm">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">

                    <div class="row mb-5">
                        <div class="col-md-3 text-center">
                            <div class="position-relative" style="width: 190px; height: 150px;">
                                <!-- <img src="includes/uploads/user-profile/<?= $user['user_profile'] ?? 'includes/uploads/default.png'; ?>" -->
                                <img src="includes/uploads/default.png"
                                    alt="User Profile"
                                    class="img-fluid rounded border"
                                    style="width: 100%; height: 100%; object-fit: contain;">
                                <input type="file" id="userProfile" name="logo" class="d-none" onchange="previewLogo(event)">
                                <button type="button" class="btn btn-outline-secondary btn-sm mt-2"
                                    onclick="document.getElementById('userProfile').click();">Change Profile</button>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="row mb-3 align-items-center">
                                <label for="username" class="col-md-3 col-form-label"><strong>Username:</strong></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="username" id="username" value="<?= htmlspecialchars($_SESSION['username']); ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editUsernameBtn" onclick="toggleEdit('username', 'editUserBtn')">Edit</button>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <label for="oldPassword" class="col-md-3 col-form-label"><strong>Password:</strong></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="oldPassword" id="oldPassword" value="" disabled>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editPasswordBtn" onclick="toggleEdit('phone', 'editPhoneBtn')">Edit</button>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <label for="newPassword" class="col-md-3 col-form-label"><strong>New Password:</strong></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="newPassword" id="newPassword" value="" disabled>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editPasswordBtn" onclick="toggleEdit('address', 'editAddressBtn')">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button id="saveCompanyInfoBtn" type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>