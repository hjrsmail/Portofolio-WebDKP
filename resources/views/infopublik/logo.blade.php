<x-layout>
    <!-- About Start -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="img-fluid" style="text-align:center;">
                <img src="{{ asset('storage/' . $image->image_url) }}" alt="logo" style="max-width: 40%; height: auto;">
            </div>
        </div>
    </div>
    <!-- About End -->
</x-layout>
