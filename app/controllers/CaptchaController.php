<?php

class CaptchaController extends ApplicationController {

  public function show() {
    $_SESSION["captcha_code"] = CaptchaHelper::init();
    $this->render(["text" => ""]);
  }

}

?>