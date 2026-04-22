<?= $this->include('custom/homeMeta') ?>
<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-3xl shadow-xl overflow-hidden">
                    <?php if($blog['image']): ?>
                        <div class="relative h-[400px] w-full">
                            <img src="<?= base_url($blog['image']) ?>" class="w-full h-full object-cover" alt="<?= $blog['title'] ?>">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-8 left-8 text-white">
                                <span class="bg-[#FE002A] px-4 py-1 rounded-full text-sm font-bold mb-4 inline-block">ACADEMY INSIGHTS</span>
                                <h1 class="text-4xl font-bold font-poppins leading-tight"><?= $blog['title'] ?></h1>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="p-8 pb-0">
                            <span class="bg-[#FE002A]/10 text-[#FE002A] px-4 py-1 rounded-full text-sm font-bold mb-4 inline-block">ACADEMY INSIGHTS</span>
                            <h1 class="text-4xl font-bold font-poppins leading-tight text-[#161439]"><?= $blog['title'] ?></h1>
                        </div>
                    <?php endif; ?>

                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-6 text-gray-500 text-sm mb-10 border-b border-gray-100 pb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 rounded-full bg-[#5751E1]/10 flex items-center justify-center text-[#5751E1]">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-bold">Author</p>
                                    <p class="text-[#161439] font-bold"><?= $blog['author'] ?></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-bold">Published</p>
                                    <p class="text-[#161439] font-bold"><?= date('M d, Y', strtotime($blog['created_at'])) ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed font-poppins blog-content">
                            <?= $blog['content'] ?>
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                            <div class="flex gap-4">
                                <span class="text-sm font-bold text-[#161439]">SHARE:</span>
                                <a href="#" class="text-gray-400 hover:text-[#5751E1] transition-colors"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="text-gray-400 hover:text-[#5751E1] transition-colors"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-gray-400 hover:text-[#5751E1] transition-colors"><i class="bi bi-linkedin"></i></a>
                            </div>
                            <a href="<?= base_url('blogs') ?>" class="text-[#5751E1] font-bold flex items-center gap-2 hover:gap-3 transition-all">
                                <i class="bi bi-arrow-left"></i> BACK TO BLOGS
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">
                    <!-- Recent Posts -->
                    <div class="bg-white rounded-3xl shadow-lg p-8">
                        <h3 class="text-xl font-bold text-[#161439] mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-[#FE002A] rounded-full"></span>
                            Recent Stories
                        </h3>
                        <div class="space-y-6">
                            <?php foreach($recent_blogs as $recent): ?>
                                <a href="<?= base_url('blog/'.$recent['slug']) ?>" class="group flex gap-4 items-center">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden flex-shrink-0 shadow-sm group-hover:shadow-md transition-all">
                                        <img src="<?= $recent['image'] ? base_url($recent['image']) : base_url('public/images/homePageImages/NewsBlogs/blogimg.png') ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-[#FE002A] uppercase tracking-wider mb-1"><?= date('M d, Y', strtotime($recent['created_at'])) ?></p>
                                        <h4 class="text-sm font-bold text-[#161439] group-hover:text-[#5751E1] transition-colors line-clamp-2 leading-snug">
                                            <?= $recent['title'] ?>
                                        </h4>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- CTA Sidebar -->
                    <div class="bg-gradient-to-br from-[#5751E1] to-[#3f38c2] rounded-3xl shadow-xl p-8 text-white text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="bi bi-mortarboard-fill text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Advance Your Career</h3>
                        <p class="text-white/80 mb-8 text-sm leading-relaxed">Join our professional courses in US Taxation and AI-driven finance.</p>
                        <a href="<?= base_url('home#courses') ?>" class="inline-block bg-white text-[#5751E1] px-8 py-3 rounded-full font-black text-sm hover:bg-[#FE002A] hover:text-white transition-all shadow-lg">
                            EXPLORE COURSES
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .blog-content h2 { font-size: 1.875rem; font-weight: 700; color: #161439; margin-top: 2rem; margin-bottom: 1rem; }
    .blog-content h3 { font-size: 1.5rem; font-weight: 700; color: #161439; margin-top: 1.5rem; margin-bottom: 0.75rem; }
    .blog-content p { margin-bottom: 1.5rem; }
    .blog-content ul, .blog-content ol { margin-bottom: 1.5rem; padding-left: 1.5rem; }
    .blog-content li { margin-bottom: 0.5rem; }
    .blog-content blockquote { border-left: 4px solid #5751E1; padding-left: 1.5rem; font-style: italic; color: #4b5563; margin: 2rem 0; }
</style>

<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>
