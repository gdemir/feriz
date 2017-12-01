<?php

class CategoriesController extends AdminController {


  public function index() {
    $this->categories = Category::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $category = Category::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle

      $category->image = FileHelper::move_f($image, "/upload/categories", $category->id);
      $category->save();
    } else {
      $category->image = FileHelper::copy("/app/assets/img/default.png", "/upload/categories", $category->id . ".png");
      $category->save();
    }

    $_SESSION["success"] = "Yeni Kategori eklendi";
    $this->redirect_to("/admin/categories/show/" . $category->id);
  }

  public function show() {
    if (!$this->category = Category::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Kategori bulunmamaktadır";
      return $this->redirect_to("/admin/categories");
    }
  }

  public function edit() {
    if (!$this->category = Category::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Kategori bulunmamaktadır";
      return $this->redirect_to("/admin/categories");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $category = Category::update($_POST["id"], $_POST);

    $image = $_FILES['image'];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($category->image);
      $category->image = FileHelper::move_f($image, "/upload/categories", $category->id);
      $category->save();
    }

    $_SESSION["info"] = "Kategori güncellendi";
    $this->redirect_to("/admin/categories/show/" . $category->id);
  }

  public function destroy() {
    $category = Category::find($_POST["id"]);
    if ($category->all_of_producttype)
      $_SESSION["danger"] = "Bu Kategorinin Ürün Tipleri olduğundan dolayı silinemez!";
    else {
      FileHelper::remove($category->image);
      $category->destroy();

      $_SESSION["info"] = "Kategori silindi";
    }
    return $this->redirect_to("/admin/categories");
  }
}

?>