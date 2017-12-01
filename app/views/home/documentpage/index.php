<h4 class="page-title"><?= t("home.documents"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.documents"); ?></li>
</ol>

<div class="container-fluid">

  <div class="row">

    <?php if ($documents) { ?>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="hidden-xs hidden-sm" style="width: 200px"><b>Oluşturulma Zamanı</b></th>
          <th><b>Evrak</b></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($documents as $document) { ?>

        <tr>
          <td class="hidden-xs hidden-sm" style="width: 200px"><?= $document->created_at; ?></td>
          <td><a href="<?= $document->path; ?>" download><?= $document->name; ?></a></td>
        </tr>

        <?php } ?>
      </tbody>
    </table>
    <?php } ?>

  </div>

</div>