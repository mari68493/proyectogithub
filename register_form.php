<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulario de Registro</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <a href="index.html" class="casita">
      <i class="fa-solid fa-house"></i>
   </a>
<div class="form-container">

   <form action="" method="post">
      <img src="dibujo.png" style="top:-10%; width:60%;">
      <h3 style="position: relative; display: inline-block;">Registrate</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <p>Nombre<sup>*</sup></p>
      <input type="text" name="name" required placeholder="Ingresa tu nombre">
      <p>Correo<sup>*</sup></p>
      <input type="email" name="email" required placeholder="Ingresa tu correo">
      <p>Contraseña<sup>*</sup></p>
      <input type="password" name="password" required placeholder="Ingresa una contraseña">
      <p>Confirma tu contraseña<sup>*</sup></p>
      <input type="password" name="cpassword" required placeholder="Confirmar contraseña">
      <p>Tipo de Usuario<sup>*</sup></p>
      <select name="user_type">
         <option value="user">Docente</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Registrar" class="form-btn">
      <p>¿Ya tienes cuenta? <a href="login_form.php">Ingresa ahora</a></p>
   </form>

</div>
<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>