<nav class="navbar navbar-inverse navbar-static-top animated fadeInDown" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding: 8px 0px 0px 0px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="nabar-brand visible-xs" href="/home/index" style="padding: 0px 12px 0px 10px;">
        <img alt="Brand" src="<?= Setting::unique(['name' => 'image_logo_side'])->value; ?>" style="height:60px; padding:0em" class="img-responsive"/>
      </a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-left" style="padding: 0px 0px 0px 0px;">
        <li><a href="/home/index"><?= t("home.link"); ?></a></li>

        <li class="dropdown">
          <a href="/home" data-hover="dropdown" data-delay="100" data-close-others="false" data-toggle="dropdown" data-submenu>
            <?= t("home.corporate"); ?>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/home/about_us"><?= t("home.about_us"); ?></a></li>
            <li><a href="/home/articles"><?= t("home.articles"); ?></a></li>
            <li><a href="/home/documents"><?= t("home.documents"); ?></a></li>
            <li><a href="/home/albums"><?= t("home.albums"); ?></a></li>
          </ul>
        </li>

        <?php $parent_pages = Page::load()->where("page_id", NULL)->get_all(); ?>
        <?php if ($parent_pages) { ?>

        <?php foreach ($parent_pages as $parent_page) { ?>
        <li class="dropdown">
          <a tabindex="0" href="#" data-hover="dropdown" data-delay="100" data-close-others="false" data-toggle="dropdown" data-submenu>
            <?= $parent_page->title(); ?>
            <b class="caret"></b>
          </a>
          <?= PageHelper::dropdown_menu($parent_page->all_of_page); ?>
        </li>
        <?php } ?>

        <?php } ?>

        <li class="dropdown dropdown-large" style="color:#fff">
          <a href="/home/categories" data-hover="dropdown" data-delay="100" data-close-others="false" data-toggle="dropdown" data-submenu>
            <?= t("home.categories"); ?>
            <b class="caret"></b>
          </a>

          <ul class="dropdown-menu dropdown-menu-large row">

            <?php $categories = Category::all(); ?>

            <?php if ($categories) { ?>
            <?php foreach ($categories as $category) { ?>

            <li class="col-lg-3">
              <ul>
                <li class="dropdown-header">
                  <h4><a href="/home/categories/show/<?= $category->id; ?>"><?= $category->name(); ?></a></h4>
                </li>
                <?php $producttypes = $category->all_of_producttype; ?>
                <?php foreach ($producttypes as $producttype) { ?>
                <li><a href="/home/producttypes/show/<?= $producttype->id; ?>"><?= $producttype->name(); ?></a></li>
                <?php } ?>
              </ul>
            </li>

            <?php } ?>
            <?php } ?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="/home/products" data-hover="dropdown" data-delay="100" data-close-others="false" data-toggle="dropdown" data-submenu>
            <?= t("home.products"); ?>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/home/products/search"><?= t("home.product_search"); ?></a></li>
            <li><a href="/home/products"><?= t("home.product_list"); ?></a></li>
          </ul>
        </li>
        <li><a href="/home/agendas"><?= t("home.agendas"); ?></a></li>
        <li><a href="/home/references"><?= t("home.references"); ?></a></li>
        <li><a href="/home/contact"><?= t("home.contact"); ?></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right" style="padding: 5px 20px 0px 0px;">
        <li><a href="/lang/tr"><img src="/app/assets/img/tr.png" class="img-border"/></a></li>
        <li><a href="/lang/en"><img src="/app/assets/img/en.png" class="img-border"/></a></li>
      </ul>

<!--
      <ul class="nav navbar-nav navbar-right" style="padding: 25px 20px 0px 0px;">
        <li>
          <select class="form-control" name=""  onchange="window.location.href=this.value">
            <option value="" selected> </option>
            <option value="/lang/tr">TR</option>
            <option value="/lang/en">EN</option>
          </select>
        </li>
      </ul>
    -->
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>