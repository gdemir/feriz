<?php

class PageController extends HomeController {

  public function show() {
    if (!$this->page = Page::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Sayfa bulunmamaktadır";
      return $this->redirect_to("/home/index");
    }
  }

}

?>