<h4 class="page-title">Referans Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $reference->name; ?>" class="form-control" name="name" id="name" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content" disabled><?= $reference->content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $reference->image; ?> " width="100" height="100" />
      </div>
    </div>
  </div>
</div>

<form class="form-horizontal" action="/admin/references/destroy" method="post">
  <input type="hidden" value="<?= $reference->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/references/edit/<?= $reference->id; ?>">Düzenle</a>
      <input type="submit" class="btn btn-danger" value="sil"
      onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" />
    </div>
  </div>
</form>

<script type="text/javascript">
$(document).ready(function() {
  $('#content').prop('disabled', true);
  $('#content').summernote({
    toolbar: [],
    height: 200,
    minHeight: null,
    maxHeight: null,
    focus: true,
    lang: 'tr-TR'
  });
});
</script>