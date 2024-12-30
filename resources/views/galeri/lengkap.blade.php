<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Selamat Datang di Website Dinas Ketahanan Pangan Kota Makassar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon" type="image/x-icon">

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

    <style>
        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Kartu galeri dengan batasan proporsi dan padding */
        .gallery-card {
            background-color: #f8f9fa;
            transition: transform 0.3s;
        }

        .gallery-card:hover {
            transform: scale(1.03);
            /* Efek zoom saat hover */
        }

        /* Menjamin semua gambar memiliki ukuran sama */
        .gallery-image {
            width: 100%;
            /* Gambar memenuhi kontainer */
            height: 300px;
            /* Atur tinggi agar konsisten */
            object-fit: cover;
            /* Gambar tetap proporsional */
            border-radius: 8px;
            /* Sudut sedikit membulat */
        }
    </style>

</head>

<body>
    <!-- Topbarr -->
    <x-topbar></x-topbar>

    <!-- Navbar Start -->
    <x-t-navbar></x-t-navbar>

    <main>
        <div class="container py-5">
            <h1 class="text-center mb-5">Galeri Lengkap</h1>
            <div class="row g-3">
                @forelse ($galleries as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-card rounded overflow-hidden shadow-sm">
                            <img src="{{ asset('storage/' . $item->image) }}" class="gallery-image img-fluid">
                        </div>
                    </div>
                @empty
                    <p class="text-center">Tidak ada gambar di galeri.</p>
                @endforelse
            </div>
        </div>
    </main>



    <!-- Footer -->
    <x-footer></x-footer>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

</body>

</html>
