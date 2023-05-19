<?php

// Validar la URL por ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /');
}

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propiedades WHERE id = ${id}";

// Obtener el resultado
$resultadoConsulta = mysqli_query($db, $query);

$query2 = "SELECT v.nombre, v.apellido, v.email FROM vendedores v JOIN propiedades p ON v.id = p.vendedores_id WHERE p.id = ${id}";
$resultadoConsulta2 = mysqli_query($db, $query2);

$query3 = "SELECT precio, convertir_a_dolares(precio) as precio_dolar FROM propiedades WHERE id = ${id}";
$resultadoConsulta3 = mysqli_query($db, $query3);

if (!$resultadoConsulta->num_rows) {
  header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultadoConsulta);
$vendedor = mysqli_fetch_assoc($resultadoConsulta2);
$dolares = mysqli_fetch_assoc($resultadoConsulta3);

require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
  <h1> <?php echo $propiedad['titulo'] ?> </h1>
  <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad" loading="lazy">
  <div class="resumen-propiedad">
    <div class="precio">
      Precio en Pesos MXN
      $ <?php echo $propiedad['precio'] ?> <br>
      Precio en Dolares USD
      $ <?php echo $dolares['precio_dolar'] ?>
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
      <p>Nombre Vendedor: <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?>
      </p>
      <p>Email Vendedor: <?php echo $vendedor['email']; ?>
    </div>
  </div>
</main>
<?php
// Cerrar la conexión
mysqli_close($db);
incluirTemplate('footer');
?>