<style type="text/css">
.footer {
  background: url("<?= Setting::unique(['name' => 'image_footer'])->value; ?>") repeat center;
  border-radius: 10px 10px 0px 0px;
  width: 100%;
  height: auto;
  display: block;
  left: 0;
  right: 0;
  bottom: 0;
  color: #A9A9A9;
  font-size: 12px;
  padding: 1em;
}
.footer a {
  color: #A7A7A7;
}
</style>

<div class="footer">
  <div class="container-fluid">
    <div class="row animated zoomIn">
      <div class="col-md-4">

        <h3 class="lead"><?= Setting::unique(["name" => "site_title_short"])->value; ?></h3>
        <p>
          Aksi belirtilmedikçe
          <a href="<?= Setting::unique(['name' => 'site_url'])->value; ?>" target="_blank">
          <?= Setting::unique(["name" => "site_url"])->value; ?></a><br/>
          tarafından tüm içerik hakları saklıdır.
        </p>
        <br/>
        <div>
          <?= Setting::unique(["name" => "site_address"])->value; ?>
        </div>

      </div>
      <div class="col-md-4">

        <h5><a href="/home/categories"><?= t("home.categories"); ?></a></h5>
        <hr>
        <?php if ($_categories = Category::all()) { ?>
        <ul class="">
          <?php foreach ($_categories as $_category) { ?>
          <?php if ($_category) { ?>
          <li>
            <i class="fa fa-caret-right" aria-hidden="true"></i>
            <a href="/home/categories/show/<?= $_category->id; ?>">
              <?= $_category->name(); ?>
            </a>
          </li>
          <?php } ?>
          <?php } ?>
        </ul>
        <?php } ?>

      </div>
      <div class="col-md-4">

        <h5><a href="/home/agendas"><?= t("home.agendas"); ?></a></h5>
        <hr>

        <?php if ($_agendas = Agenda::load()->last(5)) { ?>
        <ul id="newsticker">
          <?php foreach ($_agendas as $_agenda) { ?>
          <li>
            <i class="fa fa-caret-right" aria-hidden="true"></i>
            <a href="/home/agendas/show/<?= $_agenda->id; ?>"><?= $_agenda->subject; ?></a>
          </li>
          <?php } ?>
        </ul>
        <?php } ?>

        <div style="background-color:#aaa; color:black" class="btn " id="newsticker-prev"><span class="glyphicon glyphicon-chevron-down"></span></div>
        <div style="background-color:#aaa; color:black" class="btn " id="newsticker-next"><span class="glyphicon glyphicon-chevron-up"></span></div>

      </div>
    </div>
  </div>
</div>


<div style="font-size: 12px">
  <nav class="navbar navbar-inverse" style="border-radius: 0px 0px 10px 10px;">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">
          copyright &copy; <?= date("Y"); ?><br>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav pull-left">

          <?php if (($site_email = Setting::unique(["name" => "site_email"])->value) != "") { ?>
          <li><a href="mailto:<?= $site_email; ?>" target="_blank" class="fa fa-envelope fa-2x"></a></li>
          <?php } ?>

          <?php if (($social_linkedin = Setting::unique(["name" => "social_linkedin"])->value) != "") { ?>
          <li><a href="http://www.linkedin.com/in/<?= $social_linkedin; ?>" target="_blank" class="fa fa-linkedin-square fa-2x"></a></li>
          <?php } ?>

          <?php if (($social_googleplus = Setting::unique(["name" => "social_googleplus"])->value) != "") { ?>
          <li><a href="http://plus.google.com/<?= $social_googleplus; ?>" target="_blank" class="fa fa-google-plus-square fa-2x"></a></li>
          <?php } ?>

          <?php if (($social_facebook = Setting::unique(["name" => "social_facebook"])->value) != "") { ?>
          <li><a href="http://facebook.com/<?= $social_facebook; ?>" target="_blank" class="fa fa-facebook-square fa-2x"></a></li>
          <?php } ?>

          <?php if (($social_twitter = Setting::unique(["name" => "social_twitter"])->value) != "") { ?>
          <li><a href="http://twitter.com/<?= $social_twitter; ?>" target="_blank" class="fa fa-twitter-square fa-2x"></a></li>
          <?php } ?>

          <?php if (($social_instagram = Setting::unique(["name" => "social_instagram"])->value) != "") { ?>
          <li><a href="http://instagram.com/<?= $social_instagram; ?>" target="_blank" class="fa fa-instagram fa-2x"></a></li>
          <?php } ?>

          <?php if (($social_disqus = Setting::unique(["name" => "social_disqus"])->value) != "") { ?>
          <li><a href="http://disqus.com/<?= $social_disqus; ?>" target="_blank" class="fa fa-comments-o fa-2x"></a></li>
          <?php } ?>

        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="http://www.turkeydiscoverthepotential.com/" target="_blank">
              <img src="/app/assets/img/signature_of_turkey.png" width="120" height="40" class="pull-right"/>
            </a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>