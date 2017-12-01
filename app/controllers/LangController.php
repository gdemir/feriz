<?php
class LangController extends ApplicationController {

  public function en() {
    ApplicationI18n::locale("en");
    return $this->redirect_to("/home/index");
  }

  public function tr() {
    ApplicationI18n::locale("tr");
    return $this->redirect_to("/home/index");
  }

}
?>