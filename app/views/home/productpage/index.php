<h4 class="page-title"><?= t("home.products"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.products"); ?></li>
</ol>

<div class="container-fluid">

  <?= render(["partial" => "home/productpage/table", "locals" => ["products" => $products]]); ?>

</div>