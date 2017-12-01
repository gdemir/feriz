<?php

class ReferencepageController extends HomeController {

  public function index() {
    $this->references = Reference::all();
  }

}

?>