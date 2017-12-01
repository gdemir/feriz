<?php

class ProducttypesController extends AdminController {

  public function index() {
    $this->producttypes = Producttype::all();
  }

  public function create() {
    $this->categories = Category::all();
  }

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $producttype = Producttype::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
      $producttype->image = FileHelper::move_f($image, "/upload/producttypes", $producttype->id);
      $producttype->save();
    } else {
      $producttype->image = FileHelper::copy("/app/assets/img/default.png", "/upload/producttypes", $producttype->id . ".png");
      $producttype->save();
    }

    $_SESSION["success"] = "Yeni Ürün Tipi eklendi";
    $this->redirect_to("/admin/producttypes/show/" . $producttype->id);
  }

  public function show() {
    if (!$this->producttype = Producttype::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Ürün Tipi bulunmamaktadır";
      return $this->redirect_to("/admin/producttypes");
    }
  }

  public function edit() {
    $this->categories = Category::all();
    if (!$this->producttype = Producttype::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Ürün Tipi bulunmamaktadır";
      return $this->redirect_to("/admin/producttypes");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $producttype = Producttype::update($_POST["id"], $_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($producttype->image);
      $producttype->image = FileHelper::move_f($image, "/upload/producttypes", $producttype->id);
      $producttype->save();
    }

    $_SESSION["info"] = "Ürün tipi güncellendi";
    $this->redirect_to("/admin/producttypes/show/" . $producttype->id);
  }

  public function destroy() {

    $producttype = Producttype::find($_POST["id"]);
    if ($producttype->all_of_product)
      $_SESSION["danger"] = "Bu Ürün Tipinin Ürünleri olduğundan dolayı silinemez!";
    else {
      FileHelper::remove($producttype->image);

      $producttype->destroy();
      $_SESSION["info"] = "Ürün tipi silindi";
    }
    return $this->redirect_to("/admin/producttypes");
  }

}
?>