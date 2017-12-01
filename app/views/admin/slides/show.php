<h4 class="page-title">Slayt Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="subject">Konu</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $slide->subject; ?>" class="form-control" name="subject" id="subject" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="subject_en">Konu [en]</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $slide->subject_en; ?>" class="form-control" name="subject_en" id="subject_en" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content" disabled><?= $slide->content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content_en">İçerik [en]</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content_en" id="content_en" disabled><?= $slide->content_en; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $slide->image; ?>" width="100" height="100" />
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="bg_image">Arka Plan</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $slide->bg_image; ?>" width="100" height="100" />
      </div>
    </div>
  </div>
</div>

<form class="form-horizontal" action="/admin/slides/destroy" method="post">
  <input type="hidden" value="<?= $slide->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/slides/edit/<?= $slide->id; ?>">Düzenle</a>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#content_en').prop('disabled', true);
    $('#content_en').summernote({
      toolbar: [],
      height: 200,
      minHeight: null,
      maxHeight: null,
      focus: true,
      lang: 'tr-TR'
    });
  });
</script>