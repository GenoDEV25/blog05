<!DOCTYPE html>
<html lang="en">
<body>
    <main class="content">
        <div>
            <h1>Manage Categories</h1>
            <h4><a href="/admin/dashboard">Go back to dashboard</a></h4>
        </div>
        <a href="/admin/categories/new">Add New Category</a>

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success"><?= session('success') ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= esc($category['name']) ?></td>
                    <td>
                        <a href="/admin/categories/<?= $category['id'] ?>/edit">Edit</a>
                        <form action="/admin/categories/<?= $category['id'] ?>" method="post" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>