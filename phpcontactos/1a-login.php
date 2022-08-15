<?php

require "2-check.php";

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link href="1b-login.css" rel="stylesheet">
  </head>
  <body>
   

<div class="container">
  <div class="forms">
     <div class="form login">
     <span class="title">Login</span>
      <form id="login-form" method="post" target="_self">
        <form action="#">
          <div class="input-field">
            <input type="text" name = "user" placeholder="Introducir usuario" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" name="password" placeholder="Introducir contraseña" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>
           <div class="input-field button">
             <input type="submit" value="Ingresar"/>
            </div>
            <center>
            <br>
            <?php if (isset($failed)) { ?>
    <div id="bad-login">Usuario o constraseña incorrectos</div>
    <?php } ?>
            </center>
</html>
