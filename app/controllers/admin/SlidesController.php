<?php

class SlidesController extends AdminController {

  public function index() {
    $this->slides = Slide::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $slide = Slide::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
      $slide->image = FileHelper::move_f($image, "/upload/slides/image", $slide->id);
      $slide->save();
    } else {
      $slide->image = FileHelper::copy("/app/assets/img/default.png", "/upload/slides/image", $slide->id . ".png");
      $slide->save();
    }

    $bg_image = $_FILES["bg_image"];
    if ($bg_image["name"] != "") {// varsa yeni resmi ekle
      $slide->bg_image = FileHelper::move_f($bg_image, "/upload/slides/bg_image", $slide->id);
      $slide->save();
    } else {
      $slide->bg_image = FileHelper::copy("/app/assets/img/default.png", "/upload/slides/bg_image", $slide->id . ".png");
      $slide->save();
    }

    $_SESSION["success"] = "Yeni Slayt eklendi";
    $this->redirect_to("/admin/slides/show/" . $slide->id);
  }

  public function show() {
    if (!$this->slide = Slide::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Slayt bulunmamaktadır";
      return $this->redirect_to("/admin/slides");
    }
  }

  public function edit() {
    if (!$this->slide = Slide::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Slayt bulunmamaktadır";
      return $this->redirect_to("/admin/slides");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $slide = Slide::update($_POST["id"], $_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($slide->image);
      $slide->image = FileHelper::move_f($image, "/upload/slides/image", $slide->id);
      $slide->save();
    }

    $bg_image = $_FILES["bg_image"];
    if ($bg_image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      $slide->bg_image = FileHelper::move_f($bg_image, "/upload/slides/bg_image", $slide->id);
      $slide->save();
    }

    $_SESSION["info"] = "Slayt güncellendi";
    $this->redirect_to("/admin/slides/show/" . $slide->id);
  }

  public function destroy() {
    $slide = Slide::find($_POST["id"]);

    FileHelper::remove($slide->image);
    FileHelper::remove($slide->bg_image);

    $slide->destroy();
    $_SESSION["info"] = "Slayt silindi";
    return $this->redirect_to("/admin/slides");
  }

}
?>