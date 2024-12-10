<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a Turista sin maps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center text-center">
        <!-- Encabezado -->
        <header class="mb-4">
            <h1 class="display-4 fw-bold text-primary">Bienvenidos a <span class="text-secondary">Turista Sin Maps</span></h1>
            <p class="lead text-muted">Tu mejor opción para planificar tus viajes y experiencias.</p>
        </header>

        <!-- Imagen de fondo o hero -->
        <div class="mb-4">
            <img src="https://via.placeholder.com/800x400" alt="Turista sin maps" class="img-fluid rounded shadow-lg">
        </div>

        <!-- Botones de acción -->
        <div>
            <a href="{{ route('usuario.registro') }}" class="btn btn-primary btn-lg me-3">Regístrate</a>
            <a href="{{ route('usuario.iniciar_sesion') }}" class="btn btn-outline-secondary btn-lg">Inicia Sesión</a>
        </div>

        <!-- Pie de página -->
        <footer class="mt-5 text-muted">
            <p>&copy; {{ date('Y') }} Turista sin maps. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
