<?php
// Conectar a la base de datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar para obtener los vendedores

$consulta = "SELECT * FROM vendedores";
$result = mysqli_query($db, $consulta);

require '../../includes/funciones.php';
incluirTemplate('header');

// Arreglo con mensajes de errores

$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

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
  $creado = date('Y/m/d');

  if (!$titulo) {
    $errores[] = "Debes añadir un título";
  }

  if (!$precio) {
    $errores[] = "Debes añadir un precio";
  }

  if (!$descripcion) {
    $errores[] = "La descripción es obligatoria";
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

    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', $habitaciones, '$wc', '$estacionamiento', '$creado', '$vendedores_id')";

    // echo $query;

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      // Redireccionar al usuario
      header('Location: /bienesraices/admin/index.php?resultado=1');
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
      <input type="text" id="titulo" placeholder="Título Propiedad" name="titulo" value="<?php echo $titulo; ?>">
      <label for="precio">Precio:</label>
      <input type="number" id="precio" placeholder="Precio Propiedad" name="precio" value="<?php echo $precio; ?>">
      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
      <label for="descripcion">Descripción:</label>
      <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
    </fieldset>
    <fieldset>
      <legend>Información Propiedad</legend>
      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones"
        value="<?php echo $habitaciones; ?>">
      <label for="wc">Baños:</label>
      <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo $wc; ?>">
      <label for="estacionamiento">Estacionamiento:</label>
      <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento"
        value="<?php echo $estacionamiento; ?>">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>
      <select name="vendedores_id">
        <option value="">-- Seleccione --</option>
        <?php while ($vendedor = mysqli_fetch_assoc($result)) : ?>
        <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?>
          value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?>
        </option>
        <?php endwhile; ?>
      </select>
    </fieldset>
    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>