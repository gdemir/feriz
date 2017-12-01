<h4 class="page-title">Albüm Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="name">Ad</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $album->name; ?>" class="form-control" name="name" id="name" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="album_date">Tarih</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $album->album_date; ?>" class="form-control" name="album_date" id="album_date" disabled />
    </div>
  </div>

  <?php if($albumimages) { ?>
  <?php foreach ($albumimages as $albumimage) { ?>

  <div class="modal fade" id="<?= $albumimage->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img src="<?= $albumimage->image; ?>" class="img-responsive" id="<?= $albumimage->id; ?>" width="600" />
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail">
        <img src="<?= $albumimage->image; ?>" class="img-responsive" data-toggle="modal" data-target="#<?= $albumimage->id; ?>" style="max-height:100px" />
        <form action="/admin/albumimages/destroy" method="post">
          <input type="hidden" value="<?= $albumimage->id; ?>" id="id" name="id" />
          <button type="submit" class="btn btn-default" style="width:100%" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title='Sil'>
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </div>
    </div>
  </div>

  <?php } ?>
  <?php } else { ?>
  <tr class="text-center"><td colspan="4">Henüz Albüm resimleri mevcut değil</td></tr>
  <?php } ?>
</div>

<form class="form-horizontal" action="/admin/albums/destroy" method="post">
  <input type="hidden" value="<?= $album->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/albums/edit/<?= $album->id; ?>">Düzenle</a>
      <input type="submit" class="btn btn-danger" value="sil"
      onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" />
    </div>
  </div>
</form>