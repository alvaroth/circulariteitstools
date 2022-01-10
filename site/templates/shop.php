<?php snippet('header') ?>

<?php snippet('intro') ?>
<div class="row">
    <div class="col-md-2 ml-4">
        <h4>Categorieën</h4>
        <div class="list-group mb-3">
                <label class="list-group-item">
                    <input class="form-check-input category-input me-1" type="checkbox"
                           value="company"
                           id="company">
                    Bedrijfsniveau
<!--                    <i class="bi bi-question-circle float-right" data-toggle="Tooltip"-->
<!--                       data-placement="right"-->
<!--                       title="tooltip">-->
<!--                    </i>-->
                </label>
                <label class="list-group-item">
                    <input class="form-check-input category-input me-1" type="checkbox"
                           value="product"
                           id="product">
                    Productniveau
<!--                    <i class="bi bi-question-circle float-right" data-toggle="Tooltip"-->
<!--                       data-placement="right"-->
<!--                       title="tooltip">-->
<!--                    </i>-->
                </label>
        </div>
        <h4>Bedrijfsniveau</h4>
        <div class="list-group mb-3">
            <?php foreach ($site->find('tags')->tags_company()->split() as $tag): ?>
                <label class="list-group-item">
                    <input class="form-check-input tag-company-input me-1" type="checkbox"
                           value="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>"
                           id="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>">
                    <?= $tag ?>
<!--                    <i class="bi bi-question-circle float-right" data-toggle="Tooltip"-->
<!--                            data-placement="right"-->
<!--                            title="tooltip">-->
<!--                    </i>-->
                </label>
            <?php endforeach ?>
        </div>
        <h4>Productniveau</h4>
        <div class="list-group">
            <?php foreach ($site->find('tags')->tags_product()->split() as $tag): ?>
                <label class="list-group-item">
                    <input class="form-check-input tag-product-input me-1" type="checkbox"
                           value="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>"
                           id="<?= preg_replace("/[^a-z0-9]+/i", "", $tag); ?>">
                    <?= $tag ?>
<!--                    <i class="bi bi-question-circle float-right" data-toggle="Tooltip"-->
<!--                       data-placement="right"-->
<!--                       title="">-->
<!--                    </i>-->
                </label>
            <?php endforeach ?>
        </div>
    </div>
    <div class="col-md-9 ">
        <div class="row">
            <?php foreach ($page->children()->listed() as $product): ?>
                <div class="card col-md-2 mr-3 ml-3 mb-3">
                    <div class="frame">
                        <span class="helper"></span><img class="card-img-top"
                             src="<?= (!$product->image()) ? $site->files()->findBy('filename', 'no_image.jpg')->url() : $product->images()->template('single-image'); ?>">
                    </div>
                    <div class="card-body product <?= getClassSafeUrl($product) ?>" id="<?= $product ?>">
                            <h5 class="card-title product-title"><?= $product->title() ?></h5>
                            <p class="card-subtitle product-short-description mb-2 text-muted"><?= $product->short_description() ?></p>
                    </div>
                    <button class="btn btn-primary mb-4" data-toggle="modal"
                            data-target="#productModalCenter_<?= preg_replace("/[^a-z0-9]+/i", "", $product->title()); ?>">
                        <i class="bi-arrows-angle-expand" > </i>
                    </button>
                </div>
                <div class="modal fade"
                     id="productModalCenter_<?= preg_replace("/[^a-z0-9]+/i", "", $product->title()); ?>" tabindex="-1"
                     role="dialog"
                     aria-labelledby="productModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <h2 class="modal-title" id="productModalCenterTitle"><?= $product->title() ?></h2>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row mb-3 pl-2 pr-2">
                                        <div class="col-md-6">
                                            <img class="img-fluid img-thumbnail"
                                                 src="<?= (!$product->image()) ? $site->files()->findBy('filename', 'no_image.jpg')->url() :$product->images()->template('single-image'); ?>">
                                        </div>
                                        <div class="col-md-5 swiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($product->images()->template('gallery') as $image): ?>
                                                    <div class="swiper-slide">
                                                        <img class="swiper-image" data-enlargeable
                                                             src="<?= $image->url() ?>"
                                                             style="cursor: zoom-in">
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <!-- If we need pagination -->
                                            <div class="swiper-pagination"></div>

                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>

                                            <!-- If we need scrollbar -->
                                            <div class="swiper-scrollbar"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 pl-2 pr-2">
                                        <div class="col-md-4-auto"><h4><?= $product->short_description() ?></h4></div>
                                    </div>
                                    <div class="row mb-3 pl-2 pr-2">
                                        <?php foreach ($product->product_tags()->split() as $pro_tags): ?>
                                            <h6 class="product-product-tags badge badge-secondary mr-2"><?= $pro_tags ?></h6>
                                        <?php endforeach ?>
                                        <?php foreach ($product->company_tags()->split() as $com_tags): ?>
                                            <h6 class="product-product-tags badge badge-secondary mr-2"><?= $com_tags ?></h6>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="row mb-3 pl-2 pr-2">
                                        <div class="col-md-4-auto"><?= $product->description() ?></div>
                                    </div>
                                    <div class="row mb-3 bg-grey pt-3 pb-3">
                                        <div class="col-md-4 text-center">
                                            <div class="row justify-content-center">
                                                Moeilijkheidsgraad
                                            </div>
                                            <div class="row justify-content-center">
                                                <span style="padding-right: 3px">
                                                    <i class="bi-star"> </i><?= $product->difficulty() ?>
                                                </span>
                                                <span>
                                                    / 5
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="row justify-content-center">
                                                Invultijd
                                            </div>
                                            <div class="row justify-content-center">
                                                <span style="padding-right: 3px">
                                                    <i class="bi-clock"> </i>
                                                </span>
                                                <span>
                                                    <?= $product->time() ?> Minuten
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                                <div class="row justify-content-center">
                                                    Link
                                                </div>
                                                <div class="row justify-content-center">
                                                    <a href="<?= $product->link() ?>" target="_blank"><i class="bi-link"></i> </a>
                                                </div>

                                            </a></div>
                                    </div>

                                    <div class="row justify-content-between pl-3 pr-3">
                                        <div class="col-md-5">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Benodigdheden</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($product->pre_reqs()->toStructure() as $pre_req): ?>
                                                    <tr>
                                                        <td><?= $pre_req->required() ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-5">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Versie</th>
                                                    <th scope="col">Prijs</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($product->price()->toStructure() as $price): ?>
                                                    <tr>
                                                        <td><?= $price->name() ?></td>
                                                        <td>€ <?= $price->price() ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
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

