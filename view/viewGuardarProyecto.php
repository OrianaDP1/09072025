<?php require_once __DIR__ . '/menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Nuevo Proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-4">
    <h2 class="mb-4">Registrar Nuevo Proyecto</h2>

    <form method="POST" action="index.php?accion=guardarproyecto">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-select" required>
          <option value="0">Activo</option>
          <option value="1">Inactivo</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="ultimaactualizacion" class="form-label">Última Actualización</label>
        <input type="date" name="ultimaactualizacion" id="ultimaactualizacion" class="form-control" value="<?= date('Y-m-d') ?>" required>
      </div>

      <div class="mb-3">
        <label for="repoGIT" class="form-label">Repositorio GIT</label>
        <input type="url" name="repoGIT" id="repoGIT" class="form-control" placeholder="https://github.com/ejemplo" required>
      </div>

      <div class="mb-3">
        <label for="idcliente" class="form-label">Cliente</label>
        <select name="idcliente" id="idcliente" class="form-select" required>
          <option value="">Seleccione uno</option>
          <?php foreach ($clientes as $c): ?>
            <option value="<?= $c->getIdcliente() ?>"><?= htmlspecialchars($c->getEmpresa()) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="idgrupousuario" class="form-label">Grupo</label>
        <select name="idgrupousuario" id="idgrupousuario" class="form-select" required>
          <option value="">Seleccione uno</option>
          <?php foreach ($grupos as $g): ?>
            <option value="<?= $g->getIdgrupousuario() ?>"><?= htmlspecialchars($g->getNombregrupo()) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="idtipoproyecto" class="form-label">Tipo de Proyecto</label>
        <select id="idtipoproyecto" name="idtipoproyecto" class="form-select" required>
          <option value="">Seleccione uno</option>
          <?php foreach ($tipos as $tipo): ?>
            <option value="<?= $tipo->getIdtipoproyecto() ?>"><?= htmlspecialchars($tipo->getNombre()) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="idsubtproyecto" class="form-label">Subtipo</label>
        <select id="idsubtproyecto" name="idsubtproyecto" class="form-select" required>
          <option value="">Seleccione un tipo primero</option>
          <?php foreach ($subtproyectos as $sub): ?>
            <option data-tipo="<?= $sub->getIdtipoproyecto() ?>" value="<?= $sub->getIdsubtproyecto() ?>">
              <?= htmlspecialchars($sub->getNombre()) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Guardar Proyecto</button>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const tipoSelect = document.getElementById('idtipoproyecto');
      const subSelect = document.getElementById('idsubtproyecto');
      const allOptions = Array.from(subSelect.options).filter(opt => opt.value !== "");

      tipoSelect.addEventListener('change', () => {
        const selectedTipo = tipoSelect.value;
        subSelect.innerHTML = '<option value="">Seleccione un subtipo</option>';

        allOptions.forEach(opt => {
          if (opt.getAttribute('data-tipo') === selectedTipo) {
            subSelect.appendChild(opt);
          }
        });
      });
    });
  </script>
</body>
</html>
