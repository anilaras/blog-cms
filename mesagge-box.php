<?php
session_start();

if (isset($_SESSION["login"])){
    include "database.php";
    $sql = "SELECT * FROM `mesajlar`";
    $result = mysqli_query($conn, $sql) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
    $num_rows = mysqli_num_rows($result);

    if ($result && $num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["isim"]."<br>";
            echo $row["mail"]."<br>";
            echo $row["telefon"]."<br>";
            echo $row["website"]."<br>";
            echo $row["mesaj"]."<br>";
            echo $row["time"]."<br>";
            echo "<a href=\"message-del.php?sid=".$row["id"]."\">mesajı sil</a>";
            echo "<hr>";
        }
    }else {
        if ($num_rows <= 0) {
            echo "mesaj yok";
        }else {
            echo "mesaj alınamadı";
        }
    }



} else {
    header('HTTP/1.0 403 Forbidden');
    echo "403";
}



?>