<script type="text/javascript">
        var checkboxes_company_tags = new Array(document.getElementsByClassName("tag-company-input"));
        var checkboxes_product_tags = new Array(document.getElementsByClassName("tag-product-input"));
        var checkboxes_tags_joined =  checkboxes_company_tags.concat(checkboxes_product_tags);

        var checkboxes_categories = document.getElementsByClassName("category-input");

        $( document ).ready(function() {
            const swiper = new Swiper('.swiper', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });

            for (var i = 0; i < checkboxes_tags_joined.length; i++) {
                for (var l = 0; l < checkboxes_tags_joined[i].length; l++) {
                    checkboxes_tags_joined[i][l].addEventListener('click', changeResult, false);
                }
            }
            for (var k = 0; k < checkboxes_categories.length; k++)
                checkboxes_categories[k].addEventListener('click', checkAllByCategory, false);
        });

        //zoom function on modal gallery
        $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
            var src = $(this).attr('src');
            var modal;
            function removeModal() {
                modal.remove();
                $('body').off('keyup.modal-close');
            }
            modal = $('<div>').css({
                background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                backgroundSize: '33% auto',
                width: '100%',
                height: '100%',
                position: 'fixed',
                zIndex: '10000',
                top: '0',
                left: '0',
                cursor: 'zoom-out'
            }).click(function() {
                removeModal();
            }).appendTo('body');
            //handling ESC
            $('body').on('keyup.modal-close', function(e) {
                if (e.key === 'Escape') {
                    removeModal();
                }
            });
        });

        //figure out based on the checkboxvalue
        var checkAllByCategory = function (e){
            switch (e.currentTarget.value) {
                case "product":
                    loopThroughCheckboxes(checkboxes_product_tags,e.currentTarget.checked)
                    break;
                case "company":
                    loopThroughCheckboxes(checkboxes_company_tags,e.currentTarget.checked)
                    break;
                default:
                    console.log("help")
                    break;
            }
        }
        //this gets called after a catergoy gets checked or unchecked to turn tags-checkboxes on or off
        var loopThroughCheckboxes = function (target, checked){
            for (var i = 0; i < target.length; i++) {
                for (var j = 0; j < target[i].length; j++) {
                    target[i][j].checked = checked
                }
            }
            changeResult()
        }

        var changeResult = function (e) {
            $(".product").parent().hide();
            var noneChecked = true;
            for (var i = 0; i < checkboxes_tags_joined.length; i++) {
                for (var l = 0; l < checkboxes_tags_joined[i].length; l++) {
                    if ($(checkboxes_tags_joined[i][l]).is(":checked")) {
                        var js_tag = checkboxes_tags_joined[i][l].id;
                        noneChecked = false;
                        $(".product." + js_tag).parent().show();
                    }
                }
            }
            if(e && !e.currentTarget.checked){
                if(($(event.target).hasClass('tag-company-input'))) {
                    checkboxes_categories.company.checked = false;
                }else if(($(event.target).hasClass('tag-product-input'))){
                    checkboxes_categories.product.checked = false;
                }
            }
            if (noneChecked) {
                $(".product").parent().show();
            }
        }
</script>


<?php snippet('footer') ?>
