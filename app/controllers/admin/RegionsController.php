<?php

class RegionsController extends AdminController {

  public function index() {
    $this->regions = Region::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $region = Region::create($_POST);

    $_SESSION["success"] = "Yeni Bölge eklendi";
    $this->redirect_to("/admin/regions/show/" . $region->id);
  }

  public function show() {
    if (!$this->region = Region::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Bölge bulunmamaktadır";
      return $this->redirect_to("/admin/regions");
    }
  }

  public function edit() {
    if (!$this->region = Region::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Bölge bulunmamaktadır";
      return $this->redirect_to("/admin/regions");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $region = Region::update($_POST["id"], $_POST);

    $_SESSION["info"] = "Bölge güncellendi";
    $this->redirect_to("/admin/regions/show/" . $region->id);
  }

  public function destroy() {
    $region = Region::find($_POST["id"]);
    if ($region->all_of_distributor)
      $_SESSION["danger"] = "Bu Bölgenin Distribütörleri olduğundan dolayı silinemez!";
    else {
      $region->destroy();

      $_SESSION["info"] = "Bölge silindi";
    }
    return $this->redirect_to("/admin/regions");
  }
}
?>