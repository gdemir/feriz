<?php

class ActivationsController extends AdminController {

  public function index() {
    // remove 1 hour
    $time = strtotime(date("Y-m-d H:i:s")) - 3600;
    $this->activation_live_count = Activation::load()->where("created_at", date("Y-m-d H:i:s", $time), ">=")->count();
    $this->activation_dead_count = Activation::load()->where("created_at", date("Y-m-d H:i:s", $time), "<")->count();
    $this->activations = Activation::all();
  }

  public function destroy_live() {
    // remove 1 hour
    $time = strtotime(date("Y-m-d H:i:s")) - 3600;
    Activation::load()->where("created_at", date("Y-m-d H:i:s", $time), ">=")->delete_all();
    $this->redirect_to("/admin/activations");
  }

  public function destroy_dead() {
    // remove 1 hour
    $time = strtotime(date("Y-m-d H:i:s")) - 3600;
    Activation::load()->where("created_at", date("Y-m-d H:i:s", $time), "<")->delete_all();
    $this->redirect_to("/admin/activations");
  }

  public function destroy_all() {
    // remove 1 hour
    $time = strtotime(date("Y-m-d H:i:s")) - 3600;
    Activation::load()->where("created_at", date("Y-m-d H:i:s", $time), ">=")->delete_all();
    Activation::load()->where("created_at", date("Y-m-d H:i:s", $time), "<")->delete_all();
    $this->redirect_to("/admin/activations");
  }

  public function destroy() {
    Activation::delete($_POST["id"]);
    $_SESSION["info"] = "Aktivasyon silindi";
    return $this->redirect_to("/admin/activations");
  }

}

?>