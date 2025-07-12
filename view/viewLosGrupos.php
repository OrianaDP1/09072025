<?php require_once './helpers/verificacion.php'; ?>
<?php require_once 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Todos los Grupos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2 class="mb-4">Listado de Todos los Grupos</h2>

  <?php if (empty($grupousuarios)): ?>
    <div class="alert alert-info text-center">No hay grupos registrados.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nombre del Grupo</th>
            <th>Estado</th>
            <th>Fecha de Creación</th>
            <th>ID Encargado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($grupousuarios as $grupo): ?>
            <tr>
              <td><?= $grupo->getIdgrupousuario() ?></td>
              <td><?= htmlspecialchars($grupo->getNombregrupo()) ?></td>
              <td>
                <span class="badge bg-<?= $grupo->getEstado() == 0 ? 'success' : 'secondary' ?>">
                  <?= $grupo->getEstado() == 0 ? 'Activo' : 'Inactivo' ?>
                </span>
              </td>
              <td><?= htmlspecialchars($grupo->getFechacreacion()) ?></td>
              <td>
                <?php
                    foreach ($usuarios as $g) {
                    if ($g->getIdUsuario() == $grupo->getIdencargado()) {
                        echo htmlspecialchars($g->getNombreusuario());
                        break;
                    }
                    }
                ?>
                </td>

            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
