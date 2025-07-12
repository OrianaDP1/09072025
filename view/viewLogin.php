<?php require_once __DIR__ . '/../config/config.php';?>
<!DOCTYPE html>
<?php
//echo 'URL actual: ' . $_SERVER['REQUEST_URI'];
?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h2 class="text-center mb-4">Iniciar Sesión</h2>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?accion=login">
      <div class="mb-3">
        <label for="nombreusuario" class="form-label">Usuario</label>
        <input type="text" name="nombreusuario" class="form-control" id="nombreusuario" placeholder="Nombre de usuario" required>
      </div>

      <div class="mb-3">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="••••••••" required>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberCheck">
        <label class="form-check-label" for="rememberCheck">Recuérdame</label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
    <div class="mt-3 text-center">
      ¿No tienes una cuenta? <a href="../index.php?accion=registrarse">Registrate</a>
    </div>
  </div>

</body>
</html>
