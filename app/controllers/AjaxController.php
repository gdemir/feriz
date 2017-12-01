<?php

class AjaxController extends ApplicationController {

  public function producttype() {
    $producttypes = Producttype::load()->where("category_id", $_POST['category_id'])->get_all();
    $text = "";
    if ($producttypes) {
      foreach ($producttypes as $producttype)
        $text .= "<option value='" . $producttype->id . "'>" . $producttype->name() . "</option>";
    }
    return $this->render(["text" => $text]);
  }

  // public function product() {
  //   $products = Product::load()->where(["producttype_id" => $_POST['producttype_id']])->get_all();
  //   $text = "";
  //   foreach ($products as $product)
  //     $text .= "<option value='" . $product->id . "'>" . $product->name . "</option>";
  //   $this->render(["text" => $text]);
  // }

}

?>