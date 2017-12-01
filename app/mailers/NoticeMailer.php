<?php

class NoticeMailer extends ApplicationMailer {

  public function home() {
    $this->mail([
      "to" => [["gdemir@bil.omu.edu.tr" => "Gökhan Demir"]],
      "subject" => "Web Sayfa Erişim Bilgileri"
      ]);
  }

}
?>