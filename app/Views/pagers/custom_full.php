<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex items-center justify-between">
    <!-- Previous Button -->
    <?php if ($pager->hasPreviousPage()) : ?>
        <a href="<?= $pager->getPreviousPage() ?>" class="flex items-center gap-2 text-sm font-black text-[#161439] hover:text-[#5751E1] transition-all cursor-pointer relative z-30">
            <i class="bi bi-arrow-left text-lg"></i> 
            <span>Previous</span>
        </a>
    <?php else: ?>
        <span class="flex items-center gap-2 text-sm font-bold text-gray-200 opacity-50 cursor-not-allowed">
            <i class="bi bi-arrow-left text-lg"></i> Previous
        </span>
    <?php endif ?>

    <!-- Page Links -->
    <div class="flex items-center gap-4">
        <?php foreach ($pager->links() as $link) : ?>
            <?php if ($link['active']): ?>
                <span class="w-12 h-12 flex items-center justify-center rounded-full bg-[#161439] text-white font-black text-sm shadow-xl">
                    <?= $link['title'] ?>
                </span>
            <?php else: ?>
                <a href="<?= $link['uri'] ?>" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 text-[#161439] font-bold text-sm cursor-pointer transition-all">
                    <?= $link['title'] ?>
                </a>
            <?php endif ?>
        <?php endforeach ?>
    </div>

    <!-- Next Button -->
    <?php if ($pager->hasNextPage()) : ?>
        <a href="<?= $pager->getNextPage() ?>" class="flex items-center gap-2 text-sm font-black text-[#161439] hover:text-[#5751E1] transition-all cursor-pointer relative z-30">
            <span>Next</span>
            <i class="bi bi-arrow-right text-lg"></i>
        </a>
    <?php else: ?>
        <span class="flex items-center gap-2 text-sm font-bold text-gray-200 opacity-50 cursor-not-allowed">
            Next <i class="bi bi-arrow-right text-lg"></i>
        </span>
    <?php endif ?>
</nav>
