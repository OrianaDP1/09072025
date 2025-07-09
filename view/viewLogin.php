<!DOCTYPE html>
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
        
        <form>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Correo electrónico o nombre de usuario</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="ejemplo@correo.com" required>
            <div id="emailHelp" class="form-text">Nunca compartiremos tu correo.</div>
        </div>

        <div class="mb-3">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="••••••••" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberCheck">
            <label class="form-check-label" for="rememberCheck">Recuérdame</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>

</body>
</html>
