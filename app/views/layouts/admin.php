<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>
  <link href="" rel="alternate" title="" type="application/atom+xml" />
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/app/assets/css/syntax.css" type="text/css" />
  <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css' />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="/app/assets/js/html5shiv.min.js"></script>
  <script src="/app/assets/js/respond.min.js"></script>
  <![endif]-->

  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="/app/assets/js/bootstrap.min.js"></script>

  <!-- Jquery Datatables Responsive Bootstrap start -->
  <!-- source: https://datatables.net/extensions/responsive/examples/styling/bootstrap.html -->
  <link rel="stylesheet" type="text/css" href="/app/assets/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/app/assets/css/responsive.bootstrap.min.css" />

  <script type="text/javascript" src="/app/assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/app/assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="/app/assets/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="/app/assets/js/responsive.bootstrap.min.js"></script>

  <!-- Jquery Datatables Language start -->
  <!-- source: https://datatables.net/examples/basic_init/language.html -->
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
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
    });
  </script>
  <!-- Jquery Datatables Language end -->
  <!-- Jquery Datatables Responsive Bootstrap end -->

  <!-- datepicker start -->
  <!-- source: https://github.com/eternicode/bootstrap-datepicker -->
  <link rel="stylesheet" href="/app/assets/css/bootstrap-datepicker.min.css" type="text/css" />
  <script src="/app/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="/app/assets/js/bootstrap-datepicker.tr.js"></script>
  <!-- datepicker end -->

  <!-- auto search start -->
  <script src="/app/assets/js/typeahead.bundle.js"></script>
  <!-- auto search end -->

  <!-- summernote start -->
  <!-- source: http://summernote.org/ -->
  <link rel="stylesheet" href="/app/assets/css/summernote.css" type="text/css"/>
  <script src="/app/assets/js/summernote.min.js"></script>
  <script src="/app/assets/js/summernote-tr-TR.js"></script>
  <!-- summernote end -->

</head>
<body>

  <?= render(["partial" => "admin/admin_navbar"]); ?>

  <div class="well well-sm" style="padding:0em">
    <ul class="nav nav-pills well well-sm" style="margin-bottom:0px">
      <li role="presentation"><a href="/admin/index" class="fa fa-home">Anasayfa</a></li>
      <li role="presentation">
        <a class="fa fa-bars" id="side-menu-toggle"></a>
      </li>
    </ul>
  </div>
  <div class="row">

    <div class="col-md-2 col-sm-2 col-xs-4" id="side-menu">
      <div class="well well-sm">
        <?= render(["partial" => "admin/menu_site"]); ?>
        <?= render(["partial" => "admin/menu_distributor"]); ?>
        <?= render(["partial" => "admin/menu_product"]); ?>
        <?= render(["partial" => "admin/menu_user"]); ?>
        <?= render(["partial" => "admin/menu_system"]); ?>
      </div>
    </div>

    <div class="col-md-10 col-sm-10 col-xs-8" id="main-menu">
      <div class="well well-sm">
        <?= BootstrapHelper::breadcrumb_button(); ?>

        <!-- bildirimleri göster ve temizle -->

        <?= BootstrapHelper::notice_show(); ?>
        <?php BootstrapHelper::notice_clear(); ?>

        <?= $yield; ?>

      </div>

    </div>

    <?= render(["partial" => "layouts/back_to_top"]); ?>

    <!-- dropdown hover start -->
    <script src="/app/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript">
      $('.dropdown-toggle').dropdownHover();
    </script>
    <!-- dropdown hover end -->

    <script>

      $(document).ready(function(){

        /*
        http://stackoverflow.com/questions/7002039/easiest-way-to-toggle-2-classes-in-jquery
        */
        $('#side-menu-toggle').click(function() {
          $('#side-menu').toggleClass("hidden");
          $("#main-menu").toggleClass("col-md-12 col-md-10");
          $("#main-menu").toggleClass("col-sm-12 col-sm-10");
          $("#main-menu").toggleClass("col-xs-12 col-xs-8");

        });

      });
    </script>
  </body>
  </html>