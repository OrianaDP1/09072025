<?php require_once './helpers/verificacion.php'; ?>
<?php require_once 'menu.php'; ?>

<div class="container py-4">
  <h2>Reporte de Proyectos por Empresa</h2>

  <?php foreach ($agrupado as $empresa): ?>
    <div class="card mb-4 shadow">
      <div class="card-header bg-dark text-white">
        <?= htmlspecialchars($empresa['empresa']) ?> — RUC: <?= $empresa['ruc'] ?>
        <br><small>Contacto: <?= htmlspecialchars($empresa['contacto']) ?></small>
      </div>
      <ul class="list-group list-group-flush">
        <?php foreach ($empresa['proyectos'] as $p): ?>
          <li class="list-group-item">
            <strong><?= htmlspecialchars($p['nombre']) ?></strong><br>
            <small><?= htmlspecialchars($p['descripcion']) ?></small><br>
            Última actualización: <?= $p['ultimaactualizacion'] ?> — 
            <a href="<?= $p['repoGIT'] ?>" target="_blank">Repositorio</a> —
            Estado: <?= $p['estado'] == 0 ? 'Activo' : 'Inactivo' ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endforeach; ?>
</div>
