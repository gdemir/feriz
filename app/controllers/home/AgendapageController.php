<?php

class AgendapageController extends HomeController {


  public function index() {

    $this->page = intval((isset($_POST["page"])) ? $_POST["page"] : 1);

    $id_size = 5;
    $id_begin = ($this->page - 1) * $id_size;

// güvenlik kontrolü, string date formatına dönüştür
    $this->prev_date = (isset($_POST["prev_date"])) ? DateTime::createFromFormat('Y-m-d', $_POST["prev_date"])->format("Y-m-d") : strval(date("Y") - 1) . "-01-01";
    $this->next_date = (isset($_POST["next_date"])) ? DateTime::createFromFormat('Y-m-d', $_POST["next_date"])->format("Y-m-d") : date("Y-m-d");

    $agenda_all_count = Agenda::load()->where("agenda_date", [$this->prev_date, $this->next_date], "between")->count();

    $this->agendas = Agenda::load()->where("agenda_date", [$this->prev_date, $this->next_date], "between")->limit($id_size)->offset($id_begin)->order("agenda_date","desc")->get_all();

    $agenda_size = $agenda_all_count - $id_begin;
    $this->page_count = ceil($agenda_all_count / $id_size);
    $this->page_prev = $this->page - 1;
    $this->page_next = ($this->page + $id_size < $this->page_count) ? $this->page + $id_size: $this->page + ceil($agenda_size / $id_size);
  }

  public function show() {
    if (!$this->agenda = Agenda::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir haber bulunmamaktadır";
      return $this->redirect_to("/home/agendas");
    }
  }

}

?>