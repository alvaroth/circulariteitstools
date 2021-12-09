<?php snippet('header') ?>


<?php snippet('intro') ?>


    <div class="container">
        <div class="row">
            <?php foreach ($page->children()->listed() as $product): ?>
                <div class="col-4">
                    <figure class="product">
                        <a href="<?= $product->link() ?>">
                            <img class="img-fluid img-thumbnail" src="<?= $product->image()->url() ?>" width="200vh" height="auto">
                            <figcaption class="text">
                                <h3 class="product-title"><?= $product->title() ?></h3>
                                <p class="product-price">€ <?= $product->price() ?></p>
                            </figcaption>
                        </a>
                    </figure>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <aside>
        <?php foreach ($site->find('tags')->Tags()->split() as $tag): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $tag ?>" id="<?= $tag ?>">
                <label class="form-check-label" for="<?= $tag ?>"   >
                    <?= $tag ?>
                </label>
            </div>
        <?php endforeach ?>

    </aside>

<?php snippet('footer') ?>