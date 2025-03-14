<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="about-section">
        <div class="container">
            <div class="contact-header">
                <h2 class="section-title">Our Portfolio</h2>
                <p class="section-subtitle">Explore our portfolio of successful projects and applications.</p>

            </div>
            <hr class="section-divider" />
        </div>


        <div class="portfolio-filter">
            <button class="filter-btn active" data-category="all">All</button>
            <button class="filter-btn" data-category="web">Web</button>
            <button class="filter-btn" data-category="mobile">Mobile</button>
            <button class="filter-btn" data-category="desktop">Desktop</button>
        </div>


        <?php include 'main/services.php'; ?>
        <!-- <div class="portfolio-container">
        <div class="portfolio-box">
            <div class="portfolio-label">PORTFOLIO</div>
            <div class="image-container">
                <img src="img/pos.jpg" alt="Point Of Sales">
                <a href="/dezcomm/pos.php" class="discover-btn">DISCOVER</a>
            </div>
            <div class="portfolio-content">
                <h3>Point Of Sales</h3>
                <p>Description of the project or application.</p>
            </div>
        </div>

        <div class="portfolio-box">
            <div class="portfolio-label">PORTFOLIO</div>
            <div class="image-container">
                <img src="img/23456.jpg" alt="Inventory Management System">
                <a href="/dezcomm/pos.php" class="discover-btn">DISCOVER</a>
            </div>
            <div class="portfolio-content">
                <h3>Inventory Management System</h3>
                <p>Track business assets and investments with a custom inventory system.</p>
            </div>
        </div>

        <div class="portfolio-box">
            <div class="portfolio-label">PORTFOLIO</div>
            <div class="image-container">
                <img src="your-image.jpg" alt="Mobile Application">
                <a href="/dezcomm/pos.php" class="discover-btn">DISCOVER</a>
            </div>
            <div class="portfolio-content">
                <h3>Mobile Application</h3>
                <p>We create interactive mobile apps for Android and iOS to attract clients.</p>
            </div>
        </div>

        <div class="portfolio-box">
            <div class="portfolio-label">PORTFOLIO</div>
            <div class="image-container">
                <img src="your-image.jpg" alt="Mobile Application">
                <a href="/dezcomm/pos.php" class="discover-btn">DISCOVER</a>
            </div>
            <div class="portfolio-content">
                <h3>Mobile Application</h3>
                <p>We create interactive mobile apps for Android and iOS to attract clients.</p>
            </div>
        </div>

        <div class="portfolio-box">
            <div class="portfolio-label">PORTFOLIO</div>
            <div class="image-container">
                <img src="your-image.jpg" alt="Mobile Application">
                <a href="/dezcomm/pos.php" class="discover-btn">DISCOVER</a>
            </div>
            <div class="portfolio-content">
                <h3>Mobile Application</h3>
                <p>We create interactive mobile apps for Android and iOS to attract clients.</p>
            </div>
        </div>

        <div class="portfolio-box">
            <div class="portfolio-label">PORTFOLIO</div>
            <div class="image-container">
                <img src="your-image.jpg" alt="Mobile Application">
                <a href="/dezcommm/pos.php" class="discover-btn">DISCOVER</a>
            </div>
            <div class="portfolio-content">
                <h3>Mobile Application</h3>
                <p>We create interactive mobile apps for Android and iOS to attract clients.</p>
            </div>
        </div>
    </div> -->
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="includes/script.js"></script>

</body>

</html>