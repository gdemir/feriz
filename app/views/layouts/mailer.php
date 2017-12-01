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
  <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.min.js"></script>
  <script src="/assets/js/respond.min.js"></script>
  <![endif]-->

  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="/app/assets/js/bootstrap.min.js"></script>
  <style type="text/css">
  @import  url('https://fonts.googleapis.com/css?family=Nunito:300,400,600');
  body { font-family: 'Nunito', sans-serif;  background-color: #fdfdfd; }
  .container { word-wrap: break-word; }

  #intro { font-size: 12px; color: #777; }
  #intro h3 { margin: 0; padding: 10px; font-size: 33px; font-weight: 300; }
  #intro h5 { margin-top: 20px; font-size: 12px; font-weight: 500; }

  .turquoise_color { color: #30D5C8; }
  .turquoise_border { border:3px solid #30D5C8; border-radius: 8px; }
  </style>

</head>
<body>
  <div class="container" style="width:365px; min-height:200px; margin-top: 8%;">
    <?= $yield; ?>
  </div>
</body>
</html>