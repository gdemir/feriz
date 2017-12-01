<?php

class ProductsController extends AdminController {

  public function index() {
    $this->products = Product::all();
  }

  public function create() {
    $this->categories = Category::all();
  }

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    unset($_POST["category_id"]);
    $product = Product::create($_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa yeni resmi ekle
      $product->image = FileHelper::move_f($image, "/upload/products/image", $product->id);
      $product->save();
    } else {
      $product->image = FileHelper::copy("/app/assets/img/default.png", "/upload/products/image", $product->id . ".png");
      $product->save();
    }

    $file = $_FILES["file"];
    if ($file["name"] != "") {// varsa yeni resmi ekle
      $product->file = FileHelper::move_f($file, "/upload/products/file", $product->id);
      $product->save();
    } else {
      $product->file = FileHelper::copy("/app/assets/img/default.png", "/upload/products/image", $product->id . ".png");
      $product->save();
    }

    $_SESSION["success"] = "Yeni Ürün eklendi";
    $this->redirect_to("/admin/products/show/" . $product->id);
  }

  public function show() {
    if (!$this->product = Product::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Ürün bulunmamaktadır";
      return $this->redirect_to("/admin/products");
    }
  }

  public function edit() {
    $this->categories = Category::all();
    if (!$this->product = Product::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Ürün bulunmamaktadır";
      return $this->redirect_to("/admin/products");
    }
  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $product = Product::update($_POST["id"], $_POST);

    $image = $_FILES["image"];
    if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      FileHelper::remove($product->image);
      $product->image = FileHelper::move_f($image, "/upload/products/image", $product->id);
      $product->save();
    }

    $file = $_FILES["file"];
    if ($file["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      $product->file = FileHelper::move_f($file, "/upload/products/file", $product->id);
      $product->save();
    }

    $_SESSION["info"] = "Ürün güncellendi";
    $this->redirect_to("/admin/products/show/" . $product->id);
  }

  public function destroy() {
    $product = Product::find($_POST["id"]);

    FileHelper::remove($product->image);
    FileHelper::remove($product->file);

    $product->destroy();
    $_SESSION["info"] = "Ürün silindi";
    return $this->redirect_to("/admin/products");
  }

}
?>