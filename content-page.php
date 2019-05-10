<?php include "database.php"; 
 require_once("header.php");
    if ($_REQUEST) {
        $id = $_GET["id"];
        $sqlss = "SELECT * FROM `content` WHERE id=".$id."";
        $result = mysqli_query($conn, $sqlss) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
               echo '<div class="post-container" id="froala-editor">
               <h1>'. $row["title"] .'</h1>
               <span class="post-date">
               Written on '.$row["creation_time"].' by '. $row["user"] .'
               </span>
               ';
               if ($row["image_name"] == "") {
               }else {
                echo '<img src="./images/'.$row["image_name"].'" style="max-width:100%;max-height:50%;display: block;margin-left: auto;margin-right: auto;width: 90%;">';

               }
               echo '
                <p>' . $row["content"] . ' </p>
                </div>
             ';
            }
        $sqls = "SELECT * FROM user";
        $result = mysqli_query($conn, $sqls) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="user-container" style="border: 1px solid rgba(0, 0, 0, 0.17); border-radius: 5px;
        padding-left: 100px;
        padding-right: 100px;">
       <h4>Yazar : '. $row["username"] .'</h4>
        <p>'.$row["user_info"].'</p> 
       </div>
       <div class="post-date">iletişime geçmekten çekinme!</div>';
            }
            
        } else {
            echo "hata";
        }

    }        mysqli_close($conn);

    } else {
        echo "404...";
    }
?>


<?php require_once("footer.php") 

/* <div class="sharing-icons">
    <a href="https://twitter.com/intent/tweet?text=What everyone should know about Unicode&amp;url=https://kishuagarwal.github.io/unicode.html&amp;via=Agarwal1Kishu" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=https://kishuagarwal.github.io/unicode.html&amp;title=What everyone should know about Unicode" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="https://plus.google.com/share?url=https://kishuagarwal.github.io/unicode.html" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
  </div>*/
?>
