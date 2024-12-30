<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-3 py-3 py-lg-0 mb-5">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <h1 class="m-0">
                <i><img src="{{ asset('img/dkp_mks.png') }}" style="width: 70px;" alt=""></i> DKP
            </h1>
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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bidang</a>
                    <div class="dropdown-menu m-0">
                        <a href="#" class="dropdown-item">Bidang Kerawanan, Distribusi dan Cadangan Pangan</a>
                        <a href="{{ route('master.halamanbidang') }}" target="_blank" class="dropdown-item">Bidang Ketersediaan dan
                            Produksi Pangan</a>
                        <a href="#" class="dropdown-item">Bidang Penganekaragaman dan Konsumsi Pangan</a>
                        <a href="#" class="dropdown-item">Bidang Keamanan</a>
                    </div>
                </div>
                <a href="{{ route('pengumuman.lengkap') }}" class="nav-item nav-link">Pengumuman</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Publik</a>
                    <div class="dropdown-menu m-0">
                        @foreach ($informasiPublik as $info)
                            <a href="{{ route('infopublik.show', $info->slug) }}"
                                class="dropdown-item">{{ $info->nama }}</a>
                        @endforeach
                        <a href="{{ route('infopublik.reg-psat') }}" class="dropdown-item">Registrasi PSAT - PDUK</a>
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
</div>
<!-- Navbar End -->
