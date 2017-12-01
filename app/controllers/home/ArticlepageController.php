<?php

class ArticlepageController extends HomeController {


  public function index() {
    $this->articles = Article::load()->order("created_at")->get_all();
  }

  public function show() {
    if (!$this->article = Article::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir makale bulunmamaktadır";
      return $this->redirect_to("/home/articles");
    }
  }

}

?>