<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
  <h1>Guía para la decoración de tu hogar</h1>
  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp">
    <source srcset="build/img/destacada2.jpg" type="image/jpeg">
    <img src="build/img/destacada2.jpg" alt="Imagen de la propiedad" loading="lazy">
  </picture>
  <p class="informacion-meta">Escrito el: <span>19/04/2023</span> por: <span>Admin</span></p>
  <div class="resumen-propiedad">
    <p>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora sunt commodi temporibus odio rem cupiditate
      animi, nulla quisquam fuga saepe ipsa ab dolore, qui quod dolores pariatur aliquam earum enim doloribus labore
      itaque suscipit! Minus aspernatur quisquam dolore molestiae vel explicabo nulla voluptatem laudantium rerum quo,
      expedita vero, quis laborum.
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor at, ullam quas ratione dolorem soluta sint unde
      beatae minima enim amet obcaecati similique in modi porro, officia sapiente eligendi, aut quis nam. Consequuntur
      eum quod recusandae laudantium assumenda. Provident consectetur voluptas pariatur cupiditate in id quae, aut
      tempora nam ab ad laudantium quia architecto optio natus impedit accusamus labore nemo eos dolor dolorum
      accusantium quas! Quia placeat dolorem eum. Dolorem.
    </p>
  </div>
</main>
<?php
incluirTemplate('footer');
?>