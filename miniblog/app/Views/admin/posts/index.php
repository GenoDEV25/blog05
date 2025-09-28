<!DOCTYPE html>
<html lang="en">
<body>
    <main class="content">
        <div>
            <h1>Manage Posts</h1>
            <h4><a href="/admin/dashboard">Go back to Dashboard</a></h4>
        </div>
        <a href="/admin/posts/new">Add New Post</a>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><img src="/uploads/posts/<?= $post['image_path'] ?>" alt="<?= esc($post['title']) ?>" width="100"></td>
                    <td><?= esc($post['title']) ?></td>
                    <td><?= esc($post['category_name']) ?></td>
                    <td>
                        <a href="/admin/posts/<?= $post['id'] ?>/edit">Edit</a>
                        <form action="/admin/posts/<?= $post['id'] ?>" method="post" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
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