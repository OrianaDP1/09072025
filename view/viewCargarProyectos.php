<?php require_once __DIR__ . '/menu.php'; ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Proyectos</h2>
    <a href="index.php?accion=guardarproyecto" class="btn btn-success">+ Nuevo Proyecto</a>
  </div>

  <?php if (empty($proyectos)): ?>
    <div class="alert alert-warning text-center">No hay proyectos registrados aún.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cliente</th>
            <th>Grupo</th>
            <th>Subtipo</th>
            <th>Estado</th>
            <th>Última actualización</th>
            <th>Repositorio</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($proyectos as $p): ?>
            <tr>
              <td><?= $p->getIdproyecto() ?></td>
              <td><?= htmlspecialchars($p->getNombre()) ?></td>
              <td><?= htmlspecialchars($p->getDescripcion()) ?></td>

              <!-- Cliente -->
              <td>
                <?php
                  foreach ($clientes as $c) {
                    if ($c->getIdcliente() == $p->getIdcliente()) {
                      echo htmlspecialchars($c->getEmpresa());
                      break;
                    }
                  }
                ?>
              </td>

              <!-- Grupo -->
              <td>
                <?php
                  foreach ($grupos as $g) {
                    if ($g->getIdgrupousuario() == $p->getIdgrupousuario()) {
                      echo htmlspecialchars($g->getNombregrupo());
                      break;
                    }
                  }
                ?>
              </td>

              <!-- Subtipo -->
              <td>
                <?php
                  foreach ($subtproyectos as $s) {
                    if ($s->getIdsubtproyecto() == $p->getIdsubtproyecto()) {
                      echo htmlspecialchars($s->getNombre());
                      break;
                    }
                  }
                ?>
              </td>

              <td>
                <span class="badge bg-<?= $p->getEstado() == 0 ? 'success' : 'secondary' ?>">
                  <?= $p->getEstado() == 0 ? 'Activo' : 'Inactivo' ?>
                </span>
              </td>
              <td><?= htmlspecialchars($p->getUltimaactualizacion()) ?></td>
              <td>
                <a href="<?= htmlspecialchars($p->getRepoGIT()) ?>" target="_blank">Repositorio</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
