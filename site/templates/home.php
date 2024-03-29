<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `photography` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php snippet('intro') ?>
<?php


/*
  We always use an if-statement to check if a page exists to
  prevent errors in case the page was deleted or renamed before
  we call a method like `children()` in this case
*/
?>
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <div class="pb-4 pt-4 <?= $layout->class() ?>" id="<?= $layout->id() ?>" style="background-image:url(<?= $image = ($layout->image()->toFile() != null ? $layout->image()->toFile()->url() : ""); ?>) ;height:<?= $layout->vh()?>vh">
        <div class="container">
            <div class="row">
                <?php foreach ($layout->columns() as $column): ?>
                    <div class="col-<?= $column->span(12) ?>">
                        <?= $column->blocks() ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

<?php endforeach ?>

<?php snippet('footer') ?>
