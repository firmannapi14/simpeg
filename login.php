`<?php 
  include 'config/connection.php';
  include 'config/global_vars.php';
  date_default_timezone_set('Asia/Jakarta');
  $status_message = '';

  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $password = encrypt_decrypt('encrypt', $_POST['password']);
    $status_message = check_user_login($id, $password) ?: 'failed';
    
    if (check_user_login($id, $password)) {
      setcookie('user_simpeg', encrypt_decrypt('encrypt', check_user_login($id, $password)), time() + (86400 * 30), "/");
      echo "<meta http-equiv='refresh' content='1;
      url=index.php?page=beranda'>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sistem informasi kepegawaian - Lapan Biak">
    <meta name="author" content="Lapan Biak">
    <meta name="keyword" content="Sistem informasi kepegawaian - Lapan Biak">
    <title>Login - SIMPEG BALAI LAPAN BIAK</title>
    <link rel="icon" href="./dist/assets/favicon/favicon.png" type="image/x-icon"/>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="./dist/css/style.css" rel="stylesheet">
  </head>
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body" style="height: 300px;">
                <img src="./dist/assets/img/logo-lapan.png" />
                <form action="login.php" method="post" enctype="multipart/form-data">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use>
                        </svg></span></div>
                    <input class="form-control" type="text" placeholder="Nip/Nik" name="id" required>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="./coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                        </svg></span></div>
                    <input class="form-control" type="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                  </div>
                  <div class="row">
                  <?php 
                  
                  echo '<pre>';
                  print_r($status_message);
                  echo '</pre>';

                  ?>
                  </div>
                </form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none">
              <div class="card-body text-center">
                <div>
                  <h2>
                    <svg class="c-icon" style="transform:scale(2);margin-right:10px;"><use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use></svg> SIMPEG PPNPN
                  </h2>
                  <p>BALAI LAPAN BIAK</p>
                  <!-- <p><?= $uuid4->toString() ?></p>
                  <p><?= encrypt_decrypt('encrypt', 'marthen1970'); ?></p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="./coreui/coreui/dist/js/coreui.bundle.min.js"></script>
    <script src="./coreui/icons/js/svgxuse.min.js"></script>
  </body>
</html>
`