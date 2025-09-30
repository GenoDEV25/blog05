<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

    <h1>Bienvenido al Panel de Administración</h1>
    <p>Desde aquí podrás gestionar el contenido principal de tu blog.</p>

    <div class="dashboard-grid">
        <div class="card">
            <h2>Gestionar Categorías</h2>
            <p>Crea, edita y elimina las categorías que organizan tus publicaciones.</p>
            <a href="/admin/categories" class="btn-primary">Ir a Categorías</a>
        </div>

        <div class="card">
            <h2>Gestionar Posts</h2>
            <p>Escribe nuevas publicaciones, actualiza las existentes y adminístralas.</p>
            <a href="/admin/posts" class="btn-primary">Ir a Posts</a>
        </div>

        </div>

<?= $this->endSection() ?>