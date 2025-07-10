<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrarse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h2 class="text-center mb-4">Crear cuenta</h2>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?accion=registrarse">
      <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" name="correo" id="correo" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nombreusuario" class="form-label">Nombre de usuario</label>
        <input type="text" name="nombreusuario" id="nombreusuario" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>

    <div class="mt-3 text-center">
      ¿Ya tienes una cuenta? <a href="../index.php?accion=login">Inicia sesión</a>
    </div>
  </div>

</body>
</html>
