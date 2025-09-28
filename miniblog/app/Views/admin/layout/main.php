<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        /* Adding a specific style for the back link to match the theme */
        .back-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: #475569; /* slate-600 */
            font-weight: 500;
            transition: color 0.2s ease-in-out;
        }
        .back-link:hover {
            color: #1e293b; /* slate-900 */
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                
                <a href="/" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Regresar al Blog</span>
                </a>

                <div style="display: flex; align-items: center; gap: 1rem; border-left: 1px solid #e2e8f0; padding-left: 1.5rem;">
                    <div class="gradient-bg" style="width: 48px; height: 48px; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <span style="font-size: 1.25rem; font-weight: 700;">A</span>
                    </div>
                    <span class="text-gradient" style="font-size: 1.5rem; font-weight: 700;">Admin Panel</span>
                </div>

            </div>
            <a href="<?= url_to('admin.logout') ?>" class="btn-primary">Cerrar Sesión</a>
        </div>
    </header>

    <main class="content-wrapper">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="main-footer" style="margin-top: 4rem;">
        <div style="text-align: center; color: #64748b; font-size: 0.875rem;">
            <p>© 2025 BlogSpace Admin. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>