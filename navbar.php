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
    <span>📞 <a href="tel:<?php echo $row ? $row['phone'] : $phone; ?>"> <?php echo $row ? $row['phone'] : $phone; ?></a></span>
    <span>📧 <a href="mailto:<?php echo $row ? $row['contact_email'] : $email; ?>"><?php echo $row ? $row['contact_email'] : $email; ?></a></span>
</div>


<div class="navbar-container">
    <div class="logo">
        <a href="#"><img src="dzcm/images/<?php echo $row ? $row['logo'] : $logo; ?>" alt="DZCM Logo"></a>
    </div>
    
   
    <ul class="nav-links">
        <li><a href="#">About</a></li>
        <li><a href="#">Products and Services</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    
 
    <a href="/a/qoute.php" class="quote-btn">GET A QUOTE ➝</a>
</div>
