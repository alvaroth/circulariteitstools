<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <?php
    /*
      In the title tag we show the title of our
      site and the title of the current page
    */
    ?>
    <title><?= $site->title() ?> | <?= $page->title() ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
    /*
      Stylesheets can be included using the `css()` helper.
      Kirby also provides the `js()` helper to include script file.
      More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
    */
    ?>
    <?= css([
        'assets/css/prism.css',
        'assets/css/lightbox.css',
        'assets/css/index.css',
        '@auto'
    ]) ?>

    <?php
    /*
      The `url()` helper is a great way to create reliable
      absolute URLs in Kirby that always start with the
      base URL of your site.
    */
    ?>


    <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>

<header class="header">
    <?php
    /*
      We use `$site->url()` to create a link back to the homepage
      for the logo and `$site->title()` as a temporary logo. You
      probably want to replace this with an SVG.
    */
    ?>


    <nav class="sticky-top pt-4 navbar navbar-expand-lg navbar-light">
        <div class="d-flex flex-grow 1">
            <a class="navbar-brand d-none d-lg-inline-block" href="<?= $site->url() ?>">
                <img src="<?= $site->files()->findBy('filename', 'logo2.png')->url() ?>"  class="logo d-inlineblock align-top" width="90" height="65" alt="">
            </a>
        </div>
        <ul class="navbar-nav mx-auto flex-nowrap ">
            <?php
            /*
              In the menu, we only fetch listed pages,
              i.e. the pages that have a prepended number
              in their foldername.

              We do not want to display links to unlisted
              `error`, `home`, or `sandbox` pages.

              More about page status:
              https://getkirby.com/docs/reference/panel/blueprints/page#statuses
            */
            ?>
            <?php foreach ($site->children()->listed() as $item): ?>
            <li class="nav-item">
                <a class="nav-link menu-item h3" <?php e($item->isOpen(), 'aria-current ') ?>
                   href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
            <?php endforeach ?>
            </li>
        </ul>
    </nav>
</header>
<main class="main">
