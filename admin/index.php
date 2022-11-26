<?php
    session_start();
    ob_start();
    include "../model/config.php";
    include "../model/menu.php";
    
    if(isset($_SESSION['user']) && $_SESSION['user']['Keyuser'] == 1){
        include "./view/header.php";
        if (isset($_GET['act'])) {
            switch ($_GET['act']) {
                case 'film':
                    $kq=getallfilm();
                    include "./view/film.php";
                    break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                       deletefilm($id);
                    }
                    $kq=getallfilm();
                    include "./view/film.php";
                    break;
                case 'update':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $kqone=getonefilm($id);
                        $kqcate=getcategory();
                        include "./view/updatefilm.php";
                    }
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $namefilm = $_POST['namefilm'];
                        $imgFilm = $_FILES['imgfilm']['name'];
                        $episode = $_POST['episode'];
                        $category = $_POST['category'];
                        $lenght = $_POST['length'];
                        $status = $_POST['status'];
                        $contentfilm = $_POST['contentfilm'];
                        uploadfile();
                        updatefilm($id, $namefilm, $imgFilm, $episode, $category, $lenght, $status, $contentfilm);
                        $kq=getallfilm();
                        include "./view/film.php";
                    }
                    break;
                case 'addfilm':
                    $kqcate=getcategory();
                    include "./view/addfilm.php";
                    if (isset($_POST['addfilm'])) {
                        $namefilm = $_POST['namefilm'];
                        $imgFilm = $_FILES['imgfilm']['name'];
                        $episode = $_POST['episode'];
                        $category = $_POST['category'];
                        $lenght = $_POST['length'];
                        $status = $_POST['status'];
                        $contentfilm = $_POST['contentfilm'];
                        uploadfile();
                        addfilm($namefilm, $imgFilm, $episode, $category, $lenght, $status, $contentfilm);
                        $kq=getallfilm();
                        include "./view/film.php";
                    }
                    break;
                    case 'logout':
                        if (isset($_SESSION['user'])) {
                            unset($_SESSION['user']);
                            header('location: ../index.php');
                        }
                        break;
                default:
                    # code...
                    break;
            }
        }else {
            include "./view/home.php";
        }
        include "./view/footer.php";
    } else header('location :../index.php')
?>