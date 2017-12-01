<?php

class AgendaimagesController extends AdminController {

  public function destroy() {
    $agendaimage = Agendaimage::find($_POST["id"]);
    if ($agendaimage) {

      $agenda_id = $agendaimage->agenda_id;
      FileHelper::remove($agendaimage->image);

      $_SESSION["info"] = "Haber resmi silindi";
      $agendaimage->destroy();
      return $this->redirect_to("/admin/agendas/show/" . $agenda_id);

    } else {
      $_SESSION["danger"] = "Silmek istediğiniz haber resmi mevcut değil";
      return $this->redirect_to("/admin/agendas");
    }
  }

}
?>