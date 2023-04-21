<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
  <main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta frente al bosque</h1>
    <picture>
      <source srcset="build/img/destacada.webp" type="image/webp">
      <source srcset="build/img/destacada.jpg" type="image/jpeg">
      <img src="build/img/destacada.jpg" alt="Imagen de la propiedad" loading="lazy">
    </picture>
    <div class="resumen-propiedad">
      <p class="precio">
        $3,000,000
        <ul class="iconos-caracteristicas">
          <li>
            <img src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" loading="lazy">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones" loading="lazy">
            <p>4</p>
          </li>
        </ul>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores sint labore deleniti, exercitationem laudantium ea dignissimos molestias iure animi beatae totam ipsa quis excepturi explicabo, quas esse minus. Harum placeat soluta ratione itaque facilis unde est laudantium minima, quaerat debitis illo ad recusandae tenetur vero eveniet sint rerum, porro nihil quisquam autem vitae! Eveniet distinctio adipisci, esse dicta doloremque labore? Totam alias maiores natus nobis nemo molestias eligendi repellat harum ratione repudiandae, quidem reprehenderit doloribus, ea voluptate adipisci facere rerum, obcaecati voluptatum non hic saepe est? Dolore recusandae cum est consequatur corrupti, eos, repudiandae in fugiat, consequuntur quasi at?
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, eius? Totam delectus minima veritatis error earum assumenda aliquid omnis, pariatur qui alias eos repellendus rerum reprehenderit velit, expedita vitae dignissimos.
        </p>
      </p>
    </div>
  </main>
<?php
  incluirTemplate('footer');
?>