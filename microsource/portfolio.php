<?php include('includes/head.php'); ?>

<body class="portfolio-page">
    <!-- most top information -->
    <header id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12  hidden-xs">
                    <!-- <div id="custom-search-input">
                            <div class="input-group"> <span class="input-group-btn">
                                        <button class="btn" type="button"> <span class="icon-magnifier"></span> </button>
                                </span>
                                <input type="text" class="search-query form-control" placeholder="Search" />
                            </div>
                        </div> -->
                </div>
                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                    <ul class="pull-right header-right">
                        <li>
                            <!-- <a href="tel:+632.982.12.68"><span class="icon-telephone"></span><span>+632 982 12 68 /</span></a> -->
                            <a href="tel:+632.8.982.12.68"><span class="icon-telephone"></span><span>(02) 8 982 12 68 /</span></a>
                            <a href="tel:+63.998.583.3381"><span>+63 998 583 3381 </span></a>
                        </li>
                        <li> <img src="images/separator.png" alt="separator" class="img-responsive" /> </li>
                        <li> <a href="mailto:sales@microsource.com.ph"><span class="icon-envelope"></span><span>sales@microsource.com.ph</span></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end most top information -->
    <!--navigation-->
    <?php include('includes/navbar.php'); ?>

    <!--end navigation-->
    <!--portfolio section-->
    <section class="portfolio clearfix" id="portfolio-home">
        <div class="container">
            <!--section title -->
            <h2 class="b-clor portfolio-oip our-impressive-portfolio">Our Impressive Portfolio</h2>
            <div class="title-spacer"></div>
            <p class="semi-bold portfolio-subcontent">We use strategic approaches and offer high-end services to achieve your business objectives.</p>
            <hr class="dark-line" />
            <div class="title-spacer"></div>
            <!--end section title -->
            <div class="button-group filter-button-group clearfix">
                <button class="button is-checked" data-filter="*">All Work</button>
                <button class="button" data-filter=".a2">Web App</button>
                <button class="button" data-filter=".a1">Website</button>
                <button class="button" data-filter=".a3">Mobile App</button>
                <!--  <button class="button" data-filter=".a4">Desktop App</button>-->
            </div>
            <!-- button-group ends -->
            <div class="grid clearfix row">
                <!-- Items for portfolio 
                currently using 12 items. More Items can be added. -->
                <div class="row">
                    <div class="a2 grid-item">
                        <div class="img_container">
                            <img src="images/portfolio/projects/epiroc/epiroc-thumb.jpg" alt="port_img" class="img-responsive">
                            <div class="overlay">
                                <a class="btn btn-nofill proDetModal15">Discover</a>
                            </div>
                            <!-- End of .overlay -->
                        </div>
                        <!-- End of .img_container -->
                        <div class="text-content">
                            <h3><a class="proDetModal proDetModal15">Epiroc<span>Web Application</span></a></h3>
                        </div>
                    </div>
                    <!-- End of .grid-item -->
                    <div class="a1 grid-item">
                        <div class="img_container">
                            <img src="images/portfolio/projects/aplus/aplus-thumb.jpg" alt="port_img" class="img-responsive">
                            <div class="overlay">
                                <a class="btn btn-nofill proDetModal14">Discover</a>
                            </div>
                            <!-- End of .overlay -->
                        </div>
                        <!-- End of .img_container -->
                        <div class="text-content">
                            <h3><a class="proDetModal proDetModal14">A+ Projek Construq Inc.<span>Website</span></a></h3>
                        </div>
                    </div>
                    <!-- End of .grid-item -->
                    <div class="a1 grid-item">
                        <div class="img_container">
                            <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-thumb.jpg" alt="port_img" class="img-responsive">
                            <div class="overlay">
                                <a class="btn btn-nofill proDetModal1">Discover</a>
                            </div>
                            <!-- End of .overlay -->
                        </div>
                        <!-- End of .img_container -->
                        <div class="text-content">
                            <h3><a class="proDetModal proDetModal1">Accident Lawyers<span>Website</span></a></h3>
                        </div>
                    </div>
                    <!-- End of .grid-item -->
                    <!-- <div class="a3 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/eagle-news/eagle-news-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal112">Discover</a>
                        </div>-->
                    <!-- End of .overlay -->
                    <!-- </div>-->
                    <!-- End of .img_container -->
                    <!--  <div class="text-content">
                        <h3><a class="proDetModal proDetModal1">Eagle News<span>Mobile App</span></a></h3>
                    </div>
                </div>-->
                    <!-- End of .grid-item -->
                    <div class="a1 grid-item">
                        <div class="img_container">
                            <img src="images/portfolio/projects/baydragon/baydragon-thumb.jpg" alt="port_img" class="img-responsive">
                            <div class="overlay">
                                <a class="btn btn-nofill proDetModal2">Discover</a>
                            </div>
                            <!-- End of .overlay -->
                        </div>
                        <!-- End of .img_container -->
                        <div class="text-content">
                            <h3><a class="proDetModal proDetModal2">Baydragon<span>Website</span></a></h3>
                        </div>
                    </div>
                    <!-- End of .grid-item -->
                    <div class="a1 grid-item">
                        <div class="img_container">
                            <img src="images/portfolio/projects/eccler/eccler-thumb.jpg" alt="port_img" class="img-responsive">
                            <div class="overlay">
                                <a class="btn btn-nofill proDetModal3">Discover</a>
                            </div>
                            <!-- End of .overlay -->
                        </div>
                        <!-- End of .img_container -->
                        <div class="text-content">
                            <h3><a class="proDetModal proDetModal3">ECCler<span>Website</span></a></h3>
                        </div>
                    </div>
                    <!-- End of .grid-item -->
                </div>
                <div class="a2 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/iclaim/iclaim-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal4">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal4">i-CLAIM<span>Web Application</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
                <div class="a2  grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/baylink/baylink-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal5">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal5">Baylink<span>Web Application</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
                <div class="a1 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/isso/isso-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal6">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal6">ISSO<span>Website</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
                <!-- <div class="a3 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/time-tracker/time-tracker-thumb.jpg" alt="vivo-mobile" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill FeaturedMobileApp">Discover</a>
                        </div> -->
                <!-- End of .overlay -->
                <!-- </div> -->
                <!-- End of .img_container -->
                <!-- <div class="text-content">
                        <h3><a class="proDetModal FeaturedMobileApp">Time Tracker<span>Mobile App</span></a></h3>
                    </div>
                </div>  -->
                <!-- End of .grid-item -->
                <!--  <div class="a3 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/vivo/vivo-mobile-thumb.jpg" alt="vivo-mobile" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal113">Discover</a>
                        </div> -->
                <!-- End of .overlay -->
                <!--  </div>-->
                <!-- End of .img_container -->
                <!-- <div class="text-content">
                        <h3><a class="proDetModal proDetModal1">Vivo<span>Mobile App</span></a></h3>
                    </div>
                </div>-->
                <!-- End of .grid-item -->
                <div class="a2 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/evftcfleet/evftcfleet-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal7">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal7">EVFTC Fleet Management<span>Web Application</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
                <div class="a1 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/evftc/evftc-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal8">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal8">EVFTC Website<span>Website</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
                <div class="a2 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/equis/equis-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal10">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal10">EQUIS<span>Web Application</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
                <div class="a1 grid-item">
                    <div class="img_container">
                        <img src="images/portfolio/projects/ipled/ipled-thumb.jpg" alt="port_img" class="img-responsive">
                        <div class="overlay">
                            <a class="btn btn-nofill proDetModal11">Discover</a>
                        </div>
                        <!-- End of .overlay -->
                    </div>
                    <!-- End of .img_container -->
                    <div class="text-content">
                        <h3><a class="proDetModal proDetModal11">IPLED<span>Website</span></a></h3>
                    </div>
                </div>
                <!-- End of .grid-item -->
            </div>
            <!-- End of .grid -->
        </div>
    </section>
    <!--end portfolio section-->
    <!-- ++++ footer ++++ -->
    <?php include 'includes/footer.php'; ?>

    <!--end footer-->
    <!--get a quote modal-->
    <div class="modal fade verticl-center-modal" id="getAQuoteModal" tabindex="-1" role="dialog" aria-labelledby="getAQuoteModal">
        <div class="modal-dialog getguoteModal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="customise-form">
                                <form class="email_form" method="post">
                                    <h3>Get a Free Quote</h3>
                                    <div class="form-group customised-formgroup"> <span class="icon-user"></span>
                                        <input type="text" name="full_name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group customised-formgroup"> <span class="icon-envelope"></span>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group customised-formgroup"> <span class="icon-telephone"></span>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group customised-formgroup"> <span class="icon-laptop"></span>
                                        <input type="text" name="website" class="form-control" placeholder="Website">
                                    </div>
                                    <div class="form-group customised-formgroup"> <span class="icon-bubble"></span>
                                        <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-fill full-width">GET A QUOTE<span class="icon-chevron-right"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>What’s Next?</h3>
                            <ul class="list-with-arrow">
                                <li>An email and phone call from one of our representatives.</li>
                                <li>A time and cost estimation.</li>
                                <li>An in-person meeting.</li>
                            </ul>
                            <div class="contact-info-box-wrapper">
                                <div class="contact-info-box"> <span class="icon-telephone"></span>
                                    <div>
                                        <h6>Give us a call</h6>
                                        <a href="tel:+632.982.12.68" class="getquote_tel">+632 982 12 68 /</a><a href="tel:+63.998.583.3381" class="getquote_tel">+63 998 583 3381</span></a>
                                    </div>
                                </div>
                                <div class="contact-info-box"> <span class="icon-envelope"></span>
                                    <div>
                                        <h6>Send an email</h6>
                                        <a href="mailto:sales@microsource.com.ph" class="getquote_email">sales@microsource.com.ph</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end get a quote modal-->
    <!--portfolio details  modal-->
    <!-- Epiroc-->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal15" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal15">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider0">
                                <div id="carousel-bounding-box">
                                    <div id="myCarousel1" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/epiroc/epiroc-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/epiroc/epiroc-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/epiroc/epiroc-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0" class="carousel-selector selected"> <img src="images/portfolio/projects/epiroc/epiroc-thumblist1.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1" class="carousel-selector"> <img src="images/portfolio/projects/epiroc/epiroc-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2" class="carousel-selector"> <img src="images/portfolio/projects/epiroc/epiroc-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Epiroc</h2>
                                <p class="regular-text project-description">
                                    Epiroc is a leading productivity partner for the mining, infrastructure and natural resources industries.
                                </p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>C#.NET MVC</li>
                                <li>MS SQL</li>
                                <li> HTML,CSS,JavaScript</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Daily Time In/Out </li>
                                <li> Employee Management </li>
                                <li> Leave, Overtime, and Training Requests </li>
                                <li> Requests </li>
                                <li> Timekeeping </li>
                                <li> Reports</li>
                                <li> Location</li>
                                <li> About Page</li>
                            </ul>
                            <a href="http://epirocph.com" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Epiroc -->
    <!-- A+ Projek Construq LNC.-->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal14" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal14">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider0">
                                <div id="carousel-bounding-box">
                                    <div id="myCarousel1" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/aplus/aplus-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/aplus/aplus-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/aplus/aplus-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0" class="carousel-selector selected"> <img src="images/portfolio/projects/aplus/aplus-thumblist1.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1" class="carousel-selector"> <img src="images/portfolio/projects/aplus/aplus-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2" class="carousel-selector"> <img src="images/portfolio/projects/aplus/aplus-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">A+ Projek Website</h2>
                                <p class="regular-text project-description">
                                    Aplus Projek Construq Inc. (APCI) is a one-stop-construction-solution company that offers a vast range of construction and related services.
                                    It aims to make quality construction possible for any scale of projects.
                                </p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Design and Development </li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>WordPress</li>
                                <li>PHP</li>
                                <li>My SQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Home </li>
                                <li> About Us </li>
                                <li> Portfolio </li>
                                <li> Services </li>
                                <li> Contact Us Form </li>
                                <li> Content Management </li>
                                <li> User and Roles Management </li>
                                <li> Animated Banner </li>
                            </ul>
                            <a href="" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of  A+ Projek -->
    <!-- Accident Lawyers-->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal1">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider0">
                                <div id="carousel-bounding-box">
                                    <div id="myCarousel1" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0" class="carousel-selector selected"> <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1" class="carousel-selector"> <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2" class="carousel-selector"> <img src="images/portfolio/projects/accident-lawyers/accident-lawyers-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Accident Lawyers Website</h2>
                                <p class="regular-text project-description">Accident Lawyers is an online lawyer listing website to help clients search for the best lawyers and law firms in various cities and across the United States.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>WordPress</li>
                                <li>PHP</li>
                                <li>My SQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Login and Registration</li>
                                <li> Email Verification</li>
                                <li> Initial Payment using Credit Card through Payments Gateway</li>
                                <li> Monthly Payment Subscription using a Registered Credit Card</li>
                                <li> Lawyers Firm Profile Creation and Updates</li>
                                <li> Lawyers Firm Listing per Location</li>
                            </ul>
                            <a href="http://accidentlawyers.com" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of  Accident Lawyers-->
    <!--Eagle News -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal12" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal12">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider0">
                                <div id="carousel-bounding-box">
                                    <div id="myCarousel1" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/eagle-news/eagle-news-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/eagle-news/eagle-news-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/eagle-news/eagle-news-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0" class="carousel-selector selected"> <img src="images/portfolio/projects/eagle-news/eagle-news-thumblist1.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1" class="carousel-selector"> <img src="images/portfolio/projects/eagle-news/eagle-news-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2" class="carousel-selector"> <img src="images/portfolio/projects/eagle-news/eagle-news-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Eagle News Mobile App</h2>
                                <p class="regular-text project-description">Eagle News is a student media group at Florida Gulf Coast University that represents the diverse voices on campus with fairness. Its purpose is to encourage conversations about issues concerning the on-campus community.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Mobile Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>HTML</li>
                                <li>Javascript</li>
                                <li>Angular JS</li>
                                <li>Cordova</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> RSS Feed Reader</li>
                                <li> Cross-Platform between iOS and Android</li>
                                <li> Push Notification</li>
                                <li> Real-time Updates of Content</li>
                                <li> News Display per Category</li>
                            </ul>
                            <!-- <a href="#" class="medium-btn2  btn btn-fill">Launch website</a>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Eagle News -->
    <!--Baydragon Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal2">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider">
                                <div id="carousel-bounding-box2">
                                    <div id="myCarousel2" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/baydragon/baydragon-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/baydragon/baydragon-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/baydragon/baydragon-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs2">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-0" class="carousel-selector selected"> <img src="images/portfolio/projects/baydragon/baydragon-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-1" class="carousel-selector"> <img src="images/portfolio/projects/baydragon/baydragon-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-2" class="carousel-selector"> <img src="images/portfolio/projects/baydragon/baydragon-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Baydragon Website</h2>
                                <p class="regular-text project-description">Baydragon Shipping Agency Corporation was established in the year 2012 with an aim to meet the increasing requirement of tramp principals in all trades with principal mindset focused on all ports in the Philippines. It is a privately owned and operated corporation that is dedicated to providing an exceptional level of service to its clients.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>WordPress</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> System Administration</li>
                                <li> A unique website with great user experience design.</li>
                                <li> Vessel Finder</li>
                                <li> News and Events Management</li>
                            </ul>
                            <a href="http://baydragonshipping.com/" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Baydragon Website -->

    <!--Eccler Design -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal3">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider2">
                                <div id="carousel-bounding-box3">
                                    <div id="myCarousel3" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/eccler/eccler-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/eccler/eccler-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/eccler/eccler-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs3">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-3" class="carousel-selector selected"> <img src="images/portfolio/projects/eccler/eccler-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-3" class="carousel-selector"> <img src="images/portfolio/projects/eccler/eccler-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-3" class="carousel-selector"> <img src="images/portfolio/projects/eccler/eccler-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">ECCler Website</h2>
                                <p class="regular-text project-description">CBCP – ECCler promotes the spiritual, intellectual and pastoral formation of the Clergy through ongoing formation programs/modules in the diocesan and national levels.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>WordPress</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Customer Login</li>
                                <li> System Administration</li>
                                <li> Document Sharing and Uploads</li>
                                <li> Profile</li>
                                <li> Contact Us Form</li>
                                <li> News and Announcement </li>
                            </ul>
                            <a href="https://eccler.org/" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Eccler Design -->

    <!--Iclaim Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal4">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider3">
                                <div id="carousel-bounding-box4">
                                    <div id="myCarousel4" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/iclaim/iclaim-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/iclaim/iclaim-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/iclaim/iclaim-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs4">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-4" class="carousel-selector selected"> <img src="images/portfolio/projects/iclaim/iclaim-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-4" class="carousel-selector"> <img src="images/portfolio/projects/iclaim/iclaim-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-4" class="carousel-selector"> <img src="images/portfolio/projects/iclaim/iclaim-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">i-CLAIM Asset Inventory System</h2>
                                <p class="regular-text project-description">Computerized Library of Assets and Inventory Management streamlines client’s operations by providing transparent and accurate inventory data.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>Codeigniter</li>
                                <li>PHP</li>
                                <li>JavaScript</li>
                                <li>JQuery</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> User Login</li>
                                <li> System Administration</li>
                                <li> Asset Library and Master List</li>
                                <li> Asset Inventory and Management System</li>
                                <li> Asset Transfers and Disposals</li>
                            </ul>
                            <!-- <a href="#" class="medium-btn2  btn btn-fill">Launch website</a>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Iclaim Website -->

    <!--Baylink Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal5">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider4">
                                <div id="carousel-bounding-box5">
                                    <div id="myCarousel5" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/baylink/baylink-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/baylink/baylink-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/baylink/baylink-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs5">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-5" class="carousel-selector selected"> <img src="images/portfolio/projects/baylink/baylink-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-5" class="carousel-selector"> <img src="images/portfolio/projects/baylink/baylink-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-5" class="carousel-selector"> <img src="images/portfolio/projects/baylink/baylink-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Baylink Website</h2>
                                <p class="regular-text project-description">Baylink Marine and Cargo Services Corporation has continuously grown to be one of the best cargo and marine survey services provider for foreign and local corporate.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>Codeigniter</li>
                                <li>PHP</li>
                                <li>JavaScript</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> User Login</li>
                                <li> Vessel Information Management</li>
                                <li> Schedule Management</li>
                                <li> Tally Sheet Management</li>
                                <li> Override Functionality</li>
                                <li> System Administration</li>
                                <li> Profile and Contact Us Form </li>
                            </ul>
                            <a href="http://www.baylinkmarine.com/" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Baylink Website -->

    <!--Isso Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal6">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider5">
                                <div id="carousel-bounding-box6">
                                    <div id="myCarousel" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/isso/isso-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/isso/isso-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/isso/isso-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs6">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-6" class="carousel-selector selected"> <img src="images/portfolio/projects/isso/isso-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-6" class="carousel-selector"> <img src="images/portfolio/projects/isso/isso-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-6" class="carousel-selector"> <img src="images/portfolio/projects/isso/isso-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">ISSO Website</h2>
                                <p class="regular-text project-description">ISSO Inc. renders cost-efficient, competent and strategic business solutions, such as management systems consulting, internal auditing, staff development, and personnel outsource services, which support and sustain both the profitability and social responsiveness of organizations from all sectors and industries.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>WordPress</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Profile</li>
                                <li> System Administration</li>
                                <li> Quick Quote Functionality </li>
                            </ul>
                            <a href="http://isso.com.ph/" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Isso Website -->

    <!-- Microsource Mobile App-->
    <!-- <div class="modal fade verticl-center-modal" id="FeaturedAppMobile" tabindex="-1" role="dialog" aria-labelledby="FeaturedAppMobile">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7"> -->
    <!-- main slider carousel -->
    <!-- <div id="slider4">
                                <div id="carousel-bounding-box5">
                                    <div id="myCarousel5" class="carousel slide myCarousel"> -->
    <!-- main slider carousel items -->
    <!-- <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/product-thumbnail/microsource-mobile-app/microsource-mobileapp-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/product-thumbnail/microsource-mobile-app/microsource-mobileapp-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/product-thumbnail/microsource-mobile-app/microsource-mobileapp-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs5"> -->
    <!-- thumb navigation carousel items -->
    <!-- <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-5" class="carousel-selector selected"> <img src="images/product-thumbnail/microsource-mobile-app/microsource-mobileapp-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-5" class="carousel-selector"> <img src="images/product-thumbnail/microsource-mobile-app/microsource-mobileapp-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-5" class="carousel-selector"> <img src="images/product-thumbnail/microsource-mobile-app/microsource-mobileapp-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Mobile Application</h2>
                                <p class="regular-text product-description">Investing in a mobile application is as vital now as having a website for business enterprises. We create mobile apps that are convenient to use, interactive, and can help in attracting potential clients. We develop customized apps perfect for both Android and/or iOS devices.</p>
                            </div>
                            <h3>Advantages:</h3>
                            <ul class="list-with-arrow">
                                <li> Works faster than websites</li>
                                <li> Provides easy access to your web page or software system anytime and anywhere.</li>
                                <li> Allows better personalized content and customized designs.</li>
                                <li> Helps in enhancing the visibility of your brand.</li>
                                <li> Offers both online and offline access.</li>
                            </ul> -->
    <!-- <a href="#" class="medium-btn2  btn btn-fill">Launch product</a>  -->
    <!-- </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--Vivo Mobile -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal13" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal12">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider0">
                                <div id="carousel-bounding-box">
                                    <div id="myCarousel1" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/vivo/vivo-mobile-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/vivo/vivo-mobile-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/vivo/vivo-mobile-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0" class="carousel-selector selected"> <img src="images/portfolio/projects/vivo/vivo-mobile-thumblist1.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1" class="carousel-selector"> <img src="images/portfolio/projects/vivo/vivo-mobile-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2" class="carousel-selector"> <img src="images/portfolio/projects/vivo/vivo-mobile-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">Vivo Mobile App</h2>
                                <p class="regular-text project-description">The time tracking system is an android based mobile application. This application is made of C# - Xamarin which retrieves the date and time (Google server time), current location (GPS longitude and latitude coordinates) and the device used (IMEI number) by the employee and allow them to login ONLY within the perimeter of their designated location</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Mobile Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>Xamarin</li>
                                <li>C#.Net</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Employee Login</li>
                                <li> Restricted Time Entry/Official Business Filing</li>
                                <li> Biometrics (Face/Fingerprint) Authentication </li>
                                <li> Assigning and Approving of Leave </li>
                                <li> Assigning and Approving of Overtime System Administration</li>
                            </ul>
                            <!-- <a href="#" class="medium-btn2  btn btn-fill">Launch website</a>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Vivo Mobile -->

    <!--Evftc fleet -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal7" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal7">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider5">
                                <div id="carousel-bounding-box6">
                                    <div id="myCarousel" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/evftcfleet/evftcfleet-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/evftcfleet/evftcfleet-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/evftcfleet/evftcfleet-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs6">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-6" class="carousel-selector selected"> <img src="images/portfolio/projects/evftcfleet/evftcfleet-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-6" class="carousel-selector"> <img src="images/portfolio/projects/evftcfleet/evftcfleet-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-6" class="carousel-selector"> <img src="images/portfolio/projects/evftcfleet/evftcfleet-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">EVFTC Fleet Management</h2>
                                <p class="regular-text project-description">EVFTC offer its clients the ability to manage all of their shipments and hauling needs in a cost and time effective manner by providing courteous drivers, efficient and dependable services.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>Codeinigter</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> User Login</li>
                                <li> System Administration</li>
                                <li> Vehicle Registration </li>
                                <li> Insurance Administration </li>
                                <li> Fleet Monitoring and Management</li>
                                <li> Financing and Amortization Management</li>
                                <li> Depreciation Schedule Management</li>
                            </ul>
                            <!-- <a href="#" class="medium-btn2  btn btn-fill">Launch website</a>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end ofEvftc fleet -->

    <!--Evftc Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal8" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal8">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider5">
                                <div id="carousel-bounding-box6">
                                    <div id="myCarousel" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/evftc/evftc-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/evftc/evftc-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/evftc/evftc-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs6">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-6" class="carousel-selector selected"> <img src="images/portfolio/projects/evftc/evftc-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-6" class="carousel-selector"> <img src="images/portfolio/projects/evftc/evftc-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-6" class="carousel-selector"> <img src="images/portfolio/projects/evftc/evftc-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">EVFTC Website</h2>
                                <p class="regular-text project-description">EVFTC Transport Inc. is a provider of delivery, hauling and trucking services in the Philippines. It has been in the business for 30 years and is looking to become one of the premier customer-centric trucking companies in the country.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Design and Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>Codeinigter</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Profile</li>
                                <li> Contact Us Form</li>
                                <li> News and Announcement</li>
                            </ul>
                            <a href="http://evftctransport.com/" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Evftc Website -->

    <!--Equis Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal10" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal10">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider5">
                                <div id="carousel-bounding-box6">
                                    <div id="myCarousel" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/equis/equis-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/equis/equis-details1.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/equis/equis-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs6">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-6" class="carousel-selector selected"> <img src="images/portfolio/projects/equis/equis-thumblist1.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-6" class="carousel-selector"> <img src="images/portfolio/projects/equis/equis-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-6" class="carousel-selector"> <img src="images/portfolio/projects/equis/equis-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">EQUIS Notification System</h2>
                                <p class="regular-text project-description">Founded in 2010, Equis is an Asian energy and infrastructure specialist. Equis is built on the belief that an Asia-based independent fund manager will generate unique and proprietary investment opportunities for investors in an aligned, value enhancing manner.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>Codeigniter</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Users Login</li>
                                <li> System Administration</li>
                                <li> Schedule Management</li>
                                <li> Notification Management</li>
                                <li> E-mail Management</li>
                                <li> Document Uploads</li>
                            </ul>
                            <!-- <a href="#" class="medium-btn2  btn btn-fill">Launch website</a>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Equis Website -->
    <!--Ipled Website -->
    <div class="modal fade verticl-center-modal" id="portfolioDetModal11" tabindex="-1" role="dialog" aria-labelledby="portfolioDetModal11">
        <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cross-circle"></span></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- main slider carousel -->
                            <div id="slider5">
                                <div id="carousel-bounding-box6">
                                    <div id="myCarousel" class="carousel slide myCarousel">
                                        <!-- main slider carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item" data-slide-number="0">
                                                <img src="images/portfolio/projects/ipled/ipled-details.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="1">
                                                <img src="images/portfolio/projects/ipled/ipled-details2.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div class="item" data-slide-number="2">
                                                <img src="images/portfolio/projects/ipled/ipled-details3.jpg" alt="images" class="img-responsive">
                                            </div>
                                            <div id="slider-thumbs6">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">
                                                    <li>
                                                        <a id="carousel-selector-0-6" class="carousel-selector selected"> <img src="images/portfolio/projects/ipled/ipled-thumblist.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-1-6" class="carousel-selector"> <img src="images/portfolio/projects/ipled/ipled-thumblist2.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                    <li>
                                                        <a id="carousel-selector-2-6" class="carousel-selector"> <img src="images/portfolio/projects/ipled/ipled-thumblist3.jpg" class="img-responsive" alt=""> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="port-modal-content">
                                <h2 class="b-clor">IPLED Website</h2>
                                <p class="regular-text project-description">The Indigenous Peoples Leadership &amp; Enterprise Development (IP LED) Academy is a leadership and capacity building program which hopes to respond to the growing need of creating sustainable development and mechanism for Indigenous Peoples communities in the Philippines.</p>
                            </div>
                            <h4>Project Type:</h4>
                            <ul class="list-with-arrow">
                                <li> Web Application Development</li>
                            </ul>
                            <h4>Technology:</h4>
                            <ul class="list-with-arrow">
                                <li>WordPress</li>
                                <li>PHP</li>
                                <li>MySQL</li>
                            </ul>
                            <h4>Features:</h4>
                            <ul class="list-with-arrow">
                                <li> Animated Banner</li>
                                <li> Product Catalog</li>
                                <li> Product Advertisement and Product Tagging</li>
                                <li> Feature Stories/Articles</li>
                                <li> Link to Partners</li>
                                <li> Contact Us </li>
                                <li> Auto Response Functionality </li>
                                <li> Social Media Integration </li>
                            </ul>
                            <!--<a href="http://www.ip-led.ph/" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of Ipled Website -->
    <!--end portfolio details modal-->
    <!-- ++++ Javascript libraries ++++ -->
    <!--js library of jQuery-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!--custom js-->
    <script type="text/javascript" src="js/script.js"></script>
    <!--js library of bootstrap-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!--js library for number counter-->
    <script src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
    <!--js library for video popup-->
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <!-- js library for owl carousel -->
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <!--modernizer library-->
    <script type="text/javascript" src="js/modernizr.js"></script>
    <!--js library for category filter -->
    <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="js/isotope.min.js"></script>
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
</body>

</html>