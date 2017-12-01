<h4 class="page-title">Doküman Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $document->name; ?>" class="form-control" name="name" id="name" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="path">Doküman</label>
    <div class="col-sm-11">
      <div class="thumbnail text-center">
        <a href="<?= $document->path; ?>" download><i class="fa fa-download fa-3x"></i></a>
      </div>
    </div>
  </div>
</div>

<form class="form-horizontal" action="/admin/documents/destroy" method="post">
  <input type="hidden" value="<?= $document->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/documents/edit/<?= $document->id; ?>">Düzenle</a>
      <input type="submit" class="btn btn-danger" value="sil"
      onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" />
    </div>
  </div>
</form>