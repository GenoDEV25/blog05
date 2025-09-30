<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

    <div style="max-width: 800px; margin: 0 auto;"> <div style="margin-bottom: 2rem;">
            <h1><?= isset($post) ? 'Editar Post' : 'Crear Nuevo Post' ?></h1>
            <p style="margin: 0;">Rellena los campos para añadir o actualizar una publicación.</p>
        </div>

        <?php if (session()->has('errors')): ?>
            <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                <strong>Errores de validación:</strong>
                <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <form action="<?= isset($post) ? '/admin/posts/' . $post['id'] : '/admin/posts' ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <?php if (isset($post)): ?>
                    <input type="hidden" name="_method" value="PUT">
                <?php endif; ?>

                <div class="form-group">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" value="<?= old('title', $post['title'] ?? '') ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select name="category_id" id="category_id" class="form-input">
                        <option value="">Selecciona una categoría</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" <?= (old('category_id', $post['category_id'] ?? '') == $category['id']) ? 'selected' : '' ?>>
                                <?= esc($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="summary" class="form-label">Resumen</label>
                    <textarea name="summary" id="summary" rows="5" class="form-input"><?= old('summary', $post['summary'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" name="image" id="image" class="form-input">
                </div>

                <?php if (isset($post) && !empty($post['image_path'])): ?>
                    <div class="form-group">
                        <p class="form-label">Imagen Actual:</p>
                        <img src="/uploads/posts/<?= $post['image_path'] ?>" alt="Current image" style="width: 200px; border-radius: 0.5rem;">
                    </div>
                <?php endif; ?>

                <div style="display: flex; justify-content: flex-end; align-items: center; gap: 1rem; margin-top: 2rem;">
                    <a href="/admin/posts" style="text-decoration: none; color: #475569; font-weight: 600;">Cancelar</a>
                    <button type="submit" class="btn-primary"><?= isset($post) ? 'Actualizar' : 'Crear' ?></button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>