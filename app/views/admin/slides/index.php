<h4 class="page-title">Slaytlar</h4>

<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>İd</th>
      <th>Konu</th>
      <th>İçerik</th>
      <th>Oluştu</th>
      <th>Düzenlendi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($slides) { ?>
    <?php foreach ($slides as $slide) { ?>

    <tr>
      <td><?= $slide->id; ?></td>
      <td><?= $slide->subject; ?></td>
      <td><?= $slide->content; ?></td>
      <td><?= $slide->created_at; ?></td>
      <td><?= $slide->updated_at; ?></td>

      <td>
        <form action="/admin/slides/destroy" method="post">
          <a href="/admin/slides/show/<?= $slide->id; ?>"
            class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
          </a>

          <a href="/admin/slides/edit/<?= $slide->id; ?>"
            class="btn btn-default" role="button" title="Düzenle"><i class="fa fa-edit"></i>
          </a>

          <input type="hidden" value="<?= $slide->id; ?>" id="id" name="id"/>
          <button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Slayt mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/slides/create">Slayt Ekle</a>