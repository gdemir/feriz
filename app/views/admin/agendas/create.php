<h4 class="page-title">Haber Ekle</h4>

<form class="form-horizontal" action="/admin/agendas/save" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="subject">Konu</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Konu" class="form-control" name="subject" id="subject"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="agenda_date">Tarih</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Haber Tarihi" class="form-control" name="agenda_date" id="agenda_date"
      value="<?= date("Y-m-d"); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <div id="file-new"></div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="button" class="btn btn-default" id="file-add">Dosya Ekle</button>
      <button type="submit" class="btn btn-primary">Oluştur</button>
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
  $("#file-new").append("<input type='file' id='images' name='images[]' multiple class='form-control'/>");
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