<h4 class="page-title"><?= t("home.contact"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.contact"); ?></li>
</ol>

<iframe src="<?= Setting::unique(["name" => "site_address_maps"])->value; ?>" width="100%" height="450" frameborder="0" style="border:0"></iframe>

<div class="text-center">
  <p><img src="<?= Setting::unique(['name' => 'image_logo_normal'])->value; ?>" width="160"/></p>
  <p><i class="fa fa-map-marker"></i> <?= Setting::unique(["name" => "site_address"])->value; ?></p>
  <p>
    <i class="fa fa-home"></i>
    <a href="http://<?= Setting::unique(['name' => 'site_url'])->value; ?>" target="_blank">
      http://<?= Setting::unique(["name" => "site_url"])->value; ?>
    </a>
  </p>
  <p><i class="fa fa-envelope"></i>  <?= Setting::unique(["name" => "site_email"])->value; ?></p>
  <p><i class="fa fa-phone"></i> <?= Setting::unique(["name" => "site_phone"])->value; ?></p>
  <p><i class="fa fa-fax"></i> <?= Setting::unique(["name" => "site_fax"])->value; ?></p>
</div>