<?php $currentUri = service('uri')->getPath(); ?>

<header style="display:flex; justify-content:space-between; align-items:center; padding:15px 20px;">
    <strong style="font-size:18px;">Realer</strong>

    <nav>
        <?php if (session()->get('isLoggedIn')): ?>

            <span style="margin-right:15px;">
                Welcome, <?= esc(session()->get('user_name')) ?>
            </span>

            <a class="admin-nav-btn <?= $currentUri === 'dashboard' ? 'active' : '' ?>"
                href="<?= site_url('dashboard') ?>">
                Dashboard
            </a>

            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'profile') ? 'active' : '' ?>"
                href="<?= site_url('profile') ?>">
                Profile
            </a>

            <?php if (session()->get('role') === 'admin'): ?>
                <a class="admin-nav-btn <?= str_starts_with($currentUri, 'admin') ? 'active' : '' ?>"
                    href="<?= site_url('admin') ?>">
                    Admin Panel
                </a>
            <?php endif; ?>

            <?php if (in_array(session()->get('role'), ['admin', 'staff'])): ?>
                <a class="admin-nav-btn <?= str_starts_with($currentUri, 'staff') ? 'active' : '' ?>"
                    href="<?= site_url('staff') ?>">
                    Staff Area
                </a>
            <?php endif; ?>

            <a class="admin-nav-btn"
                href="<?= site_url('auth/logout') ?>"
                onclick="return confirm('Are you sure you want to logout?')">
                Logout
            </a>

        <?php else: ?>

            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'auth/login') ? 'active' : '' ?>"
                href="<?= site_url('auth/login') ?>">
                Login
            </a>

            <a class="admin-nav-btn <?= str_starts_with($currentUri, 'auth/register') ? 'active' : '' ?>"
                href="<?= site_url('auth/register') ?>">
                Sign Up
            </a>

        <?php endif; ?>
    </nav>
</header>

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
