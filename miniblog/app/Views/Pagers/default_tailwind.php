<?php $pager->setSurroundCount(2); ?>
<nav aria-label="Page navigation">
    <ul class="flex items-center justify-center space-x-3">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="px-4 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 shadow-sm">
                    <span>‹</span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="active"' : '' ?>>
                <a href="<?= $link['uri'] ?>" class="<?= $link['active'] ? 'px-5 py-3 text-white gradient-bg border-0 rounded-xl shadow-lg font-semibold' : 'px-5 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 shadow-sm font-medium' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="px-4 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 shadow-sm">
                    <span>›</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>