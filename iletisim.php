<?php
if ($_POST) {
	if (isset($_POST["isim"]) && isset($_POST["mail"]) && isset($_POST["mesaj"])) {
        include "database.php";
        $isim = mysqli_real_escape_string($conn, strip_tags($_POST["isim"]));
        $mail = mysqli_real_escape_string($conn,strip_tags($_POST["mail"]));
        $mesaj = mysqli_real_escape_string($conn,strip_tags($_POST["mesaj"]));
        $telefon = mysqli_real_escape_string($conn,strip_tags($_POST["telefon"]));
        $website = mysqli_real_escape_string($conn,strip_tags($_POST["website"]));
        $sql_ilet = 'INSERT INTO `mesajlar` (`id`, `isim`, `mail`, `telefon`, `website`, `mesaj`, `time`) VALUES (NULL, "'.$isim.'", "'.$mail.'", "'.$telefon.'", "'.$website.'", "'.$mesaj.'",CURRENT_TIMESTAMP);';
        echo $sql_ilet;
        $result = mysqli_query($conn, $sql_ilet) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
        if ($result) {
            echo "mesajınız başarıyla kaydedildi <br>";
            echo "<a href=\"javascript:history.go(-1)\">Geri Git</a><br>";
            echo "<a href=\"./\">Ana Sayfa</a>";

        }else {
            echo "mesaj kaydedilemedi!!";
        }
//		$headers = "From: anil@anilaras.com.tr";
		//mail( "anilaras1@gmil.com" , "yeni mesaj" , $mesarray , $headers );
	}
} else {
    echo "olmadı";
}

?>