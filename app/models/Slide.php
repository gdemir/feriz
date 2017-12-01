<?php

class Slide extends ApplicationModel {

  public function subject() {
    $locale = ApplicationI18n::get_locale();
    if ($locale == "tr")
      return $this->subject;
    else if ($locale == "en")
      return $this->subject_en;
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