<h4 class="page-title">Duyurular</h4>

<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>İd</th>
      <th>Ad</th>
      <th>İçerik</th>
      <th>Oluştu</th>
      <th>Düzenlendi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($notices) { ?>
    <?php foreach ($notices as $notice) { ?>

    <tr>
      <td><?= $notice->id; ?></td>
      <td><?= $notice->subject; ?></td>
      <td><?= $notice->content; ?></td>
      <td><?= $notice->created_at; ?></td>
      <td><?= $notice->updated_at; ?></td>

      <td>
        <form action="/admin/notices/destroy" method="post">
          <a href="/admin/notices/show/<?= $notice->id; ?>"
            class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
          </a>

          <a href="/admin/notices/edit/<?= $notice->id; ?>"
            class="btn btn-default" role="button" title="Düzenle"><i class="fa fa-edit"></i>
          </a>

          <input type="hidden" value="<?= $notice->id; ?>" id="id" name="id"/>
          <button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Duyuru mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/notices/create">Duyuru Ekle</a>