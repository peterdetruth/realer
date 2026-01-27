<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Admin Panel</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div style="background-color:#16a34a; color:#fff; padding:10px 15px; margin-bottom:15px; border-radius:5px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="background-color:#dc2626; color:#fff; padding:10px 15px; margin-bottom:15px; border-radius:5px;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- User Management Section -->
    <h3>User Management</h3>
    <a href="<?= site_url('admin/users/create') ?>" class="admin-btn">Create User</a>

    <!-- Users Table -->
    <table style="margin-top:20px; border-collapse: collapse; width: 80%;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Role</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Status</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['id'] ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?= esc($user['name']) ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?= esc($user['email']) ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <?= $roles[array_search($user['role_id'], array_column($roles, 'id'))]['name'] ?? 'User' ?>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?= esc($user['status']) ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="<?= site_url('admin/users/edit/' . $user['id']) ?>" class="admin-btn">Edit</a>
                        <a href="<?= site_url('admin/users/delete/' . $user['id']) ?>" class="admin-btn" style="background:#dc2626;">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Geography Management Section (admin only) -->
    <?php if ($role === 'admin') : ?>
        <h3 style="margin-top: 40px;">Geography Management</h3>
        <div class="geo-actions">
            <a href="<?= site_url('admin/counties') ?>" class="admin-btn">Counties</a>
            <a href="<?= site_url('admin/constituencies') ?>" class="admin-btn">Constituencies</a>
            <a href="<?= site_url('admin/wards') ?>" class="admin-btn">Wards</a>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
