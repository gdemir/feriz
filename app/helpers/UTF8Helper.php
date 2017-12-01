<?php

class UTF8Helper {

  public static function days($index) {
    $_days = array("Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar");
    return $_days[$index];
  }

  public static function months($index) {
    $_months = array(
      "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran",
      "Temmuz", "Ağustos", "Eylül", "Ekim ", "Kasım ", "Aralık",
      );
    return $_months[$index];
  }
}

?>