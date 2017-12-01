<h4 class="page-title">Distribütör Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="region_name">Bölge</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $distributor->region->name; ?>" class="form-control" name="region_name" id="region_name" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $distributor->name; ?>" class="form-control" name="name" id="name" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="address">Adres</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="address" id="address" disabled><?= $distributor->address; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="url">Url</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $distributor->url; ?>" class="form-control" name="url" id="url" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="phone">Telefon</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $distributor->phone; ?>" class="form-control" name="phone" id="phone" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="fax">Telefon</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $distributor->fax; ?>" class="form-control" name="fax" id="fax" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="email">E-posta</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $distributor->email; ?>" class="form-control" name="email" id="email" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $distributor->image; ?> " width="100" height="100" />
      </div>
    </div>
  </div>
</div>

<form class="form-horizontal" action="/admin/distributors/destroy" method="post">
  <input type="hidden" value="<?= $distributor->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/distributors/edit/<?= $distributor->id; ?>">Düzenle</a>
      <input type="submit" class="btn btn-danger" value="sil"
      onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" />
    </div>
  </div>
</form>