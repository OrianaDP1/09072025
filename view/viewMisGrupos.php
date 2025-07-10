<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mis Grupos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php require_once './helpers/verificacion.php'; 
require_once 'menu.php'?>

<div class="container py-4">
  <h2 class="mb-4">Grupos donde participas</h2>

  <?php if (empty($grupos)): ?>
    <div class="alert alert-warning">No estás asignado a ningún grupo.</div>
  <?php else: ?>
    <?php foreach ($grupos as $grupo): ?>
      <div class="card mb-4 shadow">
        <div class="card-header bg-dark text-white">
          <?= htmlspecialchars($grupo['nombregrupo']) ?> —
          <small class="text-light">Creado el <?= htmlspecialchars($grupo['fechacreacion']) ?> —
            <?= count($grupo['miembros']) ?> miembros</small>
        </div>
        <ul class="list-group list-group-flush">
          <?php foreach ($grupo['miembros'] as $miembro): ?>
            <li class="list-group-item d-flex justify-content-between">
              <span>
                <?= ($_SESSION['usuario'] === $miembro['nombreusuario']) 
                      ? '<strong>' . htmlspecialchars($miembro['nombreusuario']) . '</strong>'
                      : htmlspecialchars($miembro['nombreusuario']) ?>
              </span>
              <span class="text-muted"><?= htmlspecialchars($miembro['rol']) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

</body>
</html>
