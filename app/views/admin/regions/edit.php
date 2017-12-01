<h4 class="page-title">Bölge Düzenle</h4>

<form class="form-horizontal" action="/admin/regions/update" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $region->id; ?>" name="id" id="id" />
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $region->name; ?>" class="form-control" name="name" id="name" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="submit" class="btn btn-primary"
      onClick="return confirm('Güncellemek istediğinizden emin misiniz?');">Güncelle</button>
    </div>
  </div>
</form>