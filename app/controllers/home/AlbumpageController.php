<?php

class AlbumpageController extends HomeController {

  public function index() {
    $this->albums = Album::load()->order("id")->get_all();
  }

  public function show() {
    if (!$this->album = Album::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Albüm bulunmamaktadır";
      return $this->redirect_to("/home/agendas");
    }
    $this->albumimages = $this->album->all_of_albumimage;
  }


}

?>