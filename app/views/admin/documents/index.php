<h4 class="page-title">Dokümanlar</h4>

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
    <?php if ($documents) { ?>
    <?php foreach ($documents as $document) { ?>

    <tr>
      <td><?= $document->id; ?></td>
      <td><?= $document->name; ?></td>
      <td><?= $document->created_at; ?></td>
      <td><?= $document->updated_at; ?></td>

      <td>
        <form action="/admin/documents/destroy" method="post">
          <a href="/admin/documents/show/<?= $document->id; ?>"
            class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
          </a>

          <a href="/admin/documents/edit/<?= $document->id; ?>"
            class="btn btn-default" role="button" title="Düzenle"><i class="fa fa-edit"></i>
          </a>

          <input type="hidden" value="<?= $document->id; ?>" id="id" name="id"/>
          <button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Doküman mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/documents/create">Doküman Ekle</a>