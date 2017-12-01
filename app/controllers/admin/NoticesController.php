<?php

class NoticesController extends AdminController {

  public function index() {
    $this->notices = Notice::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $notice = Notice::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
      $notice->image = FileHelper::move_f($image, "/upload/notices", $notice->id);
      $notice->save();
    } else {
      $notice->image = FileHelper::copy("/app/assets/img/default.png", "/upload/notices", $notice->id . ".png");
      $notice->save();
    }

    $_SESSION["success"] = "Yeni Duyuru eklendi";
    $this->redirect_to("/admin/notices/show/" . $notice->id);
  }

  public function show() {
    if (!$this->notice = Notice::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir notice bulunmamaktadır";
      return $this->redirect_to("/admin/notices");
    }
  }

  public function edit() {
    if (!$this->notice = Notice::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Duyuru bulunmamaktadır";
      return $this->redirect_to("/admin/notices");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $notice = Notice::update($_POST["id"], $_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($notice->image);
      $notice->image = FileHelper::move_f($image, "/upload/notices", $notice->id);
      $notice->save();
    }

    $_SESSION["info"] = "Duyuru güncellendi";
    $this->redirect_to("/admin/notices/show/" . $notice->id);
  }

  public function destroy() {
    $notice = Notice::find($_POST["id"]);

    FileHelper::remove($notice->image);

    $notice->destroy();
    $_SESSION["info"] = "Duyuru silindi";
    return $this->redirect_to("/admin/notices");
  }

}
?>