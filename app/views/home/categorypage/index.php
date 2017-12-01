<h4 class="page-title"><?= t("home.categories"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.categories"); ?></li>
</ol>

<div class="container">

  <?php if ($categories) { ?>
  <div class="row">
    <?php foreach ($categories as $category) { ?>

    <div class="col-md-4 animated flipInX">

      <div class="thumbnail img-rounded" style="
      background-image: url('<?= $category->image; ?>');
      background-repeat:no-repeat;
      background-position:center;
      background-size: 100% auto;
      min-height:250px;
      max-height:250px;
      ">

      <a href="/home/categories/show/<?= $category->id; ?>" class="btn btn-danger pull-right" role="button">
        <i class="fa fa-2x fa-search"></i>
      </a>

      <div class="caption background-transparent">
        <h5><?= $category->name(); ?></h5>
      </div>
    </div>

  </div>

  <?php } ?>
</div>
<?php } ?>

</div>