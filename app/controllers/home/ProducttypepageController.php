<?php

class ProducttypepageController extends HomeController {

  public function find() {
    if (!isset($_POST["producttype_id"])) {
      $_SESSION["warning"] = "Geçerli bir kategoriye ait ürün tipi seçmelisiniz!";
      return $this->redirect_to("/home/products/search");
    }

    if (!$producttype = Producttype::find($_POST["producttype_id"])) {
      $_SESSION["info"] = "Seçtiğiniz ürün tipi şu an bulunmamaktadır!";
      return $this->redirect_to("/home/products/search");
    }

    return $this->redirect_to("/home/producttypes/show/" . $producttype->id);
  }

  public function show() {
    if (!$this->producttype = Producttype::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir ürün tipi bulunmamaktadır";
      return $this->redirect_to("/home/categories");
    }
    $this->products = $this->producttype->all_of_product;
  }

}

?>