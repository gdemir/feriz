<h4 class="page-title">Haberler</h4>

<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>İd</th>
      <th>Konu</th>
      <th>Oluştu</th>
      <th>Düzenlendi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($agendas) { ?>
    <?php foreach ($agendas as $agenda) { ?>

    <tr>
      <td><?= $agenda->id; ?></td>
      <td><?= $agenda->subject; ?></td>
      <td><?= $agenda->created_at; ?></td>
      <td><?= $agenda->updated_at; ?></td>

      <td>
        <form action="/admin/agendas/destroy" method="post">
          <a href="/admin/agendas/show/<?= $agenda->id; ?>"
            class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
          </a>

          <a href="/admin/agendas/edit/<?= $agenda->id; ?>"
            class="btn btn-default" role="button" title="Düzenle"><i class="fa fa-edit"></i>
          </a>

          <input type="hidden" value="<?= $agenda->id; ?>" id="id" name="id"/>
          <button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Haber mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/agendas/create">Haber Ekle</a>