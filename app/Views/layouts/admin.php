<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Realer Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        header {
            background: #1f2937;
            color: #fff;
            padding: 15px 20px;
        }

        main {
            padding: 20px;
        }

        footer {
            background: #e5e7eb;
            padding: 10px 20px;
            text-align: center;
            font-size: 14px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        .admin-dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            text-align: center;
            width: 100%;
        }

        .admin-dashboard-container h2,
        .admin-dashboard-container h3 {
            margin-bottom: 20px;
        }

        .admin-btn {
            display: inline-block;
            background: #16a34a;
            color: #fff;
            padding: 10px 14px;
            margin-right: 8px;
            margin-top: 5px;
            border-radius: 4px;
            font-size: 14px;
        }

        .admin-btn:hover {
            background: #15803d;
        }

        .admin-nav-btn {
            display: inline-block;
            background: #2563eb;
            color: #fff;
            padding: 8px 14px;
            margin-left: 8px;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            font-size: 14px;
        }

        .admin-nav-btn:hover {
            background: #1e40af;
        }

        .admin-nav-btn.active {
            background: #16a34a;
        }

        .geo-actions {
            display: flex;
            gap: 15px;
            margin-top: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .geo-actions .admin-btn {
            flex: 0 0 180px;
            text-align: center;
        }

        .dashboard-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .dashboard-card {
            background: #2563eb;
            color: #fff;
            padding: 25px 20px;
            border-radius: 10px;
            width: 180px;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .dashboard-card h3 {
            font-size: 28px;
            margin: 0 0 10px;
        }

        .dashboard-card p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <?php $currentUri = service('uri')->getPath(); ?>
    <?php $role = session()->get('role') ?? ''; // fetch role from session
    ?>

    <header style="display:flex; justify-content:space-between; align-items:center;">
        <strong>Realer Admin Panel</strong>

        <nav>
            <!-- Home -->
            <a class="admin-nav-btn <?= $currentUri === '/' ? 'active' : '' ?>"
                href="<?= site_url('/') ?>">
                Home
            </a>

            <!-- Dashboard -->
            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'admin/dashboard') ? 'active' : '' ?>"
                href="<?= site_url('admin/dashboard') ?>">
                Dashboard
            </a>

            <!-- Admin Panel -->
            <a class="admin-nav-btn <?= $currentUri === 'admin' ? 'active' : '' ?>"
                href="<?= site_url('admin') ?>">
                Admin Panel
            </a>

            <!-- Positions -->
            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'admin/positions') ? 'active' : '' ?>"
                href="<?= site_url('admin/positions') ?>">
                Positions
            </a>

            <!-- Education Levels -->
            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'admin/education-levels') ? 'active' : '' ?>"
                href="<?= site_url('admin/education-levels') ?>">
                Education Levels
            </a>

            <!-- Applications -->
            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'admin/applications') ? 'active' : '' ?>"
                href="<?= site_url('admin/applications') ?>">
                Applications
            </a>

            <?php if ($role === 'admin' || $role === 'staff'): ?>
                <a class="admin-nav-btn <?= str_starts_with($currentUri, 'staff') ? 'active' : '' ?>"
                    href="<?= site_url('staff') ?>">
                    Staff Area
                </a>
            <?php endif; ?>

            <!-- Logout -->
            <a class="admin-nav-btn" href="<?= site_url('auth/logout') ?>" style="background:#dc2626;">
                Logout
            </a>
        </nav>
    </header>

    <main>
        <!-- Flash Messages (Universal) -->
        <?php if (session()->getFlashdata('success')): ?>
            <div style="background-color:#16a34a; color:#fff; padding:10px 15px; margin-bottom:15px; border-radius:5px; text-align:center;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="background-color:#dc2626; color:#fff; padding:10px 15px; margin-bottom:15px; border-radius:5px; text-align:center;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        &copy; <?= date('Y') ?> Realer System
    </footer>

</body>

</html>
