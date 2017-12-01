<h4 class="page-title">Albüm Ekle</h4>

<form class="form-horizontal" action="/admin/albums/save" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Ad" class="form-control" name="name" id="name"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="album_date">Tarih</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Albüm Tarihi" class="form-control" name="album_date" id="album_date"
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
  $("#album_date").datepicker({
    format: "yyyy-mm-dd"
  });
});
</script>
<script>
$("#file-add").click(function() {
  $("#file-new").append("<input type='file' id='images' name='images[]' multiple class='form-control'/>");
});
</script>