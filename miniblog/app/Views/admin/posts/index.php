<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1>Gestionar Posts</h1>
            <p style="margin: 0;">Aquí puedes administrar todas las publicaciones de tu blog.</p>
        </div>
        <a href="/admin/posts/new" class="btn-primary">Añadir Nuevo Post</a>
    </div>

    <?php if (session()->has('success')): ?>
        <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="card" style="padding: 0;">
        <table class="styled-table">
            <thead>
                <tr>
                    <th style="width: 120px;">Imagen</th>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th style="width: 150px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
                        <img src="/uploads/posts/<?= $post['image_path'] ?>" alt="<?= esc($post['title']) ?>" style="width: 100px; height: 60px; object-fit: cover; border-radius: 0.5rem;">
                    </td>
                    <td><?= esc($post['title']) ?></td>
                    <td><?= esc($post['category_name']) ?></td>
                    <td>
                        <div class="actions">
                            <a href="/admin/posts/<?= $post['id'] ?>/edit">Editar</a>
                            <form action="/admin/posts/<?= $post['id'] ?>" method="post" onsubmit="return confirm('¿Estás seguro?');">
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