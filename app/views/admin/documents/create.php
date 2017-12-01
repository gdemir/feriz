<h4 class="page-title">Doküman Ekle</h4>

<form class="form-horizontal" action="/admin/documents/save" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" placeholder="Ad" class="form-control" name="name" id="name" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="path">Doküman</label>
    <div class="col-sm-11">
      <input type="file" id="path" name="path" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="submit" class="btn btn-primary">Oluştur</button>
    </div>
  </div>
</form>