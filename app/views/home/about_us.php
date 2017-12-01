<h4 class="page-title"><?= t("home.about_us"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.about_us"); ?></li>
</ol>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-2 hidden-sm hidden-xs">
      <img src="<?= Setting::unique(['name' => 'image_logo_emblem'])->value; ?>" style="width: 200px; height: 100px;" />
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12" style="border-left: 2px solid #ddd;">
      <?= Setting::unique(["name" => "site_about"])->value; ?>
    </div>
  </div>

  <br/><br/>

  <h5 class="page-title"><?= t("home.our_employees"); ?></h5>

  <div class="row">
    <?php $users = User::all(); ?>
    <?php foreach ($users as $user) { ?>
    <div class="col-md-4 col-sm-6 animated rollIn">

      <div class="panel panel-default img-hover">
        <div class="panel-heading" style="min-height:150px"></div>
        <div class="panel-body text-center">
          <img src="<?= $user->image; ?>" alt="" class="img-circle"
          style="padding:0.4em; background-color:#ccc; height:150px; width: 150px;margin-top:-90px">
          <h3><?= $user->full_name(); ?></h3>
          <p><?= $user->cv ?></p>
          <p>
            <i class="fa fa-phone-square"></i> <?= $user->phone; ?><br/>
            <i class="fa fa-envelope"></i> <a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a>
          </p>
        </div>
      </div>

    </div>
    <?php } ?>
  </div>

</div>
