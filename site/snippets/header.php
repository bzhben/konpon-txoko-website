<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    <?= $page->title()->esc() ?>
  </title>

  <?= css([
    'assets/css/normalize.css',
    'assets/css/style.css'
  ]) ?>

  <link rel="shortcut icon" href="<?= url('assets/svg/logo.svg') ?>">
</head>

<!-- Body starts in header and ends in footer -->

<body>
  <header>
    <!-- BANNER -->
    <img class="banner" src="<?= url('assets/bandeau.png') ?>"
      alt="Bannière mentionnant Konpon Txoko ainsi que ses activités principales">

    <!-- NAVIGATION MENU -->
    <nav>
      <menu>
        <!-- MAIN MENU -->
        <?php foreach ($pages->listed() as $item):
          $children = $item->children()->listed();
          ?>
          <li>
            <?php
            /* Get all children for the current menu item */
            /* Display the submenu if children are available */
            if ($children->isNotEmpty()): ?>
              <p class="menu-item">
                <?= $item->title()->html() ?>
              </p>
              <!-- DROPDOWN CONTENT -->
              <menu class="submenu">
                <?php foreach ($children as $child): ?>
                  <li>
                    <a class="menu-item" href="<?= $child->url() ?>">
                      <?= $child->title()->html() ?>
                    </a>
                  </li>
                <?php endforeach ?>
              </menu>
            <?php else: ?>
              <a class="menu-item" <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>">
                <?= $item->title()->html() ?>
              </a>
            <?php endif ?>
          </li>
        <?php endforeach ?>

        <li>
          <div class="menu-item">
            <img class="flag" src="<?= url('assets/flags/' . $kirby->language()->code() . '.svg') ?>"
            alt="Language en cours d'utilisation">
          </div>
          
          <menu class="submenu">
            <?php foreach ($kirby->languages() as $language):
              // List languages except currently selected language
              if ($kirby->language() == $language):
                continue;
              endif ?>
              <li>
                <a class="menu-item" href="<?= $page->url($language->code()) ?>"
                  hreflang="<?php echo $language->code() ?>">
                  <img class="flag" src="<?= url('assets/flags/' . $language->code() . '.svg') ?>"
                    alt="Language au choix">
                </a>
              </li>
            <?php endforeach ?>
          </menu>
        </li>
      </menu>
    </nav>
  </header>