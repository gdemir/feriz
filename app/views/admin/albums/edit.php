<h4 class="page-title">Albüm Düzenle</h4>

<form class="form-horizontal" action="/admin/albums/update" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $album->id; ?>" name="id" id="id" />
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $album->name; ?>" class="form-control" name="name" id="name" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="notice_date">Tarih</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $album->album_date; ?>" class="form-control" name="album_date" id="album_date" />
    </div>
  </div>

  <?php if($albumimages) { ?>
  <?php foreach ($albumimages as $albumimage) { ?>

  <div class="modal fade" id="MODAL<?= $albumimage->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img src="<?= $albumimage->image; ?>" class="img-thumbnail" id="<?= $albumimage->id; ?>" width="600" />
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $albumimage->image; ?>" class="img-responsive" data-toggle="modal" data-target="#MODAL<?= $albumimage->id; ?>" style="max-height:100px"/>
        <input type="file" id="<?= $albumimage->id ?>" name="<?= $albumimage->id ?>" class="form-control">
      </div>
    </div>
  </div>

  <?php } ?>
  <?php } else { ?>
  <div class="form-group">
    <label class="col-sm-1 control-label">Resim</label>
    <div class="col-sm-11">
      <p class="text-center">Henüz Albüm resimleri mevcut değil</p>
    </div>
  </div>

  <?php } ?>

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <div id="file-new"></div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="button" class="btn btn-default" id="file-add">Dosya Ekle</button>
      <button type="submit" class="btn btn-primary"
      onClick="return confirm('Güncellemek istediğinizden emin misiniz?');">Güncelle</button>
    </div>
  </div>
</form>

<script type="text/javascript">
$(document).ready(function() {
  $.fn.datepicker.defaults.language = 'tr';
  $("#album_date").datepicker({
    format: "yyyy-mm-dd"
  });
});
</script>
<script>
$("#file-add").click(function() {
  $("#file-new").append("<input type='file' id='images' name='images[]' multiple class='form-control'>");
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#content').summernote({
    height: 200,
    minHeight: null,
    maxHeight: null,
    focus: true,
    lang: 'tr-TR'
  });
});
</script>