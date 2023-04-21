<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
  <main class="contenedor seccion">
    <h1>Conoce Sobre Nosotros</h1>
    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="build/img/nosotros.webp" type="image/webp">
          <source srcset="build/img/nosotros.jpg" type="image/jpeg">
          <img src="build/img/nosotros.jpg" alt="Sobre nosotros" loading="lazy">
        </picture>
      </div>
      <div class="texto-nosotros">
        <blockquote>
          25 Años de Experiencia
        </blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores sint labore deleniti, exercitationem laudantium ea dignissimos molestias iure animi beatae totam ipsa quis excepturi explicabo, quas esse minus. Harum placeat soluta ratione itaque facilis unde est laudantium minima, quaerat debitis illo ad recusandae tenetur vero eveniet sint rerum, porro nihil quisquam autem vitae! Eveniet distinctio adipisci, esse dicta doloremque labore? Totam alias maiores natus nobis nemo molestias eligendi repellat harum ratione repudiandae, quidem reprehenderit doloribus, ea voluptate adipisci facere rerum, obcaecati voluptatum non hic saepe est? Dolore recusandae cum est consequatur corrupti, eos, repudiandae in fugiat, consequuntur quasi at?
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, eius? Totam delectus minima veritatis error earum assumenda aliquid omnis, pariatur qui alias eos repellendus rerum reprehenderit velit, expedita vitae dignissimos.
        </p>
      </div>
    </div>
  </main>
  <section class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>
    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid voluptatibus, incidunt architecto id laborum eaque laboriosam totam reprehenderit sit tempore!
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
        <h3>Precio</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid voluptatibus, incidunt architecto id laborum eaque laboriosam totam reprehenderit sit tempore!
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
        <h3>A Tiempo</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid voluptatibus, incidunt architecto id laborum eaque laboriosam totam reprehenderit sit tempore!
        </p>
      </div>
    </div>
  </section>
<?php
  incluirTemplate('footer');
?>