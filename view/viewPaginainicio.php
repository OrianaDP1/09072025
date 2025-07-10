<?php
require_once 'menu.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - SGProyectos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm text-center">
      <div class="card-body">
        <h4 class="card-title mb-3">Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h4>
      </div>
    </div>
  </div>
</div>
</body>
</html>