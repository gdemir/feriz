<div class="well well-sm hidden-xs" style="border-bottom: 5px solid #e21e24;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 col-sm-2">
        <a class="" href="/home/index">
          <img alt="Brand" src="<?= Setting::unique(['name' => 'image_logo_emblem'])->value; ?>" width="125" class="img-responsive"/>
        </a>
      </div>
      <div class="col-md-10 col-sm-10 animated fadeInLeft pull-right text-right" style="font-size:12px;">
        <?= Setting::unique(['name' => 'site_title_keyword'])->value; ?>
        <ul>
          <li><i class="fa fa-envelope"></i> <?= Setting::unique(['name' => 'site_email'])->value; ?></li>
          <li><i class="fa fa-phone"></i> <?= Setting::unique(['name' => 'site_phone'])->value; ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
