<x-s-layout>
    <!-- Content Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <embed src="{{ Storage::url($info->file_path) }}" width="100%" height="900px"></embed>
        </div>
    </div>
    <!-- Content End -->
</x-s-layout>
