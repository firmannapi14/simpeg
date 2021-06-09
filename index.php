<?php 
  if (isset($_COOKIE['user_simpeg'])) {
    date_default_timezone_set('Asia/Jayapura');
    include "config/connection.php";
    include "config/global_vars.php";
    error_reporting(0);

    if (isset($_GET['page']) && $_GET['page'] === 'logout') {
      setcookie('user_simpeg', '', time()-(86400 * 30), "/");
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
  <title>Dashboard - SIMPEG BALAI LAPAN BIAK</title>
  <link rel="icon" href="./dist/assets/favicon/favicon.png" type="image/x-icon"/>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- Main styles for this application-->
  <link href="./dist/css/style.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style>
    .field-icon {
      float: right;
      margin-right: 8px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
      cursor:pointer;
    }
  </style>
</head>

<body class="c-app">
  <?php 
    include "sidebar.php";
  ?>
  <div class="c-wrapper c-fixed-components">
    <?php 
      include "header.php";
    ?>
    <div class="c-body">
      <?php 
        include "routing.php"
      ?>
      <footer class="c-footer">
        <div><a href="https://coreui.io">CoreUI</a> &copy; 2020 creativeLabs.</div>
        <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
      </footer>
    </div>
  </div>
</body>

</html>
<?php 
  }
  else { ?>
    <div class="col-md-12" align="center">
      <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
    </div>

<?php echo"<meta http-equiv='refresh' content='1;url=login.php'>"; } ?>