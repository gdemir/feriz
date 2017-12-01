<?php

// Function to get the client ip address
function get_client_ip_server() {
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';

  return $ipaddress;
}
?>
<center>
 <div id="intro">
  <div class="container text-center" style="margin-top: 11%; ">

    <img src="https://raw.githubusercontent.com/barak-framework/barak/master/app/assets/img/default.png" width="150" />
    <h3>BARAK<span class="turquoise_color" style="font-size:43px;">3</span> FRAMEWORK</h3>

    <hr>
    <div id="about" style="position: relative;">
      <h5>
        <div class="pull-left">
          Developed by <a href="http://www.gdemir.me" target="_blank" class="turquoise_color">Gökhan Demir</a>
        </div>
        <div class="pull-right">
          <a href="https://github.com/barak-framework/barak/" target="_blank" class="turquoise_color">Version 3.0.0</a>
        </div>
      </h5>

    </div>

  </div>
</div>
</center>



<div class="turquoise_border">
  Web Sayfanıza 1 Kişi Erişim Yaptı
  <hr/><br/>
  <b>Tarih :</b> <?= date("Y-m-d H:i:s"); ?><br/>
  <b>Client Modem Ip :</b> <?= $_SERVER['REMOTE_ADDR']; ?><br/>
  <b>Client Real  Ip :</b> <?= get_client_ip_server(); ?>
</div>
