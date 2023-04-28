<?php
// Importar la DB

require 'includes/config/database.php';
$db = conectarDB();

// Consultar la DB

$query = "SELECT * FROM propiedades LIMIT ${limite}";

// Obtener los resultados

$resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
  <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
    <div class="anuncio">
      <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio Casa" loading="lazy">
      <div class="contenido-anuncio">
        <h3><?php echo $propiedad['titulo']; ?></h3>
        <p><?php echo $propiedad['descripcion']; ?></p>
        <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
            <p><?php echo $propiedad['wc']; ?></p>
          </li>
          <li>
            <img src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" loading="lazy">
            <p><?php echo $propiedad['estacionamiento']; ?></p>
          </li>
          <li>
            <img src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones" loading="lazy">
            <p><?php echo $propiedad['habitaciones']; ?></p>
          </li>
        </ul>
        <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Ver Propiedad</a>
      </div> <!-- .contenido-anuncio -->
    </div> <!-- .anuncio -->
  <?php endwhile; ?>
</div> <!-- .contenedor-anuncios -->

<?php
// Cerrar la conexión
mysqli_close($db);
?>