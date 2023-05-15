<?php
require '../../includes/funciones.php';

$auth = estaAutenticado();
if (!$auth) {
  header('Location: /login.php');
}

require '../../includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM vendedores";
$resultadoConsulta = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    $consulta = "DELETE FROM vendedores WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);

    if ($resultado) {
      header('Location: /admin/propiedades/vendedores.php?resultado=3');
    }
  }
}

incluirTemplate('header')
?>


<main class="contenedor seccion">
  <h1>Administrador de Bienes Raíces (Vendedores)</h1>
  <?php if (intval($resultado) === 1) : ?>
    <p class="alerta exito">Vendedor Creado correctamente</p>
  <?php elseif (intval($resultado) === 2) : ?>
    <p class="alerta exito">Vendedor Actualizado correctamente</p>
  <?php elseif (intval($resultado) === 3) : ?>
    <p class="alerta exito">Vendedor Eliminado correctamente</p>
  <?php endif; ?>
  <a class="boton boton-amarillo-inline-block" style="margin-right: 2rem;" href="/admin/index.php">Volver</a>
  <a class="boton boton-verde" style="margin-right: 2rem;" href="/admin/propiedades/crearVendedor.php">Nuevo
    Vendedor</a>
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($vendedor = mysqli_fetch_assoc($resultadoConsulta)) : ?>
        <tr>
          <td> <?php echo $vendedor['id']; ?> </td>
          <td> <?php echo $vendedor['nombre']; ?> </td>
          <td> <?php echo $vendedor['apellido']; ?> </td>
          <td> <?php echo $vendedor['telefono']; ?> </td>
          <td> <?php echo $vendedor['email']; ?> </td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $vendedor['id']; ?>">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>
            <a href="/admin/propiedades/actualizarVendedor.php?id=<?php echo $vendedor['id']; ?>" class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

<?php
mysqli_close($db);
incluirTemplate('footer');
?>