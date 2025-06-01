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
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        @keyframes moveLeft {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .moving-text {
            animation: moveLeft 40s linear infinite;
        }
    </style>

</head>

<body>

    <!-- Topbarr -->
    <x-topbar></x-topbar>


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-2 py-3 py-lg-1">
            <a href="/" class="navbar-brand">
                <h1 class="m-0"><i> <img src="{{ asset('img/dkp_mks.png') }}" style="width: 70px;" alt="">
                    </i>DKP</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bidang</a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Bidang Kerawanan, Distribusi dan Cadangan Pangan</a>
                            <a href="{{ route('master.halamanbidang') }}" target="_blank" class="dropdown-item">Bidang
                                Ketersediaan dan
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
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/banner.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h3 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang</h3>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Dinas Ketahanan Pangan <br> Kota
                            Makassar</h1>
                        <a href="#footer" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact
                            Us</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/banner.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h3 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang</h3>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Dinas Ketahanan Pangan <br> Kota
                            Makassar</h1>
                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact
                            Us</a>
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


    <!-- Facts -->
    <div class="container py-0 pt-lg-0 facts">
        <div class="row gx-0">
            <div class="col-12 justify-content-center d-flex p-2" style="background-color: #091E3E;">
                <h2 class="align-items-center text-white">PROGRAM PRIORITAS</h2>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4 mb-1"
                    style="height: 150px;">
                    <img src="{{ asset('img/shieldleaf.png') }}" alt="">
                    <div class="ps-4">
                        <h5 class="text-white mb-0">Diversifikasi dan Ketahanan Pangan</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4 mb-1"
                    style="height: 150px;">
                    <img src="{{ asset('img/shieldeye.png') }}" alt="">
                    <div class="ps-4">
                        <h5 class="text-white mb-0">Pengawasan Keamanan Pangan</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4 mb-1"
                    style="height: 150px;">
                    <img src="{{ asset('img/shieldhand.png') }}" alt="">
                    <div class="ps-4">
                        <h5 class="text-white mb-0">Penanganan Kerawanan Pangan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Charttt --}}
    <div class="chart container-fluid p-0 ">
        <div class="card border-0 rounded-0 shadow-sm m-0">
            <div id="priceTicker "
                style="background-color: #091E3E; color: white; padding: 10px; white-space: nowrap; overflow: hidden;">
                <div id="priceContent" style="display: inline-block; white-space: nowrap;"></div>
            </div>
        </div>
    </div>


    {{-- Newss --}}
    <div class="container-fluid py-3">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                <h1 class="">BERITA TERKINI</h1>
            </div>

            <div class="owl-carousel testimonial-carousel">
                @forelse($beritas as $item)
                    <div class="news-card">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar Berita" class="news-image">
                        <div class="news-date">
                            <span>{{ date('d', strtotime($item->date)) }}</span>
                            <span>{{ date('M', strtotime($item->date)) }}</span>
                        </div>
                        <div class="news-content">
                            <h4 class="news-title">
                                <a href="{{ route('berita.detail', $item->slug) }}">{{ $item->title }}</a>
                            </h4>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada berita.</p>
                @endforelse
            </div>

            <div class="text-center mt-2">
                <a class="btn btn-lg btn-primary rounded" href="{{ route('berita.lengkap') }}">SELENGKAPNYA <i
                        class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>


    {{-- Galeri --}}
    <div class="container-fluid py-3">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h1 class="mb-0">Galeri DKP</h1>
            </div>
            <div class="row g-3">
                @forelse ($galleries ->take(6) as $item)
                    <div class="col-lg-4 col-md-6">
                        <div
                            class="service-item rounded d-flex flex-column align-items-center justify-content-center text-center p-4">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="img-fluid mb-3 gallery-rounded-image" alt="Gambar Galeri">
                            <p class="m-0">{{ $item->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Tidak ada gambar di galeri.</p>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-lg btn-primary rounded" href="{{ route('galeri.lengkap') }}">
                    SELENGKAPNYA
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>


    <!-- Media Start -->
    <div class="container-fluid py-3" id="media-section">
        <div class="container py-3">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h1 class="mb-0">Media</h1>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8 mx-auto">
                    <!-- Video Utama -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="100%" height="100px"
                            src="https://www.youtube.com/embed/UXeLbemn3oU?si=fA1hiBlDqn5Fljqd&amp;start=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>

                <!-- Thumbnail Video Lainnya -->
                <div class="col-lg-6 col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="100%" height="100px"
                            src="https://www.youtube.com/embed/UXeLbemn3oU?si=fA1hiBlDqn5Fljqd&amp;start=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="100%" height="100px"
                            src="https://www.youtube.com/embed/UXeLbemn3oU?si=fA1hiBlDqn5Fljqd&amp;start=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <script>
        @if (isset($averagePrices) && $averagePrices->isNotEmpty())
            window.averagePricesData = @json($averagePrices);

            const averagePricesByFood = {};
            window.averagePricesData.forEach(item => {
                const key = item.name; // Gunakan hanya name karena unit sudah disertakan di name_with_unit
                if (!averagePricesByFood[key]) {
                    averagePricesByFood[key] = [];
                }
                averagePricesByFood[key].push({
                    price: parseFloat(item.average_price),
                    unit: item.unit // Ambil unit dari item
                });
            });

            const averagePricesResult = {};
            Object.keys(averagePricesByFood).forEach(key => {
                const pricesForFood = averagePricesByFood[key].slice(-12);
                if (pricesForFood.length > 0) {
                    const total = pricesForFood.reduce((sum, priceData) => sum + priceData.price, 0);
                    const averagePrice = Math.round(total / pricesForFood.length);
                    const unit = pricesForFood[0].unit; // Ambil unit dari data pertama
                    averagePricesResult[key] = `Rp${averagePrice.toLocaleString()} /${unit}`;
                }
            });

            const priceData = Object.keys(averagePricesResult)
                .map(food => `<strong>${food}</strong>: ${averagePricesResult[food]}`)
                .join('  &nbsp;  &nbsp; &nbsp;| &nbsp;  &nbsp;  &nbsp; ');

            const priceContent = document.getElementById('priceContent');
            priceContent.innerHTML = priceData;
            priceContent.classList.add('moving-text');
        @else
            console.error('Data averagePrices tidak tersedia.');
            document.getElementById('priceTicker').innerHTML = '<p>Data tidak tersedia untuk ticker harga.</p>';
        @endif
    </script>



    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
