<header>
    <h1>Kennie</h1>
    <hr>

    <?php if (session()->get('isLoggedIn')): ?>
        <p>Welcome, <?= esc(session()->get('user_name')) ?>!</p>
        <nav>
            <a href="<?= site_url('dashboard') ?>">Dashboard</a>

            <?php if (session()->get('role') === 'admin'): ?>
                | <a href="<?= site_url('admin') ?>">Admin Panel</a>
            <?php endif; ?>

            <?php if (session()->get('role') === 'staff' || session()->get('role') === 'admin'): ?>
                | <a href="<?= site_url('staff') ?>">Staff Area</a>
            <?php endif; ?>

            | <a href="<?= site_url('auth/logout') ?>">Logout</a>
        </nav>
    <?php else: ?>
        <nav>
            <a href="<?= site_url('auth/login') ?>">Login</a> |
            <a href="<?= site_url('auth/register') ?>">Sign Up</a>
        </nav>
    <?php endif; ?>


    <hr>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-message flash-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-message flash-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>


</header>
