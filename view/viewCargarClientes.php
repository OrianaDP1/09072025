<?php require_once './helpers/verificacion.php'; ?>
<?php require_once 'menu.php'; ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Clientes Registrados</h2>
    <a href="index.php?accion=guardarcliente" class="btn btn-success">+ Nuevo Cliente</a>
  </div>

  <?php if (empty($clientes)): ?>
    <div class="alert alert-warning text-center">No hay clientes registrados aún.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>Empresa</th>
            <th>RUC</th>
            <th>Nombre Contacto</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>País</th>
            <th>Último Contrato</th>
            <th>Eliminar</th>
            <th>Modificar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($clientes as $c): ?>
            <tr>
              <td><?= htmlspecialchars($c->getEmpresa()) ?></td>
              <td><?= $c->getRUC() ?></td>
              <td><?= $c->getNombres() . ' ' . $c->getApellidos() ?></td>
              <td><?= $c->getDni() ?></td>
              <td><?= $c->getNumerotel() ?></td>
              <td><?= $c->getNacionalidad() ?></td>
              <td><?= $c->getUltimocontrato() ?></td>
              <td>
                <a href="index.php?accion=eliminarcliente&idcli<?= $c->getIdcliente() ?>"
                  onclick="return confirm('¿Estás seguro de eliminar este cliente?')"
                  class="btn btn-danger btn-sm">
                  Eliminar
                </a>
              </td>

              <td>
                <a href="../index.php?accion=modificarcliente&idcliente=<?= $c->getIdcliente() ?>"
                  class="btn btn-primary btn-sm">
                  Modificar
                </a>
              </td>            
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
