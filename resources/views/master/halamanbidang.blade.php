{{-- (@dd($vendors)) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Selamat Datang di Website Dinas Ketahanan Pangan Kota Makassar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.54.0/apexcharts.min.css"
        integrity="sha512-a+TagZggv1pq6n/4xBSDjlpi8MQMsH0OAF2rlFOKifNKlAjk30uAg/EJeRBuL76Zq4dYLHa0ezegidxDgHzjMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- Topbarr -->
    <x-topbar></x-topbar>


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-2 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="m-0"><i> <img src="{{ asset('img/dkp_mks.png') }}" style="width: 70px;" alt="">
                    </i>DKP</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('infopublik.sejarah') }}" class="dropdown-item">Sejarah</a>
                            <a href="{{ route('infopublik.visimisi') }}" class="dropdown-item">Visi-Misi</a>
                            <a href="{{ route('infopublik.tugasfungsi') }}" class="dropdown-item">Tugas dan Fungsi</a>
                            <a href="{{ route('infopublik.logo') }}" class="dropdown-item">Logo</a>
                            <a href="{{ route('infopublik.struktur-organisasi') }}" class="dropdown-item">Struktur
                                Organisasi</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Bidang</a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Bidang Kerawanan, Distribusi dan Cadangan Pangan</a>
                            <a href="{{ route('master.halamanbidang') }}" class="dropdown-item">Bidang Ketersediaan dan
                                Produksi Pangan</a>
                            <a href="#" class="dropdown-item">Bidang Penganekaragaman dan Konsumsi Pangan</a>
                            <a href="#" class="dropdown-item">Bidang Keamanan</a>
                        </div>
                    </div>
                    <a href="{{ route('pengumuman.lengkap') }}" class="nav-item nav-link">Pengumuman</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi
                            Publik</a>
                        <div class="dropdown-menu m-0">
                            @foreach ($informasiPublik as $info)
                                <a href="{{ route('infopublik.show', $info->slug) }}"
                                    class="dropdown-item">{{ $info->nama }}</a>
                            @endforeach
                            <a href="{{ route('infopublik.reg-psat') }}" class="dropdown-item">Registrasi PSAT -
                                PDUK</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Aplikasi DKP</a>
                        <div class="dropdown-menu m-0">
                            <a href="https://play.google.com/store/apps/details?id=com.assipadkp&pcampaignid=web_share"
                                class="dropdown-item">ASSIPA App Mobile</a>
                            <a href="#" class="dropdown-item">ITATA</a>
                        </div>
                    </div>

                </div>
                <a href="/admin/login" target="_blank" class="btn btn-primary py-2 px-4 ms-3">Login</a>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/banner.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h3 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang</h3>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Bidang Ketersediaan dan <br>
                                Produksi Pangan</h1>
                            <a href="#"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/banner.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Bidang Ketersediaan dan <br>
                                Produksi Pangan</h1>
                            <a href="#footer"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    {{-- Charttt --}}
    @yield('content')


    <!-- Vendorr -->
    @component('components.vendor', ['vendors' => $vendors])
    @endcomponent

    <!-- Footer -->
    <x-footer></x-footer>



    <!-- Back to Top -->
    <a href="" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.54.0/apexcharts.min.js"
        integrity="sha512-fsEkf13FMKFZJA3KF4dm/lzU8si2ZXSXwc35yjU+kP0VJiLkbmIBpqIq+4EWcoOO12+UZ1klbynmnjMqFADqUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
