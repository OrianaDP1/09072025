<?php require_once 'menu.php'; ?>

<div class="container py-4">
  <h2 class="mb-4">Registrar Nuevo Cliente</h2>

  <form method="POST" action="index.php?accion=guardarcliente">
    <div class="mb-3">
      <label for="empresa" class="form-label">Empresa</label>
      <input type="text" name="empresa" id="empresa" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="ruc" class="form-label">RUC</label>
      <input type="text" name="ruc" id="ruc" class="form-control" required maxlength="11">
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="nombres" class="form-label">Nombres</label>
        <input type="text" name="nombres" id="nombres" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="dni" class="form-label">DNI</label>
      <input type="text" name="dni" id="dni" class="form-control" required maxlength="8">
    </div>

    <div class="mb-3">
      <label for="numerotel" class="form-label">Teléfono</label>
      <input type="text" name="numerotel" id="numerotel" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="nacionalidad" class="form-label">Nacionalidad</label>
      <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="creadordecliente" class="form-label">Creado por</label>
      <input type="text" name="creadordecliente" id="creadordecliente" class="form-control" required value="<?= htmlspecialchars($_SESSION['usuario'] ?? '') ?>"readonly >
    </div>

    <div class="mb-3">
      <label for="ultimocontrato" class="form-label">Último Contrato</label>
      <input type="date" name="ultimocontrato" id="ultimocontrato" class="form-control" value="<?= date('Y-m-d') ?>" required>
    </div>

    <div class="mb-3">
      <label for="encontrato" class="form-label">¿En contrato?</label>
      <select name="encontrato" id="encontrato" class="form-select" required>
        <option value="0">Sí</option>
        <option value="1">No</option>
      </select>
    </div>

    <div class="d-flex justify-content-between">
      <a href="index.php?accion=cargarclientes" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-success">Guardar Cliente</button>
    </div>
  </form>
</div>
