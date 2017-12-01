<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    <?= Setting::unique(["name" => "site_title_keyword"])->value; ?> |
    <?= Setting::unique(["name" => "site_title_short"])->value; ?> -
    <?= Setting::unique(["name" => "site_title"])->value; ?>
  </title>
  <meta name="description" content="<?= Setting::unique(['name' => 'site_description'])->value; ?>" />
  <meta name="keywords" content="<?= Setting::unique(['name' => 'site_keywords'])->value; ?>" />
  <link href="" rel="alternate" title="" type="application/atom+xml" />
  <link rel="shortcut icon" href="<?= Setting::unique(["name" => "image_logo_icon"])->value; ?>">
  <link rel="stylesheet" href="/app/assets/css/syntax.css" type="text/css" />
  <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="/app/assets/js/html5shiv.min.js"></script>
  <script src="/app/assets/js/respond.min.js"></script>
<![endif]-->

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/app/assets/js/bootstrap.min.js"></script>

<!-- Google Analytics start -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', "<?= Setting::unique(['name' => 'site_googleanalyticsid'])->value; ?>", 'auto');
  ga('send', 'pageview');

</script>
<!-- Google Analytics end -->

<!-- Jquery Datatables Responsive Bootstrap start -->
<!-- source: https://datatables.net/extensions/responsive/examples/styling/bootstrap.html -->
<link rel="stylesheet" type="text/css" href="/app/assets/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/app/assets/css/responsive.bootstrap.min.css" />

<script type="text/javascript" src="/app/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/app/assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="/app/assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="/app/assets/js/responsive.bootstrap.min.js"></script>

<!-- Jquery Datatables Responsive Bootstrap end -->

<!-- datepicker start -->
<!-- source: https://github.com/eternicode/bootstrap-datepicker -->
<link rel="stylesheet" href="/app/assets/css/bootstrap-datepicker.min.css" type="text/css" />
<script src="/app/assets/js/bootstrap-datepicker.min.js"></script>
<script src="/app/assets/js/bootstrap-datepicker.tr.js"></script>
<!-- datepicker end -->

<!-- bootstrap-image-gallery start -->
<!-- source: https://github.com/blueimp/Gallery -->
<link rel="stylesheet" href="/app/assets/css/blueimp-gallery.min.css" type="text/css" />
<script src="/app/assets/js/blueimp-gallery.min.js"></script>
<!-- bootstrap-image-gallery end -->

<!-- auto search start -->
<script src="/app/assets/js/typeahead.bundle.js"></script>
<!-- auto search end -->

<!-- Animatecss start -->
<!-- source: https://daneden.github.io/animate.css/ -->
<link rel="stylesheet" type="text/css" href="/app/assets/css/animate.min.css" />
<!-- Animatecss end -->

<!-- dropdown-submenu start -->
<!-- source: https://github.com/vsn4ik/bootstrap-submenu -->
<link rel="stylesheet" type="text/css" href="/app/assets/css/bootstrap-submenu.min.css" />
<script src="/app/assets/js/bootstrap-submenu.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('[data-submenu]').submenupicker();
  });
</script>
<!-- dropdown-submenu end -->

<!-- dropdown hover start -->
<!-- source: https://github.com/CWSpear/bootstrap-hover-dropdown -->
<script src="/app/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript">
  $('.dropdown-toggle').dropdownHover();
</script>
<!-- dropdown hover end -->

<!-- bxSlider start -->
<!-- source: http://bxslider.com/ -->
<script src="/app/assets/js/jquery.bxslider.min.js"></script>
<link href="/app/assets/css/jquery.bxslider.css" rel="stylesheet" />
<!-- bxSlider end -->

<!-- ticker slider lib start -->
<!-- source: https://github.com/risq/jquery-advanced-news-ticker -->
<script type="text/javascript" src="/app/assets/js/jquery.newsTicker.js"></script>
<!-- ticker slider lib end -->

<!-- Pace start -->
<!-- source: https://github.com/HubSpot/pace -->
<script src="/app/assets/js/pace.min.js"></script>
<link href="/app/assets/css/pace.css" rel="stylesheet" />
<script type="text/javascript">
  $(document).ready(function() {
    Pace.on("done", function() {

      $("#contents").show();

      /* Jquery Datatables Language start */
      /* source: https://datatables.net/examples/basic_init/language.html */
      $('#example').dataTable( {
        "order": [[ 1, "desc" ]],
        "responsive": true,
        "language": {
          "lengthMenu": "Gösterilen _MENU_ adet satır",
          "zeroRecords": "Kayıt Bulunamadı",
          "info": "Toplam _PAGES_ sayfadan _PAGE_ sayfa gösteriliyor",
          "infoEmpty": "Kayıt Sayısı Yok",
          "infoFiltered": "(Toplam _MAX_ gönderi filtrelendi)",
          "search": "Ara",
          "paginate": {
            "previous": "Önceki",
            "next": "Sonraki"
          }
        }
      });
      /* Jquery Datatables Language end */

      /* Ticker slider start */
      /* source: https://github.com/risq/jquery-advanced-news-ticker */
      $('#newsticker').newsTicker({
        duration: 4000,
        max_rows: 5,
        prevButton: $('#newsticker-prev'),
        nextButton: $('#newsticker-next')
      });
      /* Ticker slider end */

    });
  });
</script>
<style type="text/css">
#contents {
  display: none;
}
</style>
<!-- Page end -->
<style>
/* Note: Try to remove the following lines to see the effect of CSS positioning */
.affix {
  position: sticky;
  top: 0;
  width: 100%;
}

.affix + .container-fluid {
  padding-top: 70px;
}
</style>

<!-- Dropdown Menu Large start -->
<!-- source: https://codepen.io/organizedchaos/pen/rwlhd -->
<link href="/app/assets/css/dropdown-menu-large-inverse.css" rel="stylesheet" />
<!-- Dropdown Menu Large end -->

</head>
<body>
  <div class="pace pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
      <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
  </div>

  <?= render(["partial" => "/home/home_header"]); ?>
  <?= render(["partial" => "/home/home_navbar_large"]); ?>

  <div id="contents">

    <?php $_is_home = in_array($_SERVER["REQUEST_URI"], ["/", "/home", "/home/index"]); ?>

    <?php if (!$_is_home) { ?><div class="well well-sm"><?php } else { ?><div><?php } ?>

      <!-- bildirimleri göster ve temizle -->

      <?= BootstrapHelper::notice_show(); ?>
      <?php BootstrapHelper::notice_clear(); ?>

      <?= $yield; ?>

    </div>

    <!-- render("signin_modal", "home"); -->
    <?= render(["partial" => "home/home_footer"]); ?>
    <?= render(["partial" => "layouts/back_to_top"]); ?>

  </div>

  <audio controls="controls" autoplay="autoplay" hidden="true">
    <source src="/app/assets/music/music.mp3" type="audio/mp3" />
  </audio>
</body>
</html>