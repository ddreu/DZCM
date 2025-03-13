<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="about-section">
        <div class="container">
            <div class="contact-header">
                <h2 class="section-title">Careers</h2>
                <p class="section-subtitle">Do you have what it takes to be part of our growing family?
                    </br>Join us today!
                </p>
            </div>
            <hr class="section-divider" />

            <div class="career-subsection">
                <h2><strong>We Want You!</strong>
                </h2>
                <p>Here at DZCM, we treat all employees as part of our family. We work as a team and realize all possibilities together. With this, the success of our projects also becomes the success of our people.
                    And because we value our family, we provide competitive and rewarding benefits to each talent in our company. We also ensure to practice our core values to achieve a healthy working environment for everyone.
                    Come and begin your journey with MicroSource Inc. Experience a true career diversity and collaborative working environment, servicing both our clients and the community.
                </p>

            </div>

            <section class="contact-section">
                <div class="career-subsection mt-0">
                    <h2><strong>Join Our Team!</strong></h2>
                </div>
                <div class="row mt-5">
                    <!-- Contact Form -->
                    <div class="col-lg-8">
                        <div>
                            <h4 class="form-title"><strong>Personal Information</strong></h4>
                            <form id="contactForm" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="form-message"></div>

                                    <div class="col-md-6">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-user"></i>
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-user"></i>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-envelope"></i>
                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-phone"></i>
                                            <input type="text" name="phone" class="form-control" placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-comment message-icon"></i>
                                            <textarea name="message" class="form-control" placeholder="Your Message Here" rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cv">CV/Resume:</label>
                                            <input type="file" name="cv" id="cv" class="form-control-file" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-submit">APPLY NOW!</button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-4">
                        <div>
                            <div class="info-item">
                                <div class="contact-card">
                                    <i class="fas fa-phone"></i>
                                    <div class="divider"></div>
                                    <div class="contact-text">
                                        <h6>Give us a call</h6>
                                        <a href="tel:+639985833381">+63 998 583 3381</a>
                                        <a href="tel:+63289821268">(02) 8 982 12 68</a>
                                    </div>
                                </div>

                            </div>
                            <div class="info-item">
                                <div class="contact-card">
                                    <i class="fas fa-envelope"></i>
                                    <div class="divider"></div>

                                    <div class="contact-text">
                                        <h6>Send an email</h6>
                                        <a href="mailto:dzcm@gmail.com ">dzcm@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="contact-card">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="divider"></div>

                                    <div class="contact-text">
                                        <h6>Address</h6>
                                        <p>Unit 1205, Corporate 145 Building, Mo. Ignacia Ave Diliman, Quezon City, Philippines</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-card">
                                <div class="info-item contact-social-links">
                                    <a href="https://www.facebook.com/DezcomShop" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="includes/script.js"></script>

</body>

</html>