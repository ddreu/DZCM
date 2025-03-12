<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZCM | Contact</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cs/navbar.css">
    <link rel="stylesheet" href="cs/services.css">
    <link rel="stylesheet" href="cs/featured.css">
    <link rel="stylesheet" href="cs/discover.css">
    <link rel="stylesheet" href="cs/profile.css">
    <link rel="stylesheet" href="cs/footer.css">
    <link rel="stylesheet" href="cs/contact.css">
    <link rel="stylesheet" href="cs/index.css">
    <link rel="stylesheet" href="cs/about.css">
    <link rel="stylesheet" href="cs/portfolio.css">
</head> -->
<?php include 'includes/header.php'; ?>

<body>
    <?php include('includes/navbar.php'); ?>


    <section class="contact-section">
        <div class="container">
            <div class="contact-header">
                <h2 class="section-title">Contact Us</h2>
                <p class="section-subtitle">Let us help you grow your business online.<br>Call us today!</p>

            </div>
            <hr class="section-divider" />

            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h3 class="form-title">Send Us a Message</h3>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="website" class="form-control" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Contact us now!</button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="contact-info">
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
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <!-- Section title -->
            <h2 class="section-title">Visit Us</h2>

            <!-- Nav tab with icon and label -->
            <div class="row">
                <div class="col-xs-12 text-center">
                    <ul class="nav nav-tabs process-model contact-us-tab" role="tablist">
                        <li role="presentation">
                            <a href="#map" aria-controls="map" role="tab" data-toggle="tab">
                                <span class="material-icons">map</span>
                                <p class="mt-4">Philippines</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Map container -->
            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 mb-5">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3847.1441758774345!2d120.98120667458674!3d15.368676157812182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339727afec5ea617%3A0x4cfe554ed30fab6b!2sDEZCOM%20SHOP%20(DZCM)!5e0!3m2!1sen!2sph!4v1740990027667!5m2!1sen!2sph"
                        width="100%" height="200px" frameborder="0" style="border:0" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>


    <!-- ++++ footer ++++ -->
    <?php include 'includes/footer.php'; ?>


</body>

</html>