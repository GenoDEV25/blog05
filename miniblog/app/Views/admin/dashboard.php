<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        /* Additional styles for the dashboard layout */
        body {
            display: block; /* Override the flex centering for this page */
        }
        .navbar {
            background-color: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .content {
            padding: 2rem;
        }
        .logout-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-brand">Dashboard</div>
        <a href="<?= url_to('admin.logout') ?>" class="logout-link">Cerrar Sesión</a>
    </nav>

    <main class="content">
        <h1>Bienvenido al Panel de Administración</h1>
        <p>Desde aquí podrás gestionar los posts del blog.</p>

        <a href="/admin/categories">Manage Categories</a>
    </main>

</body>
</html>