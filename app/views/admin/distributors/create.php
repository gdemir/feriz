<h4 class="page-title">Distribütör Ekle</h4>

<form class="form-horizontal" action="/admin/distributors/save" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="region_id">Bölge</label>
    <div class="col-sm-11">
      <select class="form-control" id="region_id" name="region_id">
        <?php foreach ($regions as $region) { ?>
        <option value="<?= $region->id; ?>"><?= $region->name; ?></option>
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
    <label class="col-sm-1 control-label" for="address">Adres</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="address" id="address"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="url">Url</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Url" class="form-control" name="url" id="url" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="phone">Telefon</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Telefon" class="form-control" name="phone" id="phone" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="fax">Fax</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Fax" class="form-control" name="fax" id="fax" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="email">E-Posta</label>
    <div class="col-sm-11">
      <input type="text" placeholder="E-Posta" class="form-control" name="email" id="email" />
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