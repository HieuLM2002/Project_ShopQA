<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="http://localhost/Project_ShopQA/pages/"/>
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/backHomePage.css"/>
    <link rel="stylesheet" href="../style/lienhe.css"/>
    <link rel="stylesheet" href="../style/giohang.css"/>
    <script
      src="https://kit.fontawesome.com/d2a190de21.js"
      crossorigin="anonymous"
    ></script>
    <title>ShopQA</title>
  </head>
  <body>
    <div class="wrapper">
      <?php
      session_start();
      include("../admincp/config/connect.php");
      include("../pages/header.php");
      include("../pages/menu.php");
      include("../pages/main.php");
      include("../pages/footer.php");
      ?>           
    </div>
    <script src="../js/main.js"></script>
  </body>
</html>
