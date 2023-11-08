<?php snippet('header') ?>

<main>
  <?php foreach ($page->data()->toBlocks() as $block): ?>
    <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
      <?= $block ?>
    </div>
  <?php endforeach ?>
</main>

<?php snippet('footer') ?>