<h4 class="page-title"><?= t("home.category"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li><a href="/home/categories"><?= t("home.categories"); ?></a></li>
  <li class="active"><?= $category->name(); ?></li>
</ol>

<!-- first section - Home -->
<div class="parallax" style="background-image: url(<?= $category->image; ?>);">
  <div class="parallax-caption">
    <h1 class="background-transparent"><?= $category->name(); ?></h1>
  </div>
</div>
<!-- /first section -->

<div class="container"><?= $category->content(); ?></div>

<div class="row">

  <div class="col-md-3">
    <?= render(["partial" => "home/menu_product"]); ?>
  </div>

  <div class="col-md-9">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <?= t("home.producttypes"); ?>
        </h3>
      </div>

      <table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th></th>
            <th>Ad</th>
            <th>Çeşit</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($producttypes) { ?>
          <?php foreach ($producttypes as $producttype) { ?>
          <tr>
            <td><img src="<?= $producttype->image; ?>" class="thumbnail img-responsive" style="min-height:144px; max-height:144px; min-width:144px; max-width:144px" /></td>
            <td><?= $producttype->name(); ?></td>
            <td><?= count($producttype->all_of_product); ?></td>
            <td>
              <a href="/home/producttypes/show/<?= $producttype->id; ?>" class="btn btn-default" role="button" title="Göster">
                <i class="fa fa-search"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>

    </div>

  </div>

</div>
