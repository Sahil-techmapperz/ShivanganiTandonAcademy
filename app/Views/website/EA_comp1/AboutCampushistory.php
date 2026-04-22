<?php
$testimonials = [
    [
        'id' => 'zMBCf3PKSaA',
        'name' => 'Mustafa Moomin',
        'image' => '1.png'
    ],
    [
        'id' => 'zMBCf3PKSaA',
        'name' => 'Mustafa Moomin 2',
        'image' => '1.png'
    ],
    [
        'id' => 'emUgLHYXA50',
        'name' => 'Bhabagrahi Jena',
        'image' => '3.png'
    ],
    [
        'id' => 'uZmibYPyihg',
        'name' => 'Akshay Trivedi',
        'image' => '4.png'
    ],
    [
        'id' => '7JEoXfOcxLc',
        'name' => 'Anmol Parmeshwar',
        'image' => '5.png'
    ],
];

// Extract the first two for the special row
$firstRow = array_slice($testimonials, 0, 2);
// Extract the remaining three
$secondRow = array_slice($testimonials, 2);
?>

<div class="max-w-7xl mx-auto px-4 py-12">

    <div class="text-center mb-10">
        <span
            class="inline-block bg-[#EFEEFE] text-[#5751E1] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
            About Campus history
        </span>
        <p
            class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#161439] mb-1 sm:mb-2 md:mb-3 lg:mb-6 xl:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
            Our Enroll Agents Testimonial Videos
        </p>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mb-6">
        <div onclick="openTestimonialVideo('<?= $firstRow[0]['id']; ?>')"
            class="w-full md:w-[60%] relative cursor-pointer group rounded-2xl overflow-hidden shadow-lg aspect-video bg-gray-200 max-h-[400px] md:max-h-[500px]">
            <img src="<?= base_url('public/images/EA/AboutCampushistory/' . $firstRow[0]['image']) ?>" class="w-full h-full object-cover">
        </div>

        <div onclick="openTestimonialVideo('<?= $firstRow[1]['id']; ?>')"
            class="w-full md:flex-1 relative cursor-pointer group rounded-2xl overflow-hidden shadow-lg aspect-video bg-gray-200 max-h-[400px] md:max-h-[500px]">
            <img src="<?= base_url('public/images/EA/AboutCampushistory/' . $firstRow[1]['image']) ?>" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($secondRow as $item): ?>
            <div onclick="openTestimonialVideo('<?php echo $item['id']; ?>')"
                class="relative cursor-pointer group rounded-xl overflow-hidden shadow-md bg-slate-200 border bg-gray-200 max-h-[400px] md:max-h-[500px]">

                <img src="<?= base_url('public/images/EA/AboutCampushistory/' . $item['image']) ?>"
                    alt="<?php echo $item['name']; ?>"
                    class="w-full aspect-video object-cover">
            </div>
        <?php endforeach; ?>
    </div>
</div>

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