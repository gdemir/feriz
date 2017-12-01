<h4 class="page-title"><?= t("home.articles"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.articles"); ?></li>
</ol>

<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Başlık</th>
      <th>Tarih</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($articles) { ?>
    <?php foreach ($articles as $article) { ?>

    <tr>
      <td><a href="/home/articles/show/<?= $article->id; ?>" class="text-info"><?= $article->subject; ?></a></td>
      <td>
        <span class="label label-default"><i class="fa fa-calendar"></i> <?= $article->created_at; ?></span>
      </td>
    </tr>

    <?php } ?>
    <?php } ?>
  </tbody>
</table>