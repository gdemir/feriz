<?php

class AlbumimagesController extends AdminController {

  public function destroy() {
    $albumimage = Albumimage::find($_POST["id"]);
    if ($albumimage) {

      $album_id = $albumimage->album_id;
      FileHelper::remove($albumimage->image);

      $_SESSION["info"] = "Albüm resmi silindi";
      $albumimage->destroy();
      return $this->redirect_to("/admin/albums/show/" . $album_id);

    } else {
      $_SESSION["danger"] = "Silmek istediğiniz Albüm resmi mevcut değil";
      return $this->redirect_to("/admin/albums");
    }
  }

}
?>