<h4 class="page-title">Kategori Düzenle</h4>

<form class="form-horizontal" action="/admin/categories/update" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $category->id; ?>" name="id" id="id" />
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $category->name; ?>" class="form-control" name="name" id="name" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name_en">Ad [en]</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $category->name_en; ?>" class="form-control" name="name_en" id="name_en" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content"><?= $category->content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content_en">İçerik [en]</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content_en" id="content_en"><?= $category->content_en; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $category->image; ?>" width="100" height="100" />
        <input type="file" id="image" name="image" class="form-control" />
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="submit" class="btn btn-primary"
      onClick="return confirm('Güncellemek istediğinizden emin misiniz?');">Güncelle</button>
    </div>
  </div>
</form>

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
<script type="text/javascript">
$(document).ready(function() {
  $('#content_en').summernote({
    height: 200,
    minHeight: null,
    maxHeight: null,
    focus: true,
    lang: 'tr-TR'
  });
});
</script>