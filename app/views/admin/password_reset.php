<div class="panel panel-success" style="box-shadow: 0 3px 12px rgba(0, 0, 0, 0.3);">
  <div class="panel-heading">
    <h4 class="panel-title">
      <center>
        Parola Değiştir<br />
        (<?= $activation->user->full_name(); ?>)
      </center>
    </h4>
  </div>
  <div class="panel-body">

    <form class="login-form" action="/admin/password_reset" accept-charset="UTF-8" method="post">
      <input type="hidden" value="<?= $activation->code; ?>" name="activation_code" id="activation_code" />
      <input type="password" placeholder="Parola" class="form-control" name="password" id="password" />
      <input type="password" placeholder="Parola Tekrar" class="form-control" name="password_confirmation" id="password_confirmation" />
      <button type="submit" class="btn btn-success btn-block">GÜNCELLE</button>
    </form>

  </div>
  <div class="panel-footer">
    Copyright &copy; <?php echo date("Y"); ?>
  </div>
</div>