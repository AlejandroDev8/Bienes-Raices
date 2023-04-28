<?php

// Validar la URL por ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /bienesraices/index.php');
}

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propiedades WHERE id = ${id}";

// Obtener el resultado
$resultadoConsulta = mysqli_query($db, $query);

if (!$resultadoConsulta->num_rows) {
  header('Location: /bienesraices/index.php');
}

$propiedad = mysqli_fetch_assoc($resultadoConsulta);

require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
  <h1> <?php echo $propiedad['titulo'] ?> </h1>
  <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad" loading="lazy">
  <div class="resumen-propiedad">
    <class="precio">
      $ <?php echo $propiedad['precio'] ?>
      <ul class="iconos-caracteristicas">
        <li>
          <img src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
          <p> <?php echo $propiedad['wc']; ?> </p>
        </li>
        <li>
          <img src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" loading="lazy">
          <p> <?php echo $propiedad['estacionamiento']; ?> </p>
        </li>
        <li>
          <img src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones" loading="lazy">
          <p> <?php echo $propiedad['habitaciones']; ?> </p>
        </li>
      </ul>
      <p>
        <?php echo $propiedad['descripcion']; ?>
      </p>
  </div>
</main>
<?php
// Cerrar la conexión
mysqli_close($db);
incluirTemplate('footer');
?>