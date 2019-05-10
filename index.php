<?php
include "database.php";

require("header.php");
?>
<?php 
if ($_GET) {
    $pageid = $_GET["pageid"] * 5;
    $counter = $_GET["pageid"];
}else {
    $pageid = 0;
    $counter = 0;
}
    $sqlss = "SELECT * FROM content ORDER BY id DESC LIMIT $pageid, 5";
    $result = mysqli_query($conn, $sqlss) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="posts">';
        echo '<h1>';
        echo '<a href="content-page.php?id='.$row["id"].'">'. $row["title"] .'</a>';
        echo '</h1>';
        echo '<p>'. $string = substr(strip_tags($row["content"]), 0, 300)
        .'&nbsp;<a href="content-page.php?id='.$row["id"].'">Devamını oku</a>
        <span class="post-date" style="margin-top:3px"><i class="fa fa-calendar" aria-hidden="true"></i> '. 
        $row["creation_time"] .'   &nbsp; <i class="fa fa-user" aria-hidden="true"></i> '. 
        $row["user"] .'
        </span>
    </p>
</div>';
    }
    $sayi = mysqli_query($conn, "SELECT COUNT(*) FROM `content`") or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
    $row = mysqli_fetch_assoc($sayi);
    $cplmax = $row["COUNT(*)"] % 6;
    $cpl = $counter + 1;
    $cml = $counter - 1;
    if ($counter < $cplmax) {
        echo "<a href=\"index.php?pageid=".$cpl."\">eski yazılar</a> &nbsp;&nbsp;";
    }
    if ($counter > 0) {
        echo "<a href=\"index.php?pageid=".$cml."\">yeni yazılar</a>";
    }
} else {
    echo "0 results";
    }




mysqli_close($conn);

?>


    
<?php
require("footer.php"); 
?>
