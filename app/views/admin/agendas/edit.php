<h4 class="page-title">Haber Düzenle</h4>

<form class="form-horizontal" action="/admin/agendas/update" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $agenda->id; ?>" name="id" id="id" />
  <div class="form-group">
    <label class="col-sm-1 control-label" for="subject">Konu</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $agenda->subject; ?>" class="form-control" name="subject" id="subject" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content"><?= $agenda->content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="notice_date">Tarih</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $agenda->agenda_date; ?>" class="form-control" name="agenda_date" id="agenda_date" />
    </div>
  </div>

  <?php if($agendaimages) { ?>
  <?php foreach ($agendaimages as $agendaimage) { ?>

  <div class="modal fade" id="MODAL<?= $agendaimage->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img src="<?= $agendaimage->image; ?>" class="img-thumbnail" id="<?= $agendaimage->id; ?>" width="600" />
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $agendaimage->image; ?>" class="img-responsive" data-toggle="modal" data-target="#MODAL<?= $agendaimage->id; ?>" style="max-height:100px"/>
        <input type="file" id="<?= $agendaimage->id ?>" name="<?= $agendaimage->id ?>" class="form-control">
      </div>
    </div>
  </div>

  <?php } ?>
  <?php } else { ?>

  <div class="form-group">
    <label class="col-sm-1 control-label">Resim</label>
    <div class="col-sm-11">
      <p class="text-center">Henüz Haber resimleri mevcut değil</p>
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
  $("#agenda_date").datepicker({
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