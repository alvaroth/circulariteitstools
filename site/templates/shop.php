<?php snippet('header') ?>


<?php snippet('intro') ?>


<div class="row">
    <div class="col-md-2 ml-4 ">
        <div class="list-group pr-5">
            <h4>Product Tags</h4>
            <?php foreach ($site->find('tags')->tags_product()->split() as $tag): ?>
                <label class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox"
                           value="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>"
                           id="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>">
                    <?= $tag ?>
                </label>
            <?php endforeach ?>
        </div>
        <h4>Company Tags</h4>
        <div class="list-group pr-5">
            <?php foreach ($site->find('tags')->tags_company()->split() as $tag): ?>
                <label class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox"
                           value="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>"
                           id="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>">
                    <?= $tag ?>
                </label>
            <?php endforeach ?>
        </div>
    </div>
    <div class="col-md-8 ml-4 ">
        <div class="row">
            <?php foreach ($page->children()->listed() as $product): ?>
            <div class="col-md-2 border mr-3 ml-3 mb-3">
                <div class="product <?= getClassSafeUrl($product) ?>" id="<?= $product ?>">
                    <a href="<?= $product->link() ?>">
                        <img class="img-fluid img-thumbnail" src="<?= $product->image()->url() ?>" width="200vh"
                             height="auto">
                        <figcaption class="text">
                            <h3 class="product-title"><?= $product->title() ?></h3>
                            <h6 class="product-short-description"><?= $product->short_description() ?></h6>
                            <h6 class="product-product-tags badge badge-secondary"><?= $product->product_tags() ?></h6>
                            <h6 class="product-company-tags badge badge-secondary"><?= $product->company_tags() ?></h6>
                        </figcaption>
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
function getClassSafeUrl($product)
{
    $safeclass = "";
    foreach ($product->product_tags()->split() as $p => $tag) {
        $safeclass .= " " . preg_replace("/[^a-z0-9]+/i", "", $tag);
    }
    foreach ($product->company_tags()->split() as $p => $tag) {
        $safeclass .= " " . preg_replace("/[^a-z0-9]+/i", "", $tag);
    }
    return $safeclass;
}

?>

<script>
    var checkboxes = document.getElementsByClassName("form-check-input");

    //problem here is dealing with currently tagged checkboxes
    var changeResult = function () {
        $(".product").parent().hide();
        var noneChecked = true;
        for (var i = 0; i < checkboxes.length; i++)
            if ($(checkboxes[i]).is(":checked")) {
                var js_tag = checkboxes[i].id;
                noneChecked = false;
                $(".product." + js_tag).parent().show();
            }
        if(noneChecked) {
            $(".product").parent().show();
        }
    }
    $(document).ready(function () {
        for (var i = 0; i < checkboxes.length; i++)
            checkboxes[i].addEventListener('click', changeResult, false);
    })
</script>


<?php snippet('footer') ?>
