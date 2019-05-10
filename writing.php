<?php
include "database.php";
require_once("header.php");
$sqlss = "SELECT * FROM content";
$result = mysqli_query($conn, $sqlss) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '';
        echo '<h1>';
        echo '<a href="content-page.php?id='.$row["id"].'">'. $row["title"] .'</a>';
        echo '</h1>';
    }
}

require_once("footer.php");

?>