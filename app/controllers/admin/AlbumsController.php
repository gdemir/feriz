<?php

class AlbumsController extends AdminController {

  public function index() {
    $this->albums = Album::all();
  }

  // public function create() {}

  public function save() {
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $album = Album::create($_POST);

    // yeni resim varsa ekle
    $images = (isset($_FILES["images"])) ? $_FILES["images"] : $files = null;

    if (!is_null($images)) {
      $imagenames = $images["name"];
      $tmpnames = $images["tmp_name"];

      for ($i = 0; $i < count($imagenames); $i++) {

        $image = ["name" => $imagenames[$i], "tmp_name" => $tmpnames[$i], "size" => $sizes[$i]];
        if ($image["name"] != "") {
          $albumimage = Albumimage::draft();
          $albumimage->album_id = $album->id;
          $albumimage->save();

          $albumimage->image = FileHelper::move_f($image, "/upload/albums/" . $album->id, $albumimage->id);
          $albumimage->save();
        }
      }
    } else {
      $albumimage = Albumimage::draft();
      $albumimage->album_id = $album->id;
      $albumimage->save();
      $albumimage->image = FileHelper::copy("/app/assets/img/default.png", "/upload/albums/" . $album->id, $albumimage->id . ".png");
      $albumimage->save();
    }

    $_SESSION["success"] = "Yeni Albüm eklendi";
    $this->redirect_to("/admin/albums/show/" . $album->id);
  }

  public function show() {
    if (!$this->album = Album::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Albüm bulunmamaktadır";
      return $this->redirect_to("/admin/albums");
    }
    $this->albumimages = $this->album->all_of_albumimage;
  }

  public function edit() {
    if (!$this->album = Album::find($this->id)) {
      $_SESSION["danger"] = "Böyle bir Albüm bulunmamaktadır";
      return $this->redirect_to("/admin/albums");
    }
    $this->albumimages = $this->album->all_of_albumimage;

  }

  public function update() {
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    $album = Album::update($_POST["id"], $_POST);

    // mevcut resimleri var ise
    $albumimages = $album->all_of_albumimage;
    if ($albumimages) {
      foreach ($albumimages as $albumimage) {
        $albumimage_id = $albumimage->id;
        $image = $_FILES[$albumimage_id];

        // varsa bir önceki resmi sil ve yeni resmi ekle
        if ($image["name"] != "") {
          FileHelper::remove($albumimage->image);
          $albumimage->image = FileHelper::move_f($image, "/upload/albums/" . $album->id, $albumimage->id);
          $albumimage->save();
        }
      }
    }

    // yeni resim ekleme isteği varsa ekle
    $images = (isset($_FILES["images"])) ? $_FILES["images"] : $files = null;
    if (!is_null($images)) {
      $imagenames = $images["name"];
      $tmpnames = $images["tmp_name"];
      $sizes = $images["size"];

      for ($i = 0; $i < count($imagenames); $i++) {

        $image = ["name" => $imagenames[$i], "tmp_name" => $tmpnames[$i], "size" => $sizes[$i]];

        if ($image["name"] != "") {

          $albumimage = Albumimage::draft();
          $albumimage->album_id = $album->id;
          $albumimage->save();

          $albumimage->image = FileHelper::move_f($image, "/upload/albums/" . $album->id, $albumimage->id);
          $albumimage->save();
        }
      }
    }

    $_SESSION["info"] = "Albüm güncellendi";
    $this->redirect_to("/admin/albums/show/" . $album->id);
  }

  public function destroy() {
    $album = Album::find($_POST["id"]);

    $albumimages = $album->all_of_albumimage;
    if ($albumimages) {
      foreach ($albumimages as $albumimage) {
        FileHelper::remove($albumimage->image);
        $albumimage->destroy();
      }
    }

    $album->destroy();
    $_SESSION["info"] = "Albüm silindi";
    return $this->redirect_to("/admin/albums");
  }

}
?>