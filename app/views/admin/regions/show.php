<h4 class="page-title">Bölge Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $region->name; ?>" class="form-control" name="name" id="name" disabled />
    </div>
  </div>
</div>

<form class="form-horizontal" action="/admin/regions/destroy" method="post">
  <input type="hidden" value="<?= $region->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/regions/edit/<?= $region->id; ?>">Düzenle</a>
      <input type="submit" class="btn btn-danger" value="sil"
      onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" />
    </div>
  </div>
</form>