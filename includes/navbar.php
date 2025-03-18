<?php
include 'includes/connect.php';
$conn->select_db("dezcom");


$sql = "SELECT * FROM company_info LIMIT 1";
$result = $conn->query($sql);


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {

    $row = null;
    $phone = "N/A";
    $email = "N/A";
    $logo = "N/A";
}

$conn->close();
?>

<div class="nav-wrapper">
    <div class="top-bar">
        <span><i class="fas fa-phone"></i><a href="tel:<?php echo $row ? $row['phone'] : $phone; ?>"> <?php echo $row ? $row['phone'] : $phone; ?></a></span>
        <div class="nav-divider gray"></div>
        <span><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $row ? $row['email'] : $email; ?>"><?php echo $row ? $row['email'] : $email; ?></a></span>
    </div>

    <div class="navbar-container">
        <div class="logo">
            <a href="index.php?page=home">
                <img src="admin/includes/uploads/company/<?php echo $row ? $row['logo'] : $logo; ?>" alt="MicroSource Logo">
            </a>
        </div>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>

        <ul class="nav-links">
            <li><a href="index.php?page=about" class="<?php echo isset($_GET['page']) && $_GET['page'] == 'about' ? 'active' : ''; ?>">About</a></li>
            <li><a href="index.php?page=products-services" class="<?php echo isset($_GET['page']) && $_GET['page'] == 'products-services' ? 'active' : ''; ?>">Products and Services</a></li>
            <li><a href="index.php?page=portfolio" class="<?php echo isset($_GET['page']) && $_GET['page'] == 'portfolio' ? 'active' : ''; ?>">Portfolio</a></li>
            <li><a href="index.php?page=careers" class="<?php echo isset($_GET['page']) && $_GET['page'] == 'careers' ? 'active' : ''; ?>">Careers</a></li>
            <li><a href="index.php?page=contact" class="<?php echo isset($_GET['page']) && $_GET['page'] == 'contact' ? 'active' : ''; ?>">Contact</a></li>
        </ul>

        <a href="#" class="quote-btn" onclick="openModal()">GET A QUOTE <i class="fas fa-chevron-right"></i></a>
    </div>
</div>



<?php include 'modals.php'; ?>