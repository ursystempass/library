<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="codepixer">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>{{ $setting->name }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="{{ $setting->image }}" alt="" title="" style="max-width:50px;" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#home">Beranda</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#fact">Fakta</a>   </li>
                        <li><a href="/login">Masuk</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class="banner-area" id="home">
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-start">
            <div class="banner-content col-lg-7">
                <h1 class="text-uppercase">
                    {{ $setting->name }}
                </h1>
                @if (Auth::check())
                    <a href="/catalog" class="primary-btn text-uppercase">Pinjam Buku</a>
                @else
                    <a href="/login" class="primary-btn text-uppercase">Pinjam Buku</a>
                @endif
            </div>
            <div class="col-lg-5 banner-right">
                <img class="img-fluid" src="img/header-img.png" alt="">
            </div>
        </div>
    </div>
</section>


    <!-- Tentang Kami Section -->
    <section class="section-gap info-area" id="about">
    <div class="container">
        <div class="single-info row mt-40 align-items-center">
            <div class="col-lg-6 col-md-12 text-center no-padding info-left">
                <div class="info-thumb">
                    <!-- Placeholder gambar buku -->
                    <img src="{{ $setting->image }}" class="img-fluid info-img" alt="Buku">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 no-padding info-right">
                <div class="info-content">
                    <h2 class="pb-30">    {{ $setting->name }}
                    </h2>
                    <p>
                        {{ $setting->desc }}
                    </p>
                    <br>
                    {{-- <p>
                        {{ $setting->name }}
                    </p> --}}
                    <br>
                    <img src="img/signature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Fakta Section -->
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

    <!-- Bagian Penghitung -->
    <section class="counter-area">
    <div class="container">
        <div class="row justify-content-center"> <!-- Pusatkan ke tengah -->
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
                    <p>Anggota</p>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Bagian Footer -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>Tentang Kami</h4>
                    <p>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>Berlangganan</h4>
                    <p>Anda bisa percaya pada kami. Kami hanya menerima kritik dan saran anda.</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank" action="#" method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Alamat Email Anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email Anda '" required="" type="email">
                            <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>Feed Instagram</h4>
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
                    <h4>Ikuti Kami</h4>
                    <p>Ayo kita sosial</p>
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
                    <!-- Tautan kembali ke Colorlib tidak bisa dihapus. Template dilisensikan di bawah CC BY 3.0. -->
                    Dibuat dengan <i class="fa fa-heart-o" aria-hidden="true"></i> oleh <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Tautan kembali ke Colorlib tidak bisa dihapus. Template dilisensikan di bawah CC BY 3.0. -->
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
