<?php

class Page extends ApplicationModel {

  public function title() {
    $locale = ApplicationI18n::get_locale();
    if ($locale == "tr")
      return $this->title;
    else if ($locale == "en")
      return $this->title_en;
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