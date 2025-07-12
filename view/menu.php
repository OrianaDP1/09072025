
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">SGProyectos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
           <a class="nav-link" href="../index.php?accion=misgrupos">Mis Grupos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php?accion=cargarclientes">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php?accion=cargarproyectos">Proyectos</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <span class="nav-link text-light">
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            echo isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : 'Invitado';
            ?>
          </span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?accion=logout">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
