<!DOCTYPE html>
<html lang="en">
<body>
    <main class="content">
        <div>
            <h1><?= isset($post) ? 'Edit Post' : 'Create New Post' ?></h1>
            <?php if (session()->has('errors')): ?>
                <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
                    <strong>Validation Errors:</strong>
                    <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <h4><a href="/admin/dashboard">Go back to Dashboard</a></h4>
        </div>
        <form action="<?= isset($post) ? '/admin/posts/' . $post['id'] : '/admin/posts' ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php if (isset($post)): ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?= old('title', $post['title'] ?? '') ?>" class="form-input">
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-input">
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= (old('category_id', $post['category_id'] ?? '') == $category['id']) ? 'selected' : '' ?>>
                            <?= esc($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea name="summary" id="summary" rows="5" class="form-input"><?= old('summary', $post['summary'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-input">
            </div>

            <?php if (isset($post) && !empty($post['image_path'])): ?>
                <div class="form-group">
                    <p>Current Image:</p>
                    <img src="/uploads/posts/<?= $post['image_path'] ?>" alt="Current image" width="150">
                </div>
            <?php endif; ?>

            <button type="submit" class="btn"><?= isset($post) ? 'Update' : 'Create' ?></button>
        </form>
    </main>
</body>
</html>