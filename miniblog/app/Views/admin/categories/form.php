<!DOCTYPE html>
<html lang="en">
<body>
    <main class="content">
        <div>
            <h1><?= isset($category) ? 'Edit Category' : 'Create New Category' ?></h1>
            <h4><a href="/admin/dashboard">Go back to Dashboard</a></h4>
        </div>

        <?php if (session()->has('errors')): ?>
            <div class="alert alert-error">
                <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= isset($category) ? '/admin/categories/' . $category['id'] : '/admin/categories' ?>" method="post">
            <?= csrf_field() ?> <?php if (isset($category)): ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" value="<?= old('name', $category['name'] ?? '') ?>" class="form-input" required>
            </div>

            <button type="submit" class="btn"><?= isset($category) ? 'Update' : 'Create' ?></button>
        </form>
    </main>
</body>
</html>