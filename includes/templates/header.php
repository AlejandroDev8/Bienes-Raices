<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bienesraices/build/css/app.css">
  <link rel="shortcut icon" href="/bienesraices/src/img/icon.svg" type="image/x-icon">
  <title>Bienes Raíces</title>
</head>
<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
  <div class="contenedor contenido-header">
    <div class="barra">
      <a href="/bienesraices/index.php">
        <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de Bienes Raíces">
      </a>
      <div class="mobile-menu">
        <img src="/bienesraices/build/img/barras.svg" alt="Icono menu responsive">
      </div>
      <nav class="navegacion">
        <a href="nosotros.php">Nosotros</a>
        <a href="anuncios.php">Anuncios</a>
        <a href="blog.php">Blog</a>
        <a href="contacto.php">Contacto</a>
      </nav>
    </div>
    <?php if ($inicio) { ?>
    <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
    <?php } ?>
  </div>
</header>