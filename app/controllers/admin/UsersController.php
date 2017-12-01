<?php

class UsersController extends AdminController {

	public function index() {
		$this->users = User::all();
	}

	public function create() {}

	public function save() {
		$user = User::load()->where("username", $_POST["username"])->or_where("email", $_POST["email"])->count();
		if (!$user) {
      // rastgele bir parolar belirle
			$random_password = PasswordHelper::generate(8);
			$_POST["password"] = md5($random_password);

			$_POST["created_at"] = date("Y-m-d H:i:s");
			$user = User::create($_POST);

			$image = $_FILES["image"];
      if ($image["name"] != "") {// varsa yeni resmi ekle
      	$user->image = FileHelper::move_f($image, "/upload/users", $user->id);
      	$user->save();
      } else {
      	$user->image = FileHelper::copy("/app/assets/img/default.png", "/upload/users", $user->id . ".png");
      	$user->save();
      }

      $_SESSION["warning"] = "Güvenliği için bu kullanıcı parolasını güncellemelidir!";
      $_SESSION["success"] = "Kullanıcı adı: " . $user->username . "<br/> Parola: " . $random_password . "<br/>yeni kayıt oluşturuldu";
      $this->redirect_to("/admin/users/show/" . $user->id);
    } else {
    	$_SESSION["danger"] = "Kullanıcı adı ve/veya e-posta başka bir kullanıcı tarafından kullanılıyor!";
    	$this->redirect_to("/admin/users/create");
    }
  }

  public function show() {
  	if (!$this->user = User::find($this->id)) {
  		$_SESSION["danger"] = "Böyle bir Personel bulunmamaktadır";
  		return $this->redirect_to("/admin/users");
  	}
  }

  public function edit() {
  	if (!$this->user = User::find($this->id)) {
  		$_SESSION["danger"] = "Böyle bir Personel bulunmamaktadır";
  		return $this->redirect_to("/admin/users");
  	}
  }

  public function update() {
  	$user_ids = User::load()->where("username", $_POST["username"])->or_where("email", $_POST["email"])->pluck("id");

    // remove owner user_id
  	if (($user_id = array_search($_POST["id"], $user_ids)) !== false) unset($user_ids[$user_id]);

  	if (!$user_ids) {

      // yeni şifre girildiyse kaydet
  		if ($_POST['password'] != "") {
  			$_POST["password"] = md5($_POST["password"]);
  			$_SESSION["warning"] = "Parola güncellendi, güvenlik erişim için kullanıcı tekrardan parolayı güncellemelidir";
      } else { // boş işe parolaya dokanma
      	unset($_POST["password"]);
      }

      $user = User::find($_POST["id"]);
      foreach ($_POST as $key => $value) $user->$key = $value;
      $user->updated_at = date("Y-m-d H:i:s");
      $user->save();

      $image = $_FILES['image'];
      if ($image["name"] != "") {// varsa bir önceki resmi sil ve yeni resmi ekle
      	FileHelper::remove($user->image);
      	$user->image = FileHelper::move_f($image, "/upload/users", $user->id);
      	$user->save();
      }

      $_SESSION["info"] = "Personel güncellendi";
      $this->redirect_to("/admin/users/show/" . $user->id);
    } else {
    	$_SESSION["danger"] = "Kullanıcı adı ve/veya e-posta başka bir kullanıcı tarafından kullanılıyor!";
    	$this->redirect_to("/admin/users/edit/" . $_POST["id"]);
    }
  }

  public function destroy() {
  	$user = User::find($_POST["id"]);

  	FileHelper::remove($user->image);

  	$activations = $user->all_of_activation;
  	if ($activations) {
  		foreach ($activations as $activation) {
  			Activation::delete($activation->id);
  		}
  	}

  	$user->destroy();
  	$_SESSION["info"] = "Personel silindi";
  	return $this->redirect_to("/admin/users");
  }
}

?>