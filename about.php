<?php
require_once("header.php");

if ($_GET) {
    $userid = $_GET["username"];
    include "database.php";
    $sql_userid = "SELECT * FROM user";
    $results = mysqli_query($conn, $sql_userid);
    if ($results) {
        while ($row = mysqli_fetch_assoc($results) ) {
            echo '<div class="user-container" style="border: 1px solid rgba(0, 0, 0, 0.17); border-radius: 5px;
            padding-left: 100px;
            padding-right: 100px;">
           <h4>İsim : '. $row["username"] .'</h4>
            <p>'.$row["user_info"].'</p> 
           </div>
           <div class="post-date">iletişime geçmekten çekinme!</div>';
        }
    }else {
        echo "hata";
    }
}else {
    
}





require_once("footer.php");
?>