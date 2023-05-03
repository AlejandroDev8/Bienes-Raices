<?php
require '../../includes/funciones.php';

$auth = estaAutenticado();

if (!$auth) {
  header('Location: /');
}

require '../../includes/config/database.php';
$db = conectarDB();

$consulta = "SELECT * FROM vendedores";
$result = mysqli_query($db, $consulta);

$errores = [];

$nombre = '';
$apellido = '';
$telefono = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
  $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
  $telefono = mysqli_real_escape_string($db, $_POST['telefono']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  if (!$nombre) {
    $errores[] = "Debes añadir un nombre";
  }

  if (!$apellido) {
    $errores[] = "Debes añadir un apellido";
  }

  if (!$telefono) {
    $errores[] = "Debes añadir un teléfono";
  }

  if (!$email) {
    $errores[] = "Debes añadir un email";
  }

  if (!$errores) {
    $query = "INSERT INTO vendedores (nombre, apellido, telefono, email) VALUES ('$nombre', '$apellido', '$telefono', '$email')";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('Location: /admin/propiedades/vendedores.php?resultado=1');
    }
  }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <a href="/admin/propiedades/vendedores.php" class="boton boton-verde">Volver</a>
  <form class="formulario" method="POST" action="/admin/propiedades/crearVendedor.php" style="margin-top: 2rem;">
    <fieldset>
      <legend>Información General</legend>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" placeholder="Nombre Vendedor" name="nombre">
      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" placeholder="Apellido Vendedor" name="apellido">
    </fieldset>
    <fieldset>
      <legend>Información de Contacto</legend>
      <label for="telefono">Teléfono:</label>
      <input type="number" id="telefono" placeholder="Teléfono Vendedor" name="telefono" max="10">
      <label for="email">Email:</label>
      <input type="email" id="email" placeholder="Email Vendedor" name="email">
    </fieldset>
    <input type="submit" value="Crear Vendedor" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>