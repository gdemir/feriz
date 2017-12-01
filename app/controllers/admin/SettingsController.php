<?php

class SettingsController extends AdminController {

  public function show() {
    $this->settings = Setting::load()->order("name")->get_all();
  }

  public function edit() {
    $this->settings = Setting::load()->order("name")->get_all();
  }

  public function update() {
    foreach ($_POST as $name => $value) {
      $setting = Setting::unique(["name" => $name]);
      $setting->value = $value;
      $setting->save();
    }

    foreach ($_FILES as $name => $value) {
      $setting = Setting::unique(["name" => $name]);
      if ($value["name"] != "") {
        FileHelper::remove($setting->name);
        $setting->value = FileHelper::move_f($value, "/upload/settings", $setting->id);
        $setting->save();
      }
    }

    $_SESSION["info"] = "Ayarlar güncellendi";
    $this->redirect_to("/admin/settings/show/");
  }

}
?>