<?php

class AdminController extends ApplicationController {

  protected $before_actions = [
  ["require_login", "except" => ["login", "logout", "password_reset"]]
  ];

  protected $helpers = ["Bootstrap", "Page", "File", "Password"];

  public function login() {

    if (isset($_SESSION["admin"]))
      return $this->redirect_to("/admin/index");

    if (isset($_POST["username"]) and isset($_POST["password"])) { // post action?

      // $google_recaptchakey = Setting::unique(["name" => "site_googlerecaptchasecretkey"])->value;
      // $captcha = $_POST['g-recaptcha-response'];
      // $control = CaptchaHelper::google_parser("https://www.google.com/recaptcha/api/siteverify?secret=" . $google_recaptchakey . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
      // $control = json_decode($control);

      $google_recaptchasecretkey = Setting::unique(["name" => "site_googlerecaptchasecretkey"])->value;
      $recaptcha = new \ReCaptcha\ReCaptcha($google_recaptchasecretkey);
      $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

      if ($response->isSuccess() == true) {

        if ($_SESSION["admininfo"] = User::unique(
          ["username" => $_POST["username"], "password" => md5($_POST["password"]), "admin" => true]
          ))
        {

          $_SESSION["admin"] = true;
          $_SESSION["success"] = "Admin sayfasına hoş geldiniz";
          return $this->render("/admin/index");

        } else {

          $_SESSION["danger"] = "Oops! İsminiz veya şifreniz hatalı, belki de bunlardan sadece biri hatalıdır?";

        }
      } else {
        $_SESSION["info"] = "Robot olmadığınızı kanıtlamak için aşağıdaki kutucuğa tıklayın.";
      }
    }

    return $this->render(["layout" => "default"]);
  }

  // public function index() {} // OPTIONAL

  public function password_reset() {

    if (isset($this->code)) {
      // get password reset panel
      if ($activation = Activation::unique(["code" => $this->code])) {

        $this->activation = $activation;
        return $this->render(["layout" => "default", "template" => "/admin/password_reset"]);

      }
    } elseif (isset($_POST["activation_code"])) {
      // save new password
      if ($_POST["password"] === $_POST["password_confirmation"]) {

        $activation = Activation::unique(["code" => $_POST["activation_code"]]);
        $user = $activation->user;
        $user->password = md5($_POST["password"]);
        $user->save();

        // activation code delete!
        $activation->destroy();

        $_SESSION["info"] = "Yeni şifre başarıyla ayarlandı";
        return $this->redirect_to("/admin/login");
      } else {

        // not password does not match password confirmation
        $_SESSION["danger"] = "Şifre, şifre onayıyla eşleşmiyor!";
        return $this->redirect_to("/admin/password_reset/" . $_POST["activation_code"]);

      }
    } else {

      // email adresine sahip bir admin var mı ?
      if ($user = User::unique(["email" => $_POST["email"], "admin" => true])) {

        // önceden böyle bir code yoksa ekle
        do {
          $code = md5(PasswordHelper::generate(16));
        } while (Activation::unique(["code" => $code]));

        // yeni aktivasyon anahtarı oluştur
        Activation::create(["user_id" => $user->id, "code" => $code, "created_at" => date("Y-m-d H:i:s")]);

        // site url bilgisi
        $site_url = Setting::unique(["name" => "site_url"])->value;

        PasswordMailer::delivery("reset", [$code, $site_url, $user->email, $user->full_name()]);

        $_SESSION["success"] = "Şifre sıfırlama isteği E-posta adresinize gönderildi";

      } else {
        $_SESSION["danger"] = "Bu E-posta adresine sahip bir kullanıcı bulunamadı.";
      }
    }
    return $this->redirect_to("/admin/login");
  }


  public function password_update() {

    $this->user = $_SESSION["admininfo"];

    // action post mu?
    if (!empty($_POST))  {

      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
      $new_password_repeat = $_POST['new_password_repeat'];

      $admin_password = $_SESSION["admininfo"]->password;
      if ($admin_password != md5($old_password)) {
        $_SESSION['danger'] = "Eski parolayı yanlış girdiniz";
      } elseif ($new_password != $new_password_repeat) {
        $_SESSION['danger'] = "Yeni parolar aynı değil (eşleşmiyor)";
      } elseif ((strlen($new_password) < 8))  {
        $_SESSION['danger'] = "Parola en az 8 karakterli olmalıdır";
      } elseif (strpbrk($new_password, '0123456789') == "") {
        $_SESSION['danger'] = "Parola'da en az 1 rakam olmalıdır";
      } elseif (strpbrk($new_password, 'ABCÇDEFGĞHIİJKLMNOÖPQRSŞTUÜVWXYZ') == "") {
        $_SESSION['danger'] = "Parola'da en az 1 büyük harf olmalıdır";
      } elseif (strpbrk($new_password, 'abcçdefgğhıijklmnoöpqrsştuüvwxyz') == "") {
        $_SESSION['danger'] = "Parola'da en az 1 küçük harf olmalıdır";
      } elseif (!preg_match('/[\W]+/', $new_password)) {
        $_SESSION['danger'] = "Parola'da en az 1 özel karakter olmalıdır";
      }
      $admin_id = $_SESSION["admininfo"]->id;

      if (!isset($_SESSION['danger'])) {
        $new_password = md5($new_password);

        $_SESSION["admininfo"]->password = $new_password;
        User::update($admin_id, ["password" => $new_password, "updated_at" => date("Y-m-d H:i:s")]);

        $_SESSION['success'] = "Parola güncellendi";
      }
    } else {
      // action get formu getir
      $_SESSION['warning'] = "Lütfen parola bilgilerinizi başka kişilerle paylaşmayınız!";
    }
  }

  public function logout() {
    if (isset($_SESSION["admin"]))
      session_destroy();
    return $this->redirect_to("/admin/login");
  }

  public function require_login() {
    if (!isset($_SESSION["admin"])) {
      $_SESSION["warning"] = "Lütfen hesabınıza giriş yapın!";
      return $this->redirect_to("/admin/login");
    }
  }
}
?>