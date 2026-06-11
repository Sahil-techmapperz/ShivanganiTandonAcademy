<?= $this->include('custom/BlogsMeta') ?>

<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<!-- Hero Section -->
<section class="relative h-[40vh] md:h-[60vh] flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="<?= base_url('public/images/commonImages/blog-hero.png') ?>" alt="Academy Chronicle Hero" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center w-full px-4">
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-16 rounded-[1.5rem] md:rounded-[2.5rem] shadow-2xl max-w-3xl mx-auto">
            <h1 class="text-white text-3xl md:text-7xl font-black tracking-tight mb-2 md:mb-4 uppercase">
                THE ACADEMY <br class="hidden md:block"> <span class="text-white/90">CHRONICLE</span>
            </h1>
            <p class="text-white/80 text-sm md:text-xl font-medium tracking-wide">
                Insights, News and learning at shivangani academy
            </p>
        </div>
    </div>
</section>

<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if(!empty($blogs)): ?>
            <?php 
                $currentPage = $pager->getCurrentPage();
            ?>

            <!-- Popular Articles Section (Random Blogs) -->
            <div class="mb-16 md:mb-24">
                <h2 class="text-2xl md:text-3xl font-black text-[#161439] mb-8 md:mb-10">Popular Article's</h2>
                
                <div class="grid lg:grid-cols-12 gap-8 md:gap-10">
                    <!-- Featured Large Article (First Random Blog) -->
                    <?php if(isset($popular[0])): $featured = $popular[0]; ?>
                    <div class="lg:col-span-7">
                        <article class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-[1.5rem] md:rounded-[2.5rem] mb-4 md:mb-6 shadow-xl aspect-[16/10]">
                                <img src="<?= $featured['image'] ? base_url($featured['image']) : base_url('public/images/homePageImages/NewsBlogs/blogimg.png') ?>" 
                                     alt="<?= $featured['title'] ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div class="px-2">
                                <span class="text-gray-400 text-[10px] md:text-xs font-bold uppercase tracking-widest mb-2 block">
                                    <?= date('F d, Y', strtotime($featured['created_at'])) ?>
                                </span>
                                <h3 class="text-2xl md:text-3xl font-black text-[#161439] mb-3 md:mb-4 leading-tight group-hover:text-[#5751E1] transition-colors">
                                    <a href="<?= base_url('blog/'.$featured['slug']) ?>"><?= $featured['title'] ?></a>
                                </h3>
                                <p class="text-gray-500 line-clamp-3 leading-relaxed text-sm md:text-base">
                                    <?= strip_tags($featured['content']) ?>
                                </p>
                            </div>
                        </article>
                    </div>
                    <?php endif; ?>

                    <!-- Side Small Articles (Next 3 Random Blogs) -->
                    <div class="lg:col-span-5 flex flex-col gap-6 md:gap-8">
                        <?php 
                        $side_blogs = array_slice($popular, 1, 3);
                        foreach($side_blogs as $s_blog): 
                        ?>
                        <article class="flex flex-row gap-4 md:gap-6 group cursor-pointer items-center md:items-start">
                            <div class="w-28 h-20 md:w-40 md:h-28 flex-shrink-0 overflow-hidden rounded-xl md:rounded-2xl shadow-md">
                                <img src="<?= $s_blog['image'] ? base_url($s_blog['image']) : base_url('public/images/homePageImages/NewsBlogs/blogimg.png') ?>" 
                                     alt="<?= $s_blog['title'] ?>" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-grow pt-1">
                                <span class="text-gray-400 text-[9px] md:text-[10px] font-bold uppercase tracking-widest mb-1 block">
                                    <?= date('F d, Y', strtotime($s_blog['created_at'])) ?>
                                </span>
                                <h4 class="text-sm md:text-base font-black text-[#161439] leading-tight line-clamp-2 md:line-clamp-3 group-hover:text-[#5751E1] transition-colors">
                                    <a href="<?= base_url('blog/'.$s_blog['slug']) ?>"><?= $s_blog['title'] ?></a>
                                </h4>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Latest Articles Grid -->
            <div class="pt-12 md:pt-20 border-t border-gray-100">
                <h2 class="text-2xl md:text-3xl font-black text-[#161439] mb-8 md:mb-12">Latest Article's</h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 lg:gap-x-10 gap-y-10 lg:gap-y-16">
                    <?php 
                    // Showing all blogs from the paginated result
                    foreach($blogs as $l_blog): 
                    ?>
                    <article class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-[1.5rem] md:rounded-[2rem] mb-4 md:mb-6 shadow-lg aspect-[16/10]">
                            <img src="<?= $l_blog['image'] ? base_url($l_blog['image']) : base_url('public/images/homePageImages/NewsBlogs/blogimg.png') ?>" 
                                 alt="<?= $l_blog['title'] ?>" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="px-1">
                            <span class="text-gray-400 text-[10px] md:text-xs font-bold uppercase tracking-widest mb-2 block">
                                <?= date('F d, Y', strtotime($l_blog['created_at'])) ?>
                            </span>
                            <h3 class="text-lg md:text-xl font-black text-[#161439] mb-2 md:mb-3 leading-tight line-clamp-2 group-hover:text-[#5751E1] transition-colors">
                                <a href="<?= base_url('blog/'.$l_blog['slug']) ?>"><?= $l_blog['title'] ?></a>
                            </h3>
                            <p class="text-gray-500 text-xs md:text-sm line-clamp-3 leading-relaxed opacity-80">
                                <?= strip_tags($l_blog['content']) ?>
                            </p>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-20">
                    <?= $pager->links('default', 'custom_full') ?>
                </div>
            </div>

        <?php else: ?>
            <div class="text-center py-20 bg-gray-50 rounded-[2.5rem]">
                <h3 class="text-2xl font-black text-gray-400">No blog posts available yet.</h3>
                <p class="text-gray-400 mt-2">Check back soon for latest insights.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>
