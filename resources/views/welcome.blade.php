<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Book</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Custom CSS for changing theme -->
    <style>
        /* Changing theme to gradasi biru dan ungu */
        .banner-area {
            background: linear-gradient(to bottom, #4e54c8, #8f94fb);
        }
        .primary-btn {
            background-color: #9b59b6;
            border-color: #9b59b6;
        }

        .single-testimonial.item {
    margin-right: 20px; /* Menambahkan margin kanan */
}

/* Untuk menghindari margin pada elemen terakhir */
.single-testimonial.item:last-child {
    margin-right: 0;
}

    </style>
</head>
<body>
    <!-- Header -->
    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#fact">Fact</a></li>
                        <li><a href="#price">Login</a></li>
                        <li><a href="#course">Course</a></li>
                        <li class="menu-has-children"><a href="">Pages</a>
                            <ul>
                                <li><a href="generic.html">Generic</a></li>
                                <li><a href="elements.html">Elements</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header>

    <!-- Banner Section -->
    <section class="banner-area" id="home">
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-start">
            <div class="banner-content col-lg-7">
                <h1 class="text-uppercase">
                    Millenium Library
                </h1>
                @if (Auth::check())
                    <a href="/catalog" class="primary-btn text-uppercase">Pinjam Sekarang</a>
                @else
                    <a href="/login" class="primary-btn text-uppercase">Pinjam Sekarang</a>
                @endif
            </div>
            <div class="col-lg-5 banner-right">
                <img class="img-fluid" src="img/header-img.png" alt="">
            </div>
        </div>
    </div>
</section>


    <!-- About Section -->
    <section class="section-gap info-area" id="about">
    <div class="container">
        <div class="single-info row mt-40 align-items-center">
            <div class="col-lg-6 col-md-12 text-center no-padding info-left">
                <div class="info-thumb">
                    <!-- Gambar placeholder buku -->
                    <img src="https://via.placeholder.com/400" class="img-fluid info-img" alt="Buku">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 no-padding info-right">
                <div class="info-content">
                    <h2 class="pb-30">PERPUSTAKAAN SMK NEGERI 1 CIBINONG</h2>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.
                    </p>
                    <br>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.
                    </p>
                    <br>
                    <img src="img/signature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Fact Section -->
    <section class="fact-area relative section-gap" id="fact">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Data Perpustakaan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="counter-area">
    <div class="container">
        <div class="row justify-content-center"> <!-- Mengatur posisi ke tengah -->
            <div class="col-lg-3 col-md-6">
                <div class="single-counter">
                    <h1 class="counter">2536</h1>
                    <p>Buku</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counter">
                    <h1 class="counter">6784</h1>
                    <p>Peminjaman Buku</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counter">
                    <h1 class="counter">1059</h1>
                    <p>Member</p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Course Section -->
    <section class="course-area section-gap" id="course">
    <div class="container text-center">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8 offset-lg-2 text-center"> <!-- Menambahkan kelas text-center di sini -->
                <div class="title text-center">
                    <h1 class="mb-10">Buku Favorit</h1> <!-- Menghapus kelas text-center -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 single-course">
                <div class="thumb">
                    <img class="img-fluid" src="img/c1.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Learn Designing</h4></a>
                <p>
                    inappropriate behavior
                </p>
                <div class="meta-bottom d-flex justify-content-start">
                    <p><span class="lnr lnr-user"></span> 5620</p>
                    <p><span class="lnr lnr-bubble"></span> 06</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single-course">
                <div class="thumb">
                    <img class="img-fluid" src="img/c2.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Learn React basics</h4></a>
                <p>
                    inappropriate behavior
                </p>
                <div class="meta-bottom d-flex justify-content-start">
                    <p><span class="lnr lnr-user"></span> 5620</p>
                    <p><span class="lnr lnr-bubble"></span> 06</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single-course">
                <div class="thumb">
                    <img class="img-fluid" src="img/c3.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Learn Photography</h4></a>
                <p>
                    inappropriate behavior
                </p>
                <div class="meta-bottom d-flex justify-content-start">
                    <p><span class="lnr lnr-user"></span> 5620</p>
                    <p><span class="lnr lnr-bubble"></span> 06</p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Testimonial Section -->
    <section class="testomial-area section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Pengurus Perpustakaan</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="active-testimonial-carusel d-flex justify-content-around">
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="img/t1.png" alt="">
                        <h4>Bu Yeni</h4>
                        <p>Kepala Perpustakaan</p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="img/t2.png" alt="">
                        <h4>Bu Erna</h4>
                        <p>Pengurus Perpustakaan 1</p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="img/t3.png" alt="">
                        <h4>Bu Dian</h4>
                        <p>Pengurus Perpustakaan 2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Contact Section -->
    <section class="contact-area section-gap" id="contact">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">If you need, Just drop us a line</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <form class="form-area mt-60" id="myForm" action="mail.php" method="post" class="contact-form text-right">
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                        <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
                        <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
                    </div>
                    <div class="col-lg-6 form-group">
                        <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert-msg" style="text-align: left;"></div>
                        <button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>About Us</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers, not a single spam.</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank" action="#" method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
                            <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>Instagram Feed</h4>
                    <div class="instafeed d-flex flex-wrap">
                        <a href="#"><img src="img/i1.jpg" alt=""></a>
                        <a href="#"><img src="img/i2.jpg" alt=""></a>
                        <a href="#"><img src="img/i3.jpg" alt=""></a>
                        <a href="#"><img src="img/i4.jpg" alt=""></a>
                        <a href="#"><img src="img/i5.jpg" alt=""></a>
                        <a href="#"><img src="img/i6.jpg" alt=""></a>
                        <a href="#"><img src="img/i7.jpg" alt=""></a>
                        <a href="#"><img src="img/i8.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>Follow Us</h4>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
