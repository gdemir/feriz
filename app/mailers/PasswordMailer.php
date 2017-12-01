<?php

class PasswordMailer extends ApplicationMailer {

  protected $after_actions = [["info"]];

  public function info() {
    if (isset($this->email) && isset($this->fullname)) {
      $this->mail([
        "to" => [[$this->email => $this->fullname]],
        "subject" => "Güçlü Şifre İçin Öneriler"
        ]);
    }
  }

  public function reset($code, $site_url, $email, $fullname) {
    $this->code = $code;
    $this->site_url = $site_url;
    $this->email = $email;
    $this->fullname = $email;
    $this->mail([
      "to" => [[$this->email => $this->fullname]],
      "subject" => "[Admin] Please reset your password"
      ]);
  }
}
?>