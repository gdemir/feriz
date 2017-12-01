<?php

class Producttype extends ApplicationModel {

  public function name() {
    $locale = ApplicationI18n::get_locale();
    if ($locale == "tr")
      return $this->name;
    else if ($locale == "en")
      return $this->name_en;
  }

  public function content() {
    $locale = ApplicationI18n::get_locale();
    if ($locale == "tr")
      return $this->content;
    else if ($locale == "en")
      return $this->content_en;
  }

}

?>