<?php
require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
  <form class="formulario">
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
      <select name="vendedor">
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