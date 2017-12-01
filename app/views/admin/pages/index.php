<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
  $('#example2').dataTable( {
    "responsive": true,
    "language": {
      "lengthMenu": "Gösterilen _MENU_ adet satır",
      "zeroRecords": "Kayıt Bulunamadı",
      "info": "Toplam _PAGES_ sayfadan _PAGE_ sayfa gösteriliyor",
      "infoEmpty": "Kayıt Sayısı Yok",
      "infoFiltered": "(Toplam _MAX_ gönderi filtrelendi)",
      "search": "Ara",
      "paginate": {
        "previous": "Önceki",
        "next": "Sonraki"
      }
    }
  });
});
</script>

<h4 class="page-title">Sayfalar</h4>

<!-- id="examle" -->
<table id="example2" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>İd</th>
      <th>Başlık</th>
      <th>Oluştu</th>
      <th>Düzenlendi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($parent_pages) { ?>

    <?php foreach ($parent_pages as $parent_page) { ?>

    <?= PageHelper::table_rows([$parent_page]); ?>

    <?php } ?>

    <?php } else { ?>
    <tr class="text-center"><td colspan="4">Henüz Sayfa mevcut değil</td></tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="/admin/pages/create">Sayfa Ekle</a>