<!-- SERVICES MODAL -->

<div class="service-modal-overlay" id="serviceModal">
    <div class="service-modal">
        <button class="close-btn" onclick="closeServiceModal()">&times;</button>

        <div class="service-carousel-container">
            <!-- Main Image -->
            <div class="service-carousel" id="carousel"></div>
        </div>

        <div class="text-container">
            <h2 id="serviceName"></h2>
            <p id="serviceDescription"></p>

            <div class="features">
                <h3>Features:</h3>
                <ul class="advantages-list" id="featuresList">
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- HARDWARE MODAL -->

<div class="service-modal-overlay" id="hardwareModal">
    <div class="service-modal">
        <button class="close-btn" onclick="closeHardwareModal()">&times;</button>

        <img id="hardwareImage" alt="Hardware Image" />
        <!-- <div class="carousel-container">
            <div class="carousel" id="carousel">
            </div>
        </div> -->

        <div class="text-container">
            <h2 id="hardwareName"></h2>
            <p id="hardwareDescription"></p>
        </div>
    </div>
</div>


<!-- QUOTE MODAL -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModal()"></div>

<!-- MODAL -->
<div class="modal" id="modal">
    <button class="close-btn" onclick="closeModal()">&times;</button>
    <form id="quoteFormModal" action="send-quote.php" method="POST" class="form-container">
        <h2>Get a Free Quote</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone" required>
        <input type="text" name="website" placeholder="Website">
        <textarea name="message" placeholder="Message" required></textarea>
        <button type="submit" class="btn">GET A QUOTE</button>
    </form>

    <div class="info-container">
        <div class="info-text">
            <h2>What's Next?</h2>
            <p>An email and phone call from one of our representatives.</p>
            <p>A time and cost estimation.</p>
            <p>An in-person meeting.</p>
        </div>
        <div class="info-boxes">
            <div class="info-box">
                <i class="fas fa-phone-alt"></i>
                <div class="divider gray"></div>

                <div>
                    <h3>Give us a call</h3>
                    <span>
                        <a href="tel:<?php echo $row ? $row['phone'] : $phone; ?>">
                            <?php echo $row ? $row['phone'] : $phone; ?>
                        </a>
                    </span>
                </div>
            </div>

            <div class="info-box">
                <i class="fas fa-envelope"></i>
                <div class="divider gray"></div>
                <div>
                    <h3>Send an email</h3>
                    <a href="mailto:<?php echo $row ? $row['email'] : $email; ?>">
                        <?php echo $row ? $row['email'] : $email; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Notification Modal -->
<div id="notificationModal" class="notification-modal">
    <div class="notification-content">
        <h3 id="notificationTitle"></h3>
        <p id="notificationMessage"></p>
    </div>
</div>

<script>
    // let currentIndex = 0;

    // function nextSlide() {
    //     const carousel = document.querySelector('.carousel');
    //     const items = document.querySelectorAll('.carousel-item');
    //     currentIndex = (currentIndex + 1) % items.length;
    //     updateCarousel();
    // }

    // function prevSlide() {
    //     const carousel = document.querySelector('.carousel');
    //     const items = document.querySelectorAll('.carousel-item');
    //     currentIndex = (currentIndex - 1 + items.length) % items.length;
    //     updateCarousel();
    // }

    // function updateCarousel() {
    //     const carousel = document.querySelector('.carousel');
    //     const offset = -currentIndex * 100;
    //     carousel.style.transform = `translateX(${offset}%)`;
    // }

    // function openServiceModal() {
    //     document.getElementById('serviceModal').style.display = 'flex';
    //     document.body.style.overflow = 'hidden';
    // }

    // function closeServiceModal() {
    //     document.getElementById('serviceModal').style.display = 'none';
    //     document.body.style.overflow = 'auto';
    // }
</script>