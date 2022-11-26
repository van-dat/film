<?php
  session_start();
  ob_start();
  include "./model/config.php";
  include "./model/menu.php";
  include "./view/header.php";
  if(isset($_GET['act'])) {
    switch ($_GET['act']) {
      case 'index':
          $kq = getallfilm();
          include "./view/main.php";
        break;
      case 'category':
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $kq = getfilmcate($id);
          include "./view/main.php";
        }
        break;
        case 'logout':
          unset($_SESSION['user']);
          header('location: index.php');
        break;
        case '':
          
        break;
      
      default:
        # code...
        break;
    }
  } else {
    $kq = getallfilm();
    include "./view/main.php";
  }
  include "./view/footer.php";
?>
  