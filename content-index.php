<?php 
include "database.php";
if ($_GET) {
    $pageid = $_GET["pageid"];
    $sqlss = "SELECT * FROM content LIMIT $pageid, 6";
$result = mysqli_query($conn, $sqlss) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="posts">';
        echo '<h1>';
        echo '<a href="content-page.php?id='.$row["id"].'">'. $row["title"] .'</a>';
        echo '</h1>';
        echo '<p> deneme '. $string = substr(strip_tags($row["content"]), 0, 500)
        .'<a href="content-page.php?id='.$row["id"].'">Read more</a>
        <span class="post-date" style="margin-top:3px"><i class="fa fa-calendar" aria-hidden="true"></i> '. 
        $row["creation_time"] .'
        </span>
    </p>
</div>';
    }
} else {
    echo "0 results";
    }
}else {
    echo "0";
}



mysqli_close($conn);

?>


    