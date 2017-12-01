<h4 class="page-title">Haber Bilgileri</h4>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label" for="subject">Konu</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $agenda->subject; ?>" class="form-control" name="subject" id="subject" disabled />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="content">İçerik</label>
    <div class="col-sm-11">
      <textarea class="form-control" rows="10" name="content" id="content" disabled><?= $agenda->content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="agenda_date">Tarih</label>
    <div class="col-sm-11">
      <input type="text" value="<?= $agenda->agenda_date; ?>" class="form-control" name="agenda_date" id="agenda_date" disabled />
    </div>
  </div>

  <?php if($agendaimages) { ?>
  <?php foreach ($agendaimages as $agendaimage) { ?>

  <div class="modal fade" id="<?= $agendaimage->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img src="<?= $agendaimage->image; ?>" class="img-responsive" id="<?= $agendaimage->id; ?>" width="600" />
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="image">Resim</label>
    <div class="col-sm-11">
      <div class="thumbnail" >
        <img src="<?= $agendaimage->image; ?>" class="img-responsive" data-toggle="modal" data-target="#<?= $agendaimage->id; ?>" style="max-height:100px" />
        <form action="/admin/agendaimages/destroy" method="post">
          <input type="hidden" value="<?= $agendaimage->id; ?>" id="id" name="id" />
          <button type="submit" class="btn btn-default" style="width:100%" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title='Sil'>
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </div>
    </div>
  </div>

  <?php } ?>
  <?php } else { ?>

  <div class="form-group">
    <label class="col-sm-1 control-label">Resim</label>
    <div class="col-sm-11">
      <p class="text-center">Henüz Haber resimleri mevcut değil</p>
    </div>
  </div>
  <?php } ?>
</div>

<form class="form-horizontal" action="/admin/agendas/destroy" method="post">
  <input type="hidden" value="<?= $agenda->id; ?>" id="id" name="id" />
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <a class="btn btn-primary" href="/admin/agendas/edit/<?= $agenda->id; ?>">Düzenle</a>
      <input type="submit" class="btn btn-danger" value="sil"
      onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" />
    </div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function() {
    $('#content').prop('disabled', true);
    $('#content').summernote({
      toolbar: [],
      height: 200,
      minHeight: null,
      maxHeight: null,
      focus: true,
      lang: 'tr-TR'
    });
  });
</script>