<h4 class="page-title">Albümler</h4>

<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>İd</th>
      <th>Ad</th>
      <th>Oluştu</th>
      <th>Düzenlendi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($albums) { ?>
    <?php foreach ($albums as $album) { ?>

    <tr>
      <td><?= $album->id; ?></td>
      <td><?= $album->name; ?></td>
      <td><?= $album->created_at; ?></td>
      <td><?= $album->updated_at; ?></td>

      <td>
        <form action="/admin/albums/destroy" method="post">
          <a href="/admin/albums/show/<?= $album->id; ?>"
            class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
          </a>

          <a href="/admin/albums/edit/<?= $album->id; ?>"
            class="btn btn-default" role="button" title="Düzenle"><i class="fa fa-edit"></i>
          </a>

          <input type="hidden" value="<?= $album->id; ?>" id="id" name="id"/>
          <button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Albüm mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/albums/create">Albüm Ekle</a>