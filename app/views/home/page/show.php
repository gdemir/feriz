<?php
$now_page = $page;
do {
  $big_parent_page = $page->page;
  if (is_null($big_parent_page))
    break;
  else
    $page = $big_parent_page;

} while(true);
?>

<h4 class="page-title"><?= $now_page->title(); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <?= PageHelper::parent_breadcrumbs($now_page); ?>
  <li class="active"><?= $now_page->title(); ?></li>
</ol>

<!-- first section - Home -->
<div class="parallax" style="background-image: url('<?= $now_page->image; ?>');">
  <div class="parallax-caption animated fadeInRight">
    <h1 class="background-transparent"><?= $now_page->title(); ?></h1>
  </div>
</div>
<!-- /first section -->

<div class="row">

  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <?= $page->title(); ?>
        </h3>
      </div>
      <div class="list-group">
        <?= PageHelper::sub_links($page->all_of_page, $now_page); ?>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="well well-sm">
      <?= $now_page->content(); ?>
    </div>
  </div>

</div>