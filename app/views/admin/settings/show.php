<h4 class="page-title">Site Bilgileri</h4>

<div class="form-horizontal">
  <?php foreach ($settings as $setting) { ?>
  <div class="form-group">
    <label class="col-sm-3 control-label" for="subject"><?= $setting->name; ?></label>
    <div class="col-sm-9">
      <?php if (preg_match("/image/", $setting->name)) { ?>
      <div class="thumbnail">
        <img src="<?= $setting->value; ?>" width="100" height="100" />
      </div>
      <?php } elseif (preg_match("/address/", $setting->name) or $setting->name == "site_about") { ?>
      <textarea class="form-control" rows="5" name="<?= $setting->name; ?>" id="<?= $setting->name; ?>" disabled><?= $setting->value; ?></textarea>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#<?= $setting->name; ?>').prop('disabled', true);
          $('#<?= $setting->name; ?>').summernote({
            toolbar: [],
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: true,
            lang: 'tr-TR'
          });
        });
      </script>
      <?php } else { ?>
      <input type="text" value="<?= $setting->value; ?>" class="form-control" name="<?= $setting->name; ?>" id="<?= $setting->name; ?>" disabled />
      <?php } ?>
    </div>
  </div>
  <?php } ?>
</div>

<form class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <a class="btn btn-primary" href="/admin/settings/edit">Düzenle</a>
    </div>
  </div>
</form>