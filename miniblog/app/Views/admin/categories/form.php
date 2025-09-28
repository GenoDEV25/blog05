<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

    <div style="max-width: 600px; margin: 0 auto;"> <div style="margin-bottom: 2rem;">
            <h1><?= isset($category) ? 'Editar Categoría' : 'Crear Nueva Categoría' ?></h1>
            <p style="margin: 0;">Completa la información a continuación.</p>
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
            <form action="<?= isset($category) ? '/admin/categories/' . $category['id'] : '/admin/categories' ?>" method="post">
                <?= csrf_field() ?>
                <?php if (isset($category)): ?>
                    <input type="hidden" name="_method" value="PUT">
                <?php endif; ?>

                <div class="form-group">
                    <label for="name" class="form-label">Nombre de la Categoría</label>
                    <input type="text" name="name" id="name" value="<?= old('name', $category['name'] ?? '') ?>" class="form-input" required>
                </div>

                <div style="display: flex; justify-content: flex-end; align-items: center; gap: 1rem; margin-top: 2rem;">
                    <a href="/admin/categories" style="text-decoration: none; color: #475569; font-weight: 600;">Cancelar</a>
                    <button type="submit" class="btn-primary"><?= isset($category) ? 'Actualizar' : 'Crear' ?></button>
                </div>
            </form>
        </div>
    </div>
    
<?= $this->endSection() ?>