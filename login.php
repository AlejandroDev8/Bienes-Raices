<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Iniciar Sesión</h1>

  <form class="formulario" method="POST" action="/login.php">
    <fieldset>
      <legend>Email y Password</legend>
      <label for="email">E-mail</label>
      <input type="email" name="email" placeholder="Tu Email" id="email" required>
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Tu Password" id="password" required>
    </fieldset>
    <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>