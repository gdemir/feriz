<!-- first section - Slides -->

<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel" style="color:white; font-size:14px;">

  <?php $slides = Slide::all(); ?>
  <?php if ($slides) { ?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <?php $active = "active"; ?>
    <?php foreach ($slides as $slide) { ?>


    <div class="item <?= $active; ?>" style="
      background-image:url(<?= $slide->bg_image; ?>);
      background-position:center;
      min-height:479px;
      max-height:479px;
      ">
<!--
      <center style="padding-top:80px">
        <img class="img-responsive hidden-xs animated zoomInLeft" src="<?= $slide->image; ?>" style="max-width:200px; max-height:200px;" />
      </center>
-->
      <div class="carousel-caption" style="bottom:0;left:0;right:0; margin-bottom:-40px;">
        <div class="background-transparent" style="min-height:80px;">
          <h3 class="animated bounceInDown"><?= $slide->subject(); ?></h3>
          <h4 class="hidden-sm hidden-xs animated bounceInUp"><?= $slide->content(); ?></h4>
        </div>
      </div>

    </div>
    <?php $active = ""; ?>
    <?php } ?>

  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

  <?php } ?>

</div>

<!-- morphext start -->
<!-- source: https://github.com/MrSaints/Morphext -->
<link href="/app/assets/css/morphext.css" rel="stylesheet" />
<script src="/app/assets/js/morphext.min.js"></script>
<!-- morphext end -->

<script>
  $(document).ready(function() {
    $("#js-rotating").Morphext({
      // The [in] animation type. Refer to Animate.css for a list of available animations.
      animation: "flipInX",
      // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
      separator: ",",
      // The delay between the changing of each phrase in milliseconds.
      speed: 2000,
      complete: function () {
        // Called after the entrance animation is executed.
      }
    });
  });
</script>

<div class="well well-sm">
  <div style="border-bottom: 1px solid #e7e7e7;">
    <div class="container-fluid">
      <div class="text-center">
        <img src="<?= Setting::unique(['name' => 'image_logo_emblem'])->value; ?>" style="width: 160px; height: 80px;"/>
        <h2>
          <?= Setting::unique(["name" => "site_title_short"])->value; ?> İLE TEKNOLOJİ ÇÖZÜMLERİ <b id="js-rotating">HIZLI, SÜREKLİ, PRATİK, KARARLI</b><br/>
        </h2>
        <h4>
          ve her gün daha iyisi olmak için çalışıyoruz!<br/><br/>
          <a href="/home/about_us" class="btn btn-danger" role="button">
            <?= Setting::unique(["name" => "site_title_short"])->value; ?>
            <?= t("home.about"); ?>
          </a>
        </h4>
      </div>
    </div>
  </div>

  <!-- /first section -->

  <!-- second section - Solutions -->

  <div class="container-fluid">

    <h2 class="text-center"><?= t("home.our_products"); ?></h2> <hr/>

    <?php
    $products_all = Product::all();
    $product_keys = ($products_all) ? array_rand($products_all, 3) : [];
    $products = [];
    foreach ($product_keys as $key) {
      $products[] = $products_all[$key];
    }
    ?>

    <?php if ($products) { ?>
    <div class="row">
      <?php foreach ($products as $product) { ?>

      <div class="col-md-4">

        <div class="thumbnail img-rounded" style="
        background-image: url('<?= $product->image; ?>');
        background-repeat:no-repeat;
        background-position:center;
        background-size: 100% auto;
        min-height:250px;
        max-height:250px;
        ">
        <a href="/home/products/show/<?= $product->id; ?>" class="btn btn-danger pull-right" role="button">
          <i class="fa fa-2x fa-search"></i>
        </a>

        <div class="caption background-transparent">
          <h5><?= $product->name; ?></h5>
        </div>
      </div>

    </div>

    <?php } ?>
  </div>
  <?php } ?>
  <center>
    <h4>
      <?= Setting::unique(["name" => "site_title_short"])->value; ?>
      satışını yaptığı tüm ürünlerin projelendirilmesi ve kurulum işlerini <br/>
      uzman ekibiyle yapmaktadır. <br/>
    </h4>
    <a href="/home/products" class="btn btn-danger" role="button">
      <?= t("home.our_products"); ?>
    </a>
  </center>
</div>

<br/>
<!-- /second section -->

<!-- third section - Partners -->
<div class="container-fluid" style="background-color:#f5f5ed">

  <h2 class="text-center"><?= t("home.our_partners"); ?></h2> <hr/>
  <?php $partners = Partner::all(); ?>
  <?php if ($partners) { ?>
  <center>
    <?php foreach ($partners as $partner) { ?>
    <i class="gray_scale_box img-hover">
      <img title="<?= $partner->name; ?>" src="<?= $partner->image; ?>" class="gray_scale" style="padding:1em; max-height:100px; max-width:300px;"/>
    </i>
    <?php } ?>
  </center>
  <?php } ?>
</div>

<!-- /third section -->

</div>
