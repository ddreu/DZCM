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

<div class="top-bar">
    <span><i class="fas fa-phone"></i><a href="tel:<?php echo $row ? $row['phone'] : $phone; ?>"> <?php echo $row ? $row['phone'] : $phone; ?></a></span>
    <span><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $row ? $row['email'] : $email; ?>"><?php echo $row ? $row['email'] : $email; ?></a></span>
</div>
<div class="navbar-container">
    <div class="logo">
        <a href="index.php"><img src="admin/includes/uploads/company/<?php echo $row ? $row['logo'] : $logo; ?>" alt="MicroSource Logo"></a>
    </div>

    <ul class="nav-links">
        <li><a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About</a></li>
        <li><a href="product-services.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'product-services.php' ? 'active' : ''; ?>">Products and Services</a></li>
        <li><a href="portfolio.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'portfolio.php' ? 'active' : ''; ?>">Portfolio</a></li>
        <li><a href="careers.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'careers.php' ? 'active' : ''; ?>">Careers</a></li>
        <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
    </ul>


    <a href="#" class="quote-btn" onclick="openModal()">GET A QUOTE <i class="fas fa-chevron-right"></i></a>
</div>

<?php include 'quote.php'; ?>