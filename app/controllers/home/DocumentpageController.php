<?php

class DocumentpageController extends HomeController {

  public function index() {
    $this->documents = Document::load()->order("created_at")->get_all();
  }

}

?>