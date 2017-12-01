<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <i class="fa fa-shopping-bag"></i> <?= t("home.categories"); ?>
    </h3>
  </div>

  <div id="product-menu">

    <?php $categories = Category::all(); ?>
    <?php if ($categories) { ?>
    <?php foreach ($categories as $category) { ?>

    <div class="panel list-group">
      <a class="list-group-item" data-toggle="collapse" data-target="#<?= $category->id; ?>" data-parent="#product-menu">
        <span><?= $category->name(); ?></span>
      </a>
      <?php $producttypes = $category->all_of_producttype; ?>

      <?php if ($producttypes) { ?>

      <ul class="nav nav-pills nav-stacked collapse" role="ablist" id="<?= $category->id; ?>">
        <?php foreach ($producttypes as $producttype) { ?>
        <li role="presentation">
          <a href="/home/producttypes/show/<?= $producttype->id; ?>">
            <span class="hidden-xs hidden-sm"><i class="glyphicon glyphicon-chevron-right"></i> <?= $producttype->name(); ?></span>
            <i class="fa fa-list fa-1x visible-xs visible-sm" title="Listele"></i>
          </a>
        </li>
        <?php } ?>
      </ul>

      <?php } ?>
    </div>

    <?php } ?>
    <?php } ?>

  </div>
</div>