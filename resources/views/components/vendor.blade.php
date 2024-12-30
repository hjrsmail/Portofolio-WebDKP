<!-- Vendor Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                @foreach($vendors as $vendor)
                    <img class="vendor-logo" src="{{ asset('storage/' . $vendor->logo) }}" alt="{{ $vendor->name }}">
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->