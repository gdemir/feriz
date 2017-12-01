<?php

class DocumentsController extends AdminController {

	public function index() {
		$this->documents = Document::all();
	}

  // public function create() {}

	public function save() {
		$_POST["created_at"] = date("Y-m-d H:i:s");
		$document = Document::create($_POST);

		$path = $_FILES["path"];
    if ($path["name"] != "") {// varsa yeni resmi ekle
    	$document->path = FileHelper::move_f($path, "/upload/documents", $document->id);
    	$document->save();
    } else {
    	$document->path = FileHelper::copy("/app/assets/img/default.png", "/upload/documents", $document->id . ".png");
    	$document->save();
    }

    $_SESSION["success"] = "Yeni Doküman eklendi";
    $this->redirect_to("/admin/documents/show/" . $document->id);
  }

  public function show() {
  	if (!$this->document = document::find($this->id)) {
  		$_SESSION["danger"] = "Böyle bir Doküman bulunmamaktadır";
  		return $this->redirect_to("/admin/documents");
  	}
  }

  public function edit() {
  	if (!$this->document = document::find($this->id)) {
  		$_SESSION["danger"] = "Böyle bir Doküman bulunmamaktadır";
  		return $this->redirect_to("/admin/documents");
  	}
  }

  public function update() {
  	$_POST["updated_at"] = date("Y-m-d H:i:s");
  	$document = Document::update($_POST["id"], $_POST);

  	$path = $_FILES["path"];
    if ($path["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
    	FileHelper::remove($document->path);
    	$document->path = FileHelper::move_f($path, "/upload/documents", $document->id);
    	$document->save();
    }

    $_SESSION["info"] = "Doküman güncellendi";
    $this->redirect_to("/admin/documents/show/" . $document->id);
  }

  public function destroy() {
  	$document = document::find($_POST["id"]);

  	FileHelper::remove($document->path);

  	$document->destroy();
  	$_SESSION["info"] = "Doküman silindi";
  	return $this->redirect_to("/admin/documents");
  }

}
?>