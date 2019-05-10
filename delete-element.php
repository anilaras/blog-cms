<?php 
include "database.php";
session_start();

if (isset($_SESSION['login'])) {
    if ($_POST) {
        $silinecek_id = $_POST["sil"];
        $sqlsil = "DELETE FROM `content` WHERE `content`.`id` = $silinecek_id";
        $silindi = mysqli_query($conn, $sqlsil) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
        if ($silindi) {
            echo "Başarıyla silindi";
            header("Location: admin.php");
        } else {
            echo "hata";
        }
    }
} else {
    echo "bunu yapmaya yetkili değilsin, seni pis herif seni";
    header("Location: login.html");
}
?>