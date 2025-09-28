<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="login-card">
        <h2 class="form-title">Admin Panel Login</h2>

        <?php if (session()->has('error')): ?>
            <div class="alert alert-error" role="alert">
                <?= session('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-error" role="alert">
                <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= url_to('AuthController::login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            <button type="submit" class="btn">
                Sign In
            </button>
        </form>
    </div>

</body>
</html>