<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th><?= t("home.product_image"); ?></th>
      <th><?= t("home.product"); ?></th>
      <th><?= t("home.product_price"); ?></th>
      <th><?= t("home.category"); ?></th>
      <th><?= t("home.producttype"); ?></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($products) { ?>
    <?php foreach ($products as $product) { ?>

    <tr>
      <td><img src="<?= $product->image; ?>" class="thumbnail img-responsive" style="min-height:144px; max-height:144px; min-width:144px; max-width:144px" /></td>
      <td><?= $product->name(); ?></td>
      <td><?= $product->price; ?></td>
      <td>
        <a class="label label-info" href="/home/categories/show/<?= $product->producttype->category->id; ?>">
          <?= $product->producttype->category->name(); ?>
        </a>
      </td>
      <td>
        <a class="label label-danger" href="/home/producttypes/show/<?= $product->producttype->id; ?>">
          <?= $product->producttype->name(); ?>
        </a>
      </td>
      <td>
        <a href="/home/products/show/<?= $product->id; ?>"
          class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
        </a>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Ürün mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>