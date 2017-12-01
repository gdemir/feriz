<?php

class DistributorsController extends AdminController {

	public function index() {
		$this->distributors = Distributor::all();
	}

	public function create() {
		$this->regions = Region::all();
	}

	public function save() {
		$_POST["created_at"] = date("Y-m-d H:i:s");
		$distributor = Distributor::create($_POST);

		$image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
    	$distributor->image = FileHelper::move_f($image, "/upload/distributors", $distributor->id);
    	$distributor->save();
    } else {
    	$distributor->image = FileHelper::copy("/app/assets/img/default.png", "/upload/distributors", $distributor->id . ".png");
    	$distributor->save();
    }

    $_SESSION["success"] = "Yeni Distribütör eklendi";
    $this->redirect_to("/admin/distributors/show/" . $distributor->id);
  }

  public function show() {
  	if (!$this->distributor = Distributor::find($this->id)) {
  		$_SESSION["danger"] = "Böyle bir Distribütör bulunmamaktadır";
  		return $this->redirect_to("/admin/distributors");
  	}
  }

  public function edit() {
  	$this->regions = Region::all();
  	if (!$this->distributor = Distributor::find($this->id)) {
  		$_SESSION["danger"] = "Böyle bir Distribütör bulunmamaktadır";
  		return $this->redirect_to("/admin/distributors");
  	}
  }

  public function update() {
  	$_POST["updated_at"] = date("Y-m-d H:i:s");
  	$distributor = Distributor::update($_POST["id"], $_POST);

  	$image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
    	FileHelper::remove($distributor->image);
    	$distributor->image = FileHelper::move_f($image, "/upload/distributors", $distributor->id);
    	$distributor->save();
    }

    $_SESSION["info"] = "Distribütör güncellendi";
    $this->redirect_to("/admin/distributors/show/" . $distributor->id);
  }

  public function destroy() {
  	$distributor = Distributor::find($_POST["id"]);

  	FileHelper::remove($distributor->image);

  	$distributor->destroy();
  	$_SESSION["info"] = "Distribütör silindi";
  	return $this->redirect_to("/admin/distributors");
  }

}
?>