<!DOCTYPE html>
<html>
<head> 
<script src="./js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
      selector:'textarea',
      plugins: 'print preview fullpage searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools ',
      toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
      images_upload_url: 'upload_image.php',
      images_upload_credentials: true,
  });
  </script>
    
</head>
<body>
<?php 
include "database.php";
session_start();


if( isset($_SESSION['login']) ){
  $sql_sil = "SELECT id, title FROM `content`";
  $result = mysqli_query($conn, $sql_sil) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
    echo "giriş başarılı";
        echo '<form action="admin.php" method="post" enctype="multipart/form-data">
        <fieldset style="height: auto;">
          <legend>Yeni Yazı Ekle:</legend>
          Başlık:
          <input type="text" name="title">
           -- Etiketler: 
          <input type="text" name="tags">
          <br>
          Yazı:<br>
            <textarea name="content" style="width: 100%; height: 500px; !important">
          </textarea>
          <br><br>
          Kapak Resmi:
          <input type="file" name="dosya" /> 

          <input type="submit" value="Gönder" style="    position: absolute;
  right: 20px;">
        </fieldset>
      </form>
      
    <form action="delete-element.php" method="post">
    <fieldset>
      <legend>Yazı Sil:</legend>
      <select name="sil">';
      if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["id"].'">'.$row["title"].'</option>';
        }
      }
      echo '</select> <br><br><input type="submit"></fieldset></form>';
        if ($_POST) {
            if (isset($_POST["title"]) && isset($_POST["content"]) ) {
              if (isset($_FILES['dosya'])) {
                $hata = $_FILES['dosya']['error'];
                if($hata != 0) {
                   echo 'Yüklenirken bir hata gerçekleşmiş.';
                } else {
                   $boyut = $_FILES['dosya']['size'];
                   if($boyut > (1024*1024*3)){
                      echo 'Dosya 3MB den büyük olamaz.';
                   } else {
                      $tip = $_FILES['dosya']['type'];
                      $isim = $_FILES['dosya']['name'];
                      $uzanti = explode('.', $isim);
                      $uzanti = $uzanti[count($uzanti)-1];
                      if($tip != 'image/jpeg' | 'image/png' && $uzanti != 'jpg' | 'png') {
                         echo 'Yanlızca JPG dosyaları gönderebilirsiniz.';
                      } else {
                         $dosya = $_FILES['dosya']['tmp_name'];
                         copy($dosya, './images/' . $_FILES['dosya']['name']);
                         echo 'Dosyanız upload edildi!';
                      }
                   }
                }
              }

              
                $title = $_POST["title"];
                $cont = $_POST["content"];
                $tags = $_POST["tags"];
                $cont = mysqli_real_escape_string ( $conn ,$cont );
                $user = $_SESSION["login"];
                $image_path = $_FILES['dosya']['name'];
                $sqls = 'INSERT INTO content (`id`, `title`, `content`, `tags`, `user`, `creation_time`, `image_name`) VALUES (NULL,"'.$title.'", "'.$cont.'","'.$tags.'","'.$user.'",'. CURRENT_TIMESTAMP.', "'.$image_path.'" )';
                echo htmlspecialchars($sqls);
                $result = mysqli_query($conn, $sqls) or trigger_error("Hata: ". mysqli_error($mysqli), E_USER_ERROR);
                if ($result) {
                    echo "Yazı Eklendi";
                    header("Location: admin.php");
                } else {
                    echo "Yazı eklenemedi";
                }
            } else {
                echo "eksik giriş";
            }
    
        }
       echo "<fieldset> <legend>Mesajlar:</legend>";
      echo' <iframe src="mesagge-box.php" frameborder="0" style="max-height: 350px;min-width: 100%"></iframe>';
      echo "</fieldset><br>";

    echo "<a href=\"index.php\" target=\"_blank\">Blog</a> | ";
    echo "<a href=\"sess.php\">Çıkış Yap</a>";
     }
    
    else{     
        
    echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
    header("Location: login.html");
    
    }

?>
</body>


</html>