<?php

  if(isset($_POST['submit'])) {
      $recipient="floreselectric@outlook.com";
      $subject="Nuevo mensaje de flores-electric.com";
      $sender=$_POST["firstName"];
      $lastName=$_POST["lastName"];
      $senderEmail=$_POST["email"];
      $phone=$_POST["phone"];
      $message=$_POST["services"];

      $mailBody="Nombre: $sender $lastName\nEmail: $senderEmail\nTeléfono: $phone\n\n$message";

      $thankYou="";

      $vars = array('firstName', 'email', 'services');
      $verified = true;
      foreach($vars as $v) {
         if(!isset($_POST[$v]) || empty($_POST[$v])) {
            $verified = false;
         }
      }

      if (!$verified) {
        $thankYou="<p>Por favor escriba un mensaje.</p>";
      } else {
        mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");
        $thankYou="<p>Gracias, su mensaje ha sido enviado.</p>";
      }


  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="robots" content="index, follow">
  <meta name="revisit-after" content="30 days">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
  <title>Flores Electric | Contáctese con nosotros</title>
  <meta name="description" content="Para obtener más información sobre nuestros servicios, por favor llene el formulario de contacto, o para una respuesta inmediata, llámenos ahora a: (832) 359-2298">
  <link rel="alternate" hreflang="es" href="https://www.flores-electric.com/contacto.php"/>
  <link rel="alternate" hreflang="en" href="https://www.flores-electric.com/contact.php"/>
  <link rel="stylesheet" href="/assets/css/combined.css?v=2.0">
  <link rel="stylesheet" href="/assets/css/bootstrap.css?v=2.0">
  <link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/ykc6qoh.css">
  <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
  </script>
  <script>
    $(function(){
      $("#header").load("/templates/header.html");
      $("#footer").load("templates/footer.html")
    });
  </script>
</head>
<body>
  <div id="header"></div>
  <div class="hero container-img-contact low-header" style="background-image: url(/assets/images/contact-banner-img.jpg)">
    <div class="container">
      <div class="contact-text container">
        <h1 style="margin-bottom: 10px">Contáctese con nosotros</h1>
        <p class="contact-p" style="margin-bottom: 20px; margin-left:auto; margin-right:auto">Para obtener más información sobre nuestros servicios, por favor llene el siguiente formulario, o para una respuesta inmediata, llámenos ahora a: (832) 359-2298</p>
        <?=$thankYou ?>
      </div>
      <div class="contact-form">
        <form method="post" name="contactform" action="">
          <div class="form-label">
            <div class="name-label">
              <label style="width: fit-content" for="name"><p>Nombre</p>
                <input type="text" name="firstName" style="margin-right: 43px" placeholder="Primero">
                <input type="text" name="lastName" placeholder="Apellido">
              </label>

            </div>
            <div class="name-label flex">
              <label style="width: fit-content;" for="email">
                <p>Email</p>
                <input type="email" name="email" style="margin-right: 43px">
              </label>
              <label style="width: fit-content;" for="phone">
                <p>Teléfono</p>
                <input type="text" name="phone">
              </label>
            </div>
            <div class="name-label">
              <label for="services"><p>Servicios necesarios</p>
                <textarea type="text" name="services" style="height: 86px; width: 438px"></textarea>
              </label>
            </div>
          </div>
          <div class="submit-form">
            <input class="button-submit" type="submit" name="submit" value="enviar">
            <div class="lines">
              <div class="submit-line-1"></div>
              <div class="submit-line-2"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
