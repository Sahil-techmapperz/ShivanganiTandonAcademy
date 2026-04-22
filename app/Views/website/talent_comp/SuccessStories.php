<?php
// If not passed from controller, fetch it (defensive)
if (!isset($testimonials)) {
    $testModel = new \App\Models\TestimonialModel();
    $testimonials = $testModel->orderBy('created_at', 'DESC')->findAll();
}
?>

<section class="bg-slate-50 py-16 sm:py-24 font-poppins overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-16">
            <span class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium text-sm px-5 py-1.5 rounded-full mb-4 shadow-sm">
                Success Stories
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#161439] mb-4 tracking-tight">
                Our Students Testimonial Videos
            </h2>
            <div class="w-24 h-1.5 bg-[#FE002A] mx-auto rounded-full opacity-20"></div>
        </div>

        <?php 
        $featured = array_slice($testimonials, 0, 2);
        $others = array_slice($testimonials, 2);
        ?>

        <!-- Featured Row (2 Large) -->
        <div class="row g-4 mb-4">
            <?php foreach ($featured as $item): ?>
            <div class="col-md-6 mb-4">
                <div onclick="openTestimonialVideo('<?= $item['youtube_id']; ?>')"
                    class="group relative cursor-pointer rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 bg-white h-full">
                    
                    <div class="relative aspect-video overflow-hidden">
                        <img src="<?= base_url($item['thumbnail']) ?>" 
                             alt="<?= $item['student_name']; ?>"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-colors duration-500 flex items-center justify-center">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 transform transition-all duration-500 group-hover:scale-110 group-hover:bg-[#FE002A] group-hover:border-[#FE002A]">
                                <i class="fas fa-play text-white text-2xl translate-x-1"></i>
                            </div>
                        </div>

                        <div class="absolute bottom-6 left-6 right-6 translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="bg-white/95 backdrop-blur px-5 py-3 rounded-2xl shadow-xl border border-white/50">
                                <p class="text-[#161439] font-extrabold text-lg mb-0"><?= $item['student_name']; ?></p>
                                <p class="text-[#FE002A] text-xs font-bold uppercase tracking-widest mb-0">Student Success Story</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Others Row (3 Small) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($others as $item): ?>
                <div onclick="openTestimonialVideo('<?= $item['youtube_id']; ?>')"
                    class="group relative cursor-pointer rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 bg-white">
                    
                    <div class="relative aspect-video overflow-hidden">
                        <img src="<?= base_url($item['thumbnail']) ?>" 
                             alt="<?= $item['student_name']; ?>"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-500 flex items-center justify-center">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 transform transition-all duration-500 group-hover:scale-110 group-hover:bg-[#FE002A] group-hover:border-[#FE002A]">
                                <i class="fas fa-play text-white text-sm translate-x-0.5"></i>
                            </div>
                        </div>

                        <div class="absolute bottom-3 left-3 right-3 translate-y-1 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="bg-white/90 backdrop-blur px-3 py-2 rounded-lg shadow-lg">
                                <p class="text-[#161439] font-bold text-xs mb-0"><?= $item['student_name']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- BUTTON -->
        <div class="mt-20 flex justify-center">
            <button class="group relative bg-[#5751E1] text-white px-12 py-4 rounded-full font-bold overflow-hidden transition-all duration-300 shadow-[0_10px_20px_rgba(87,81,225,0.3)]">
                <span class="relative z-10 flex items-center gap-2">
                    View All Videos
                    <i class="fas fa-arrow-right text-sm transition-transform duration-300 group-hover:translate-x-1"></i>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-[#161439] to-[#5751E1] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </button>
        </div>
    </div>
</section>

<div id="TestimonialvideoModal" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50 p-4">
    <div class="relative w-full max-w-4xl">
        <button onclick="closeTestimonialVideo()" class="absolute -top-12 right-0 text-white text-4xl hover:text-red-500 transition-colors">&times;</button>
        <div class="aspect-video">
            <iframe id="TestimonialvideoFrame" class="w-full h-full rounded-lg" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
    function openTestimonialVideo(videoId) {
        const modal = document.getElementById('TestimonialvideoModal');
        const iframe = document.getElementById('TestimonialvideoFrame');
        iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeTestimonialVideo() {
        const modal = document.getElementById('TestimonialvideoModal');
        const iframe = document.getElementById('TestimonialvideoFrame');
        iframe.src = '';
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>