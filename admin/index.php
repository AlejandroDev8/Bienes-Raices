<?php

// Importa la DB
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el Query

$query = "SELECT * FROM propiedades";

// Consultar la DB

$resultadoConsulta = mysqli_query($db, $query);

// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

// Incluye un template
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrador de Bienes Raíces</h1>
  <?php if (intval($resultado) === 1) : ?>
    <p class="alerta exito">Anuncio Creado correctamente</p>
  <?php elseif (intval($resultado) === 2) : ?>
    <p class="alerta exito">Anuncio Actualizado correctamente</p>
  <?php endif; ?>
  <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
        <tr>
          <td> <?php echo $propiedad['id']; ?> </td>
          <td> <?php echo $propiedad['titulo']; ?> </td>
          <td>
            <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla" alt="imagen-propiedad">
          </td>
          <td>$ <?php echo $propiedad['precio']; ?> </td>
          <td>
            <a href="/bienesraices/admin/propiedades/borrar.php?id=1" class="boton-rojo-block">Eliminar</a>
            <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

<?php
// Cerrar la conexión

mysqli_close($db);

incluirTemplate('footer');
?>