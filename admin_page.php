<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina Administrativa</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Ingresaste como... <span>Admin</span></h3>
      <h1>Bienvenid@ <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Esto es una pagina de administración</p>
      <a href="logout.php" class="btn">Cerrar sesión</a>
      <a href="index.html" class="btn">Página Principal</a>
   </div>

</div>

</body>
</html>