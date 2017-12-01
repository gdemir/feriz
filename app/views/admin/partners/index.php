<h4 class="page-title">Partnerler</h4>

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
    <?php if ($partners) { ?>
    <?php foreach ($partners as $partner) { ?>

    <tr>
      <td><?= $partner->id; ?></td>
      <td><?= $partner->name; ?></td>
      <td><?= $partner->created_at; ?></td>
      <td><?= $partner->updated_at; ?></td>

      <td>
        <form action="/admin/partners/destroy" method="post">
          <a href="/admin/partners/show/<?= $partner->id; ?>"
            class="btn btn-default" role="button" title="Göster"><i class="fa fa-search"></i>
          </a>

          <a href="/admin/partners/edit/<?= $partner->id; ?>"
            class="btn btn-default" role="button" title="Düzenle"><i class="fa fa-edit"></i>
          </a>

          <input type="hidden" value="<?= $partner->id; ?>" id="id" name="id"/>
          <button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
            <i class="fa fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>

    <?php } ?>
    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Partner mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/partners/create">Partner Ekle</a>