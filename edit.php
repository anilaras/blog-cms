<?php 
echo "<!DOCTYPE html>
<html>
<head>
  <script src='./js/tinymce/tinymce.min.js'></script>
  <script>tinymce.init({
        selector:'textarea',
        plugins: 'print preview fullpage searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools ',
        toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
        images_upload_url: 'upload_image.php',
        images_upload_credentials: true
    });</script>
</head>
<body>
  <textarea name='content'>Next, use our Get Started docs to setup Tiny!</textarea>
</body>
</html>";
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
      </form>';


?>
