<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1>Gestionar Categorías</h1>
            <p style="margin: 0;">Aquí puedes ver, crear, editar y eliminar categorías.</p>
        </div>
        <a href="/admin/categories/new" class="btn-primary">Añadir Nueva Categoría</a>
    </div>

    <?php if (session()->has('success')): ?>
        <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="card" style="padding: 0;"> <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th style="width: 150px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= esc($category['name']) ?></td>
                    <td>
                        <div class="actions">
                            <a href="/admin/categories/<?= $category['id'] ?>/edit">Editar</a>
                            <form action="/admin/categories/<?= $category['id'] ?>" method="post" onsubmit="return confirm('¿Estás seguro?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>