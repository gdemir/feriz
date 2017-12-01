<h4 class="page-title"><?= t("home.product"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li><a href="/home/categories"><?= t("home.categories"); ?></a></li>
  <li><a href="/home/categories/show/<?= $product->producttype->category->id; ?>"><?= $product->producttype->category->name(); ?></a></li>
  <li><a href="/home/producttypes/show/<?= $product->producttype->id; ?>"><?= $product->producttype->name(); ?></a></li>
  <li class="active"><?= $product->name(); ?></li>
</ol>

<style>
.thumbnail {
  position: relative;
  overflow: hidden;
}

.caption {
  position: absolute;
  top: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.2);
  width: 100%;
  height: 100%;
  padding: 2%;
  display: none;
  text-align: center;
  color: #fff !important;
  z-index: 2;
}
</style>

<script type="text/javascript">
$( document ).ready(function() {

  $('.thumbnail').hover(
    function(){
            $(this).find('.caption').fadeToggle("slow"); //.fadeIn(250)
          },
          function(){
            $(this).find('.caption').fadeToggle("slow"); //.fadeOut(205)
          }
          );
});
</script>

<div class="container-fluid">

  <div class="row">

    <div class="col-md-4 col-sm-6">

      <div class="modal fade" id="<?= $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <img src="<?= $product->image; ?>" width="600" height="400" class="img-thumbnail" />
            </div>
          </div>
        </div>
      </div>

      <a data-toggle="modal" data-target="#<?= $product->id; ?>" style="color:white">
        <div class="thumbnail">
          <img src="<?= $product->image; ?>" alt="..." class="img-responsive" style="min-height:177px; max-height:177px" />
          <div class="caption" >
            <h3><i class="fa fa-plus-circle fa-3x"></i></h3>
          </div>
        </div>
      </a>

    </div>

    <div class="col-md-8 col-sm-6">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <?= t("home.product_info"); ?>
          </h3>
        </div>

        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <tr>
              <td><b><?= t("home.category"); ?></b></td>
              <td><?= $product->producttype->category->name(); ?></td>
            </tr>
            <tr>
              <td><b><?= t("home.producttype"); ?></b></td>
              <td><?= $product->producttype->name(); ?></td>
            </tr>
            <tr>
              <td><b><?= t("home.product_name"); ?></b></td>
              <td><?= $product->name(); ?></td>
            </tr>
            <tr>
              <td><b><?= t("home.product_price"); ?></b></td>
              <td><?= $product->price; ?></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?= t("home.product_content"); ?>
      </h3>
    </div>

    <div style="padding:1em">
      <?= $product->content(); ?>
    </div>

    <table class="table table-striped table-bordered table-hover">
      <tbody>
        <tr>
          <td><b><?= t("home.product_file"); ?></b></td>
          <td><a href="<?= $product->file; ?>" download><i class="fa fa-file-pdf-o fa-3x"></i></a></td>
        </tr>
      </tbody>
    </table>
  </div>

  <hr>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?= t("home.product_relation"); ?>
      </h3>
    </div>

    <?php $products = Producttype::find($product->producttype->id)->all_of_product; ?>
    <?= render(["partial" => "home/productpage/table", "locals" => ["products" => $products]]); ?>

  </div>
</div>