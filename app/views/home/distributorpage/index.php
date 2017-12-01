<h4 class="page-title"><?= t("home.distributors"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.distributors"); ?></li>
</ol>

<div class="container">

  <div class="panel-group" id="accordion1">

    <?php if ($regions) { ?>
    <?php foreach ($regions as $region) { ?>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="head<?= $region->id; ?>">

        <a data-toggle="collapse" data-parent="#accordion1" href="#<?= $region->id; ?>">
          <h4 class="panel-title">
            <?= $region->name; ?>
            <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i>
          </h4>
        </a>

      </div>
      <div id="<?= $region->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head<?= $region->id; ?>">
        <div class="panel-body">

          <?php $distributors = $region->all_of_distributor; ?>
          <?php if ($distributors) { ?>
          <?php foreach ($distributors as $distributor) { ?>
          <div class="well well-sm">
            <div class="row">
              <div class="col-md-8">
                <h4><b><?= $distributor->name; ?></b></h4>
                <p><i class="fa fa-map-mark"></i> <?= $distributor->address; ?></p>
                <p><i class="fa fa-phone"></i> <?= $distributor->phone; ?></p>
                <p><i class="fa fa-fax"></i> <?= $distributor->fax; ?></p>
                <p><i class="fa fa-home"></i>
                  <a href="<?= $distributor->url; ?>" target="_blank"><?= $distributor->url; ?></a>
                </p>
              </div>
              <div class="col-md-4 hidden-sm hidden-xs">
                <img src="<?= $distributor->image; ?>" class="img-rounded pull-right" style="min-height: 100px; max-height: 100px;" />
              </div>
            </div>
          </div>
          <?php } ?>
          <?php } ?>

        </div>
      </div>
    </div>

    <?php } ?>
    <?php } ?>

  </div>

</div>