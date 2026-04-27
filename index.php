<?php
// Nombre: José Armando Villalobos Puga

require_once 'autoload.php';

use controllers\ProductoController;
use models\Producto;

$mensaje = "";
$productoEditar = null;

try {
    $controller = new ProductoController();

    $terminoBusqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';

    if (isset($_GET['eliminar'])) {
        $controller->eliminar((int)$_GET['eliminar']);
        $mensaje = "Producto eliminado correctamente.";
    }

    if (isset($_GET['editar'])) {
        $productoEditar = $controller->obtenerPorId((int)$_GET['editar']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;

        $producto = new Producto();
        $producto->setId($id);
        $producto->setNombre(trim($_POST['nombre']));
        $producto->setDescripcion(trim($_POST['descripcion']));
        $producto->setExistencia((int)$_POST['existencia']);
        $producto->setPrecio((float)$_POST['precio']);

        if ($id) {
            $controller->actualizar($producto);
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $controller->crear($producto);
            $mensaje = "Producto agregado correctamente.";
        }
    }

    $productos = $terminoBusqueda !== ''
        ? $controller->buscar($terminoBusqueda)
        : $controller->listar();

} catch (\RuntimeException $e) {
    $mensaje = "Error: " . $e->getMessage();
    $productos = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PDO - POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-info"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <?= $productoEditar ? "Editar producto" : "Agregar producto" ?>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $productoEditar['id'] ?? '' ?>">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?= htmlspecialchars($productoEditar['nombre'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control"
                               value="<?= htmlspecialchars($productoEditar['descripcion'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Existencia</label>
                        <input type="number" name="existencia" class="form-control"
                               value="<?= htmlspecialchars($productoEditar['existencia'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control"
                               value="<?= htmlspecialchars($productoEditar['precio'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <?= $productoEditar ? "Actualizar" : "Guardar" ?>
                        </button>
                    </div>
                </div>
                <?php if ($productoEditar): ?>
                    <a href="index.php" class="btn btn-secondary">Cancelar edición</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">Lista de productos</div>
        <div class="card-body">
            <form method="GET" action="" class="row g-2 mb-3">
                <div class="col-md-10">
                    <input type="text" name="buscar" class="form-control"
                           placeholder="Buscar por nombre o descripción"
                           value="<?= htmlspecialchars($terminoBusqueda) ?>">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <?php if ($terminoBusqueda !== ''): ?>
                    <div class="col-12">
                        <a href="index.php" class="btn btn-secondary btn-sm">Mostrar todos</a>
                    </div>
                <?php endif; ?>
            </form>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th><th>Nombre</th><th>Descripción</th>
                        <th>Existencia</th><th>Precio</th><th width="180">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($productos) > 0): ?>
                    <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['id']) ?></td>
                            <td><?= htmlspecialchars($p['nombre']) ?></td>
                            <td><?= htmlspecialchars($p['descripcion']) ?></td>
                            <td><?= htmlspecialchars($p['existencia']) ?></td>
                            <td>$<?= number_format($p['precio'], 2) ?></td>
                            <td>
                                <a href="index.php?editar=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="index.php?eliminar=<?= $p['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">No hay productos registrados.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>