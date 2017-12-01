<h4 class="page-title">Doküman Düzenle</h4>

<form class="form-horizontal" action="/admin/documents/update" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $document->id; ?>" name="id" id="id" />
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $document->name; ?>" class="form-control" name="name" id="name" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="path">Doküman</label>
    <div class="col-sm-11">
      <div class="thumbnail text-center">
        <a href="<?= $document->path; ?>" download><i class="fa fa-download fa-3x"></i></a>
        <input type="file" id="path" name="path" class="form-control" />
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