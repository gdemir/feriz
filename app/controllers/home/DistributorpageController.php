<?php

class DistributorpageController extends HomeController {

  public function index() {
    $this->regions = Region::all();
  }

}

?>