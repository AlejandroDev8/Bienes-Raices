<?php
require '../../includes/funciones.php';

$auth = estaAutenticado();

if (!$auth) {
  header('Location: /login.php');
}

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /admin');
}

require '../../includes/config/database.php';
$db = conectarDB();

$consulta = "SELECT * FROM vendedores WHERE id = ${id}";
$resultado = mysqli_query($db, $consulta);
$vendedor = mysqli_fetch_assoc($resultado);

incluirTemplate('header');

$errores = [];

$nombre = $vendedor['nombre'];
$apellido = $vendedor['apellido'];
$telefono = $vendedor['telefono'];
$email = $vendedor['email'];

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
    $query = "UPDATE vendedores SET nombre = '${nombre}', apellido = '${apellido}', telefono = '${telefono}', email = '${email}' WHERE id = ${id}";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('Location: /admin/propiedades/vendedores.php?resultado=2');
    }
  }
}

?>

<main class="contenedor seccion">
  <h1>Actualizar Vendedor</h1>

  <a href="/admin/propiedades/vendedores.php" class="boton boton-verde">Volver</a>

  <form class="formulario" method="POST">
    <fieldset>
      <legend>Información General</legend>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre Vendedor" value="<?php echo $vendedor['nombre']; ?>" accept="text">
      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido" placeholder="Apellido Vendedor" value="<?php echo $vendedor['apellido']; ?>">
    </fieldset>
    <fieldset>
      <legend>Información de Contacto</legend>
      <label for="telefono">Teléfono:</label>
      <input type="number" id="telefono" name="telefono" placeholder="Teléfono Vendedor" value="<?php echo $vendedor['telefono']; ?>" max="10">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Email Vendedor" value="<?php echo $vendedor['email']; ?>">
    </fieldset>
    <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>