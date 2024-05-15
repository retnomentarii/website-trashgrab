<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trash Grab - Pengepul Sampah Sat Set</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    
    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="main.php" class="navbar-brand">
                    <img class="img-fluid" src="img/logo.png" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="main.php" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="kardus.html" class="dropdown-item">Limbah Kardus</a>
                                <a href="kertas.html" class="dropdown-item">Limbah Kertas</a>
                                <a href="kaca.html" class="dropdown-item">Limbah Kaca</a>
                                <a href="plastik.html" class="dropdown-item">Limbah Plastik</a>
                                <a href="kaleng.html" class="dropdown-item">Limbah Kaleng</a>
                                <a href="besi.html" class="dropdown-item">Limbah Besi</a>
                            </div>
                        </div>
                        <a href="../login.php" class="nav-item nav-link">Sign In Now</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/tpa.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Welcome to <strong class="text-dark">Trash Grab</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Siap Menjemput Sampah Daur Ulangmu</h1>
                                    <a href="#about" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="img/sampah2.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="img/sampah3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="img/sampah4.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="img/sampah2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Mengenal Trash Grab</p>
                        <h1 class="display-6">Latar belakang dan tujuan dikembangkannya Trash Grab</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="img/sampah5.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Trash Grab hadir untuk membantu pendistribusian sampah daur ulang</h5>
                            <p class="mb-0">Diciptakannya Trash Grab bertujuan untuk mempermudah distribusi sampah dari masyarakat ke pengepul. Trash Grab berperan sebagai jembatan antara pemroduksi sampah dan pengepul sampah. </p>
                        </div>
                    </div>
                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Trash Grab sebagai solusi untuk meminimalisir penimbunan sampah</h5>
                            <p class="mb-0">Dilansir dari data Kementerian Lingkungan Hidup dan Kehutanan, produksi sampah di Indonesia mencapai 67,8 juta ton/tahun dan 17,5 juta tonnya tidak terkelola dengan baik. Melalui Trash Grab, Developer berharap dapat membantu masyarakat dalam mengelola sampah di lingkungan sekitarnya.</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="img/sampah6.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Kenali Jenis Limbah </p>
                <h1 class="display-6">Tidak semua limbah dapat didaur ulang, berikut limbah-limbah yang dapat didaur ulang</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <a href="kardus.html" class="d-block product-item rounded">
                    <img src="img/limbah1.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Limbah Kardus</h4>
                        <span class="text-body">Limbah kardus merupakan hasil dari kemasan barang-barang berbahan dasar kertas namun lebih tebal</span>
                    </div>
                </a>
                <a href="kertas.html" class="d-block product-item rounded">
                    <img src="img/limbah2.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Limbah Kertas</h4>
                        <span class="text-body">Limbah kertas adalah hasil dari pemakaian dan pembuangan kertas bekas seperti kertas koran, kertas printer, dll.</span>
                    </div>
                </a>
                <a href="kaca.html" class="d-block product-item rounded">
                    <img src="img/limbah3.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Limbah Kaca</h4>
                        <span class="text-body">Limbah kaca berasal dari pecahan atau kemasan botol, gelas, dan wadah lain yang terbuat dari material kaca</span>
                    </div>
                </a>
                <a href="plastik.html" class="d-block product-item rounded">
                    <img src="img/limbah4.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Limbah Plastik</h4>
                        <span class="text-body">Limbah plastik adalah salah satu jenis limbah paling umum yang dihasilkan oleh aktivitas manusia, terutama dari kemasan.</span>
                    </div>
                </a>
                <a href="kaleng.html" class="d-block product-item rounded">
                    <img src="img/limbah5.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Limbah Kaleng</h4>
                        <span class="text-body">Limbah kaleng merupakan wadah atau kemasan dari logam yang umumnya digunakan untuk minuman dan makanan</span>
                    </div>
                </a>
                <a href="besi.html" class="d-block product-item rounded">
                    <img src="img/limbah6.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Limbah Besi</h4>
                        <span class="text-body">Limbah besi terdiri dari material logam yang terutama terdiri dari besi, seperti bekas pembangunan/industri/lainnya.</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Products End -->



        <!-- Layanan Start -->
        <div class="container-xxl contact py-5">
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-primary">Narahubung</p>
                    <h1 class="display-6">Ada pertanyaan atau komplain? Bisa menghubungi kontak di bawah ini</h1>
                </div>
                <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                                <div class="btn-square mx-auto mb-3">
                                    <i class="fa fa-envelope fa-2x text-white"></i>
                                </div>
                                <p class="mb-2">Email</p>
                                <p class="mb-0">officialtrashgrab@gmail.com</p>
                            </div>
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                                <div class="btn-square mx-auto mb-3">
                                    <i class="fa fa-phone fa-2x text-white"></i>
                                </div>
                                <p class="mb-2">Telepon</p>
                                <p class="mb-0">+62821 3929 6103</p>
                            </div>
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                                <div class="btn-square mx-auto mb-3">
                                    <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                                </div>
                                <p class="mb-2">Lokasi Utama</p>
                                <p class="mb-0">Jl. Dr. Ir. H. Soekarno, Mulyorejo, Surabaya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Start -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-white">Developer</p>
                <h1 class="display-6">Let's Meet Our Developer</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/developer1.jpeg" alt="">
                        <div class="text-start ms-3">
                            <h5>Bingar Kenaya</h5>
                            <span class="text-primary">187221012</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/developer2.jpeg" alt="">
                        <div class="text-start ms-3">
                            <h5>Retno Mentari</h5>
                            <span class="text-primary">187221012</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Dr. Ir. H. Soekarno, Mulyorejo, Surabaya</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+62821 3929 6103</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>officialtrashgrab@gmail.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="main.php">Home</a>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="../login.php">Sign In</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">Business Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">Trash Grab</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>