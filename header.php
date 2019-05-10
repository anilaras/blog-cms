<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta title="Anıl">
    <link rel="shortcut icon" href="./images/icons/favicon.ico.gif" type="image/x-icon">
    <title>Anıl Aras</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quattrocento+Sans">
    <link rel="stylesheet" type="text/css" href="./css/all.css">
    <script> 
    function toggleDarkLight() {
    var body = document.getElementById("body");
    var currentClass = body.className;
    body.className = currentClass == "dark-mode" ? "light-mode" : "dark-mode";
    }
    </script>

</head>

<body id="body" class="light-mode">
    <div class="container">
        <header class="masthead">
            <h3 class="masthead-title">
                <a href="./">Anıl Aras</a>
                <small class="masthead-subtitle"></small>
                <div class="menu">
                    <div class="menu-content">
                        <a href="./">Ana Sayfa</a>
                        <a href="about.php?username=anil">Hakkında</a>
                        <a href="writing.php">Yazı listesi</a>
                        <a href="contacts.php">İletişim</a>
                        <?php session_start(); if( isset($_SESSION['login']) ){   
                        echo "<a href=\"admin.php\">Yazı ekle</a> ";
                        echo "<a href=\"mesagge-box.php\">Mesaj Kutusu</a>";
                        echo '<a href="sess.php"> Logout </a>';
                        }else{echo '<a href="login.php"> Login </a>';}
                        ?>
                    </div>
                    <div class="social-icons">
                    <a name="dark_light" onclick="toggleDarkLight()" title="Toggle dark/light mode"><i class="fas fa-moon" aria-hidden="true" target="_blank"></i></a>
                        <a href="https://twitter.com/kaptanteneke"><i class="fab fa-twitter" aria-hidden="true"
                                target="_blank"></i></a>
                        <!--<a href="https://linkedin.com/in/kishu-agarwal-5045359b"><i class="fa fa-linkedin"
                                            aria-hidden="true" target="_blank"></i></a>-->
                        <a href="mailto:anilaras1@gmail.com"><i class="fa fa-envelope" aria-hidden="true"
                                target="_blank"></i></a>
                    </div>
                </div>
            </h3>
        </header>