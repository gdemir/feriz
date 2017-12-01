<?php

class HomeController extends ApplicationController {

  // protected $after_actions = [["notice_mailer"]];

  protected $helpers = ["Page", "Bootstrap"];

  public function index() { }

  public function yandex() {
  	return $this->render(["text" => "d6eb9efdcaba"]);
  	exit();
  }

  public function notice_mailer() {
    // NoticeMailer::delivery("home");
  }
}
?>