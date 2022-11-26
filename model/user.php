<?php
    function checkuser($email, $password) {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM user WHERE Email = '$email'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq[0];
    }
?>