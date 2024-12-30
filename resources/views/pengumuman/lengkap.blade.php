<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Ketahanan Pangan Kota Makassar - Pengumuman</title>

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
        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }

        body {
            background-color: #f8f9fa;
        }

        .news-card {
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .news-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }

        .news-image {
            height: 220px;
            object-fit: cover;
            transition: opacity 0.3s;
        }

        .news-card:hover .news-image {
            opacity: 0.85;
        }

        .card-title a {
            color: #333;
            text-decoration: none;
        }

        .card-title a:hover {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <x-topbar></x-topbar>

    <x-t-navbar></x-t-navbar>

    <main>
        <div class="container py-5">
            <h1 class="text-center mb-5">Pengumuman Terbaru</h1>

            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('pengumuman.lengkap') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Pengumuman..." name="search"
                        value="{{ $search_keyword }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

            <!-- Kartu Announcements -->
            <div class="row">
                @forelse ($announcements as $announcement)
                    <div class="col-md-4 mb-4">
                        <div class="card announcement-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a
                                        href="{{ route('pengumuman.detail', $announcement->slug) }}">{{ $announcement->title }}</a>
                                </h5>
                                <p class="card-text">
                                    {{ Str::limit($announcement->description, 100, '...') }}
                                </p>
                            </div>
                            <div
                                class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <span class="text-muted me-2"><i class="fas fa-eye"></i>
                                        {{ $announcement->views }}</span>
                                    {{ \Carbon\Carbon::parse($announcement->publication_date)->format('d M Y') }}
                                </small>
                                <a href="{{ route('pengumuman.detail', $announcement->slug) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Selengkapnya
                                </a>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-center">Tidak ada Pengumuman ditemukan.</p>
                @endforelse
            </div>

            <!-- Navigasi Pagination -->
            <div class="mt-4">
                {{ $announcements->links() }} <!-- Pagination links -->
            </div>
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
