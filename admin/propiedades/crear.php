<?php
// Conectar a la base de datos
require '../../includes/config/database.php';
$db = conectarDB();

require '../../includes/funciones.php';
incluirTemplate('header');

// Arreglo con mensajes de errores

$errores = [];

// Ejecutar el código después de que el usuario envía el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $habitaciones = $_POST['habitaciones'];
  $wc = $_POST['wc'];
  $estacionamiento = $_POST['estacionamiento'];
  $vendedores_id = $_POST['vendedores_id'];

  if (!$titulo) {
    $errores[] = "Debes añadir un título";
  }

  if (!$precio) {
    $errores[] = "Debes añadir un precio";
  }

  if (strlen($descripcion) < 50) {
    $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
  }

  if (!$habitaciones) {
    $errores[] = "Debes añadir el número de habitaciones";
  }

  if (!$wc) {
    $errores[] = "Debes añadir el número de baños";
  }

  if (!$estacionamiento) {
    $errores[] = "Debes añadir el número de estacionamientos";
  }

  if (!$vendedores_id) {
    $errores[] = "Debes seleccionar un vendedor";
  }

  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";

  // Revisar que el arreglo de errores esté vacío

  if (empty($errores)) {
    // Insertar en la base de datos

    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', $habitaciones, '$wc', '$estacionamiento', '$vendedores_id')";

    // echo $query;

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      echo 'Insertado Correctamente';
    }
  }
}
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
  <div class="alerta error">
    <?php echo $error; ?>
  </div>
  <?php endforeach; ?>


  <form class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php">
    <fieldset>
      <legend>Información General</legend>
      <label for="titulo">Título:</label>
      <input type="text" id="titulo" placeholder="Título Propiedad" name="titulo">
      <label for="precio">Precio:</label>
      <input type="number" id="precio" placeholder="Precio Propiedad" name="precio">
      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
      <label for="descripcion">Descripción:</label>
      <textarea id="descripcion" name="descripcion"></textarea>
    </fieldset>
    <fieldset>
      <legend>Información Propiedad</legend>
      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones">
      <label for="wc">Baños:</label>
      <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc">
      <label for="estacionamiento">Estacionamiento:</label>
      <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>
      <select name="vendedores_id">
        <option value="">-- Seleccione --</option>
        <option value="1">Alejandro</option>
        <option value="2">Karen</option>
      </select>
    </fieldset>
    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>