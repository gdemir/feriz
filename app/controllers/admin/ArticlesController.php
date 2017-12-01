<?php

class ArticlesController extends AdminController {

  public function index() {
    $this->articles = Article::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $article = Article::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
      $article->image = FileHelper::move_f($image, "/upload/articles", $article->id);
      $article->save();
    } else {
      $article->image = FileHelper::copy("/app/assets/img/default.png", "/upload/articles", $article->id . ".png");
      $article->save();
    }

    $_SESSION["success"] = "Yeni Makale eklendi";
    $this->redirect_to("/admin/articles/show/" . $article->id);
  }

  public function show() {
    if (!$this->article = Article::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Makale bulunmamaktadır";
      return $this->redirect_to("/admin/articles");
    }
  }

  public function edit() {
    if (!$this->article = Article::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Makale bulunmamaktadır";
      return $this->redirect_to("/admin/articles");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $article = Article::update($_POST["id"], $_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($article->image);
      $article->image = FileHelper::move_f($image, "/upload/articles", $article->id);
      $article->save();
    }

    $_SESSION["info"] = "Makale güncellendi";
    $this->redirect_to("/admin/articles/show/" . $article->id);
  }

  public function destroy() {
    $article = Article::find($_POST["id"]);

    FileHelper::remove($article->image);

    $article->destroy();
    $_SESSION["info"] = "Makale silindi";
    return $this->redirect_to("/admin/articles");
  }

}
?>