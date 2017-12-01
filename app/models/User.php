<?php

class User extends ApplicationModel {

  public function full_name() {
    return $this->first_name . " " . $this->last_name;
  }

}

?>