<header class="dashboard-header">
    <div class="container">
        <h1 class="mb-0">Company Profile</h1>
    </div>
</header>

<?php
$sql = "SELECT email, phone, address, company_id, logo FROM company_info WHERE company_id = 1";
$result = con()->query($sql);
$company = $result->fetch_assoc();


$email = $company['email'] ?? 'N/A';
$phone = $company['phone'] ?? 'N/A';
$address = $company['address'] ?? 'N/A';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow p-5">
                <h4 class="mb-4"><strong>Company Profile</strong></h4>
                <form id="companyForm">
                    <input type="hidden" name="company_id" value="<?= $company['company_id']; ?>">

                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            <div class="position-relative" style="width: 190px; height: 150px;">
                                <img src="includes/uploads/company/<?= $company['logo'] ?? 'default.png'; ?>"
                                    alt="Company Logo"
                                    class="img-fluid rounded border"
                                    style="width: 100%; height: 100%; object-fit: contain;">
                                <input type="file" id="logoInput" name="logo" class="d-none" onchange="previewLogo(event)">
                                <button type="button" class="btn btn-outline-secondary btn-sm mt-2"
                                    onclick="document.getElementById('logoInput').click();">Change Logo</button>
                            </div>
                        </div>


                        <div class="col-md-9">
                            <div class="row mb-3 align-items-center">
                                <label for="email" class="col-md-3 col-form-label"><strong>Email:</strong></label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($email); ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editEmailBtn" onclick="toggleEdit('email', 'editEmailBtn')">Edit</button>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <label for="phone" class="col-md-3 col-form-label"><strong>Phone:</strong></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= htmlspecialchars($phone); ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editPhoneBtn" onclick="toggleEdit('phone', 'editPhoneBtn')">Edit</button>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <label for="address" class="col-md-3 col-form-label"><strong>Address:</strong></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="address" id="address" value="<?= htmlspecialchars($address); ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm w-100" id="editAddressBtn" onclick="toggleEdit('address', 'editAddressBtn')">Edit</button>
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