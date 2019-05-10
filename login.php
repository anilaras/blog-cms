<?php
include "database.php";
session_start();
if (isset($_SESSION["login"])) {
    header("Location: admin.php");
}else { 
    if ($_POST) {
    session_start();
    if (isset($_POST["username"]) && isset($_POST["pass"])) {
        $sqlss = "SELECT * FROM `user` WHERE username='".$_POST["username"]."'";
        $result = mysqli_query($conn, $sqlss) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $user = $row["username"];
                $pass = $row["password"];
            }
        }
        echo $user . "+" . $pass;
        if ($_POST["username"] == $user && $_POST["pass"] == $pass) {
            $_SESSION['login'] = $user;
            header("Location: admin.php");
        } else {
            echo "kullanıcı adı veya parola hatalı";
            session_destroy();
        }
    } else {
        echo "hatalı yönlendirme";
        }
    } else {
        header("Location: login.html");
    }
}
?>

