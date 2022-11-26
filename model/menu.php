<?php
    
    function getfavourit() {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE  t2.Status ='1'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kqone = $stmt->fetchAll();
        return $kqone;
    }
    function getfilmcate($id) {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE  t2.IDcategory =".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kqone = $stmt->fetchAll();
        return $kqone;
    }
    function addfilm($namefilm, $imgFilm, $episode, $category, $lenght, $status, $contentfilm) {
        $conn = connectdb();
        $sql = "INSERT INTO `film` (`NameFilm`, `ImgFilm`, `Episode`, `IDcategory`, `Length`, `Status`, `Content_film`) VALUES 
        ( '$namefilm', '$imgFilm', '$episode', '$category', '$lenght', '$status', '$contentfilm');";
        $conn->exec($sql);
    }
    function uploadfile(){
        $target_dir = "../img_upload/";
        $target_file = $target_dir . basename($_FILES["imgfilm"]["name"]);
        move_uploaded_file($_FILES["imgfilm"]["tmp_name"], $target_file);
    }
    function updatefilm($id, $namefilm, $imgFilm, $episode, $category, $lenght,  $status, $contentfilm) {
        $conn = connectdb();
        $sql = "UPDATE `film` SET `ID` = '$id', `NameFilm` = '$namefilm', `ImgFilm` = '$imgFilm', `Episode` = '$episode', `IDcategory` = '$category', `Length` = '$lenght', `Status` = '$status', `Content_film` = '$contentfilm' WHERE `film`.`ID` = ".$id;
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }
    function getcategory(){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM category");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kqcate = $stmt->fetchAll();
        return $kqcate;
    }
    function getonefilm($id) {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE t2.ID =".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kqone = $stmt->fetchAll();
        return $kqone;
    }
    function deletefilm($id) {
        $conn = connectdb();
        $sql = "DELETE FROM film WHERE id=".$id;

        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function getallfilm() {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
?>