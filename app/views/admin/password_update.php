<h4 class="page-title">Parola Değiştir</h4>

<blockquote>
  <code>UYARI</code>:
  <i class="text-info">
    <ul class="col-sm-offset-1">
      <li>Şifreniz en az 8 karakterden oluşmalıdır</li>
      <li>Büyük, küçük harfler ve rakamların her biri en az 1 defa kullanılmalıdır</li>
      <li>"?, @, !, #, %, +, -, *, %" gibi özel karakterler en az 1 defa kullanılmalıdır</li>
    </ul>
  </i>
</blockquote>

<form class="form-horizontal" action="/admin/password_update" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $user->id; ?>" name="id" id="id" />
  <div class="form-group">
    <label class="col-sm-1 control-label" for="old_password">Eski Parola</label>
    <div class="col-sm-11">
      <input type="password" placeholder="Eski parolayı yazın" class="form-control" name="old_password" id="old_password" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="new_password">Yeni Parola</label>
    <div class="col-sm-11">
      <input type="password" placeholder="Yeni parolayı yazın" class="form-control" name="new_password" id="new_password" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-1 control-label" for="new_password_repeat">Yeni Parola(tekrar)</label>
    <div class="col-sm-11">
      <input type="password" placeholder="Yeni parolayı tekrar yazın" class="form-control" name="new_password_repeat" id="new_password_repeat" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="submit" class="btn btn-primary">Güncelle</button>
    </div>
  </div>
</form>