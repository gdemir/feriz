<h4 class="page-title">Ürün Tipi Ekle</h4>

<form class="form-horizontal" action="/admin/producttypes/save" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="category_id">Kategori</label>
    <div class="col-sm-11">
      <select class="form-control" id="category_id" name="category_id">
        <?php foreach ($categories as $category) { ?>
        <option value="<?= $category->id; ?>"><?= $category->name(); ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Ad" class="form-control" name="name" id="name" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name_en">Ad [en]</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Ad" class="form-control" name="name_en" id="name_en" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content_en">İçerik [en]</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content_en" id="content_en"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <input type="file" id="image" name="image" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="submit" class="btn btn-primary">Oluştur</button>
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