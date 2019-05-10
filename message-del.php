<?php
session_start();
if (isset($_SESSION["login"])) {
    include "database.php";
    if ($_GET) {
        $smes = $_GET["sid"];
        $sqlsilm = "DELETE FROM `mesajlar` WHERE `mesajlar`.`id` = $smes";
        $result = mysqli_query($conn, $sqlsilm);
        if ($result) {
            echo "silindi";
            header("Location: mesagge-box.php");
        }else {
            echo "hata!";
        }
    }
} else {
    echo "bunu yapmak için yetkili değilsiniz!";
}

?>