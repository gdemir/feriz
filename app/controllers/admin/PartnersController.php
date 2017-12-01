<?php

class PartnersController extends AdminController {

  public function index() {
    $this->partners = Partner::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $partner = Partner::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
      $partner->image = FileHelper::move_f($image, "/upload/partners", $partner->id);
      $partner->save();
    } else {
      $partner->image = FileHelper::copy("/app/assets/img/default.png", "/upload/partners", $partner->id . ".png");
      $partner->save();
    }

    $_SESSION["success"] = "Yeni Partner eklendi";
    $this->redirect_to("/admin/partners/show/" . $partner->id);
  }

  public function show() {
    if (!$this->partner = Partner::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Partner bulunmamaktadır";
      return $this->redirect_to("/admin/partners");
    }
  }

  public function edit() {
    if (!$this->partner = Partner::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Partner bulunmamaktadır";
      return $this->redirect_to("/admin/partners");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $partner = Partner::update($_POST["id"], $_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($partner->image);
      $partner->image = FileHelper::move_f($image, "/upload/partners", $partner->id);
      $partner->save();
    }

    $_SESSION["info"] = "Partner güncellendi";
    $this->redirect_to("/admin/partners/show/" . $partner->id);
  }

  public function destroy() {
    $partner = Partner::find($_POST["id"]);

    FileHelper::remove($partner->image);

    $partner->destroy();
    $_SESSION["info"] = "Partner silindi";
    return $this->redirect_to("/admin/partners");
  }

}
?>