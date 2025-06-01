<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $announcement->title }}</title>

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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }

        .text-muted {
            color: #6c757d !important;
        }

        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .news-description-n {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;

        }


        img {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        small {
            font-size: 0.9rem;
            color: #aaa;
        }
    </style>

</head>

<body>

    <x-topbar></x-topbar>

    <x-t-navbar></x-t-navbar>
    <main>
        <div class="container py-4">
            <button class="btn btn-back mb-4" onclick="history.back()">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </button>

            <h1 class="mb-4">{{ $announcement->title }}</h1>
            <small>Dipublikasikan tanggal
                {{ \Carbon\Carbon::parse($announcement->publication_date)->format('d M Y') }}</small>
            <hr>
            <div class="news-description-n" style="text-align: justify !important;">{!! nl2br($announcement->description) !!}</div>
        </div>
    </main>

    <x-footer></x-footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
