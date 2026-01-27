<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Edit User</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="flash-message flash-error"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="<?= site_url('admin/edit/' . $user['id']) ?>">
    <label>Email Address*:</label><br>
    <input type="email" name="email" value="<?= old('email', $user['email']) ?>" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" placeholder="Leave blank to keep current password"><br><br>

    <label>Role*:</label><br>
    <select name="role_id" required>
        <?php foreach ($roles as $role): ?>
            <option value="<?= $role['id'] ?>" <?= $role['id'] == $user['role_id'] ? 'selected' : '' ?>>
                <?= esc($role['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Status*:</label><br>
    <select name="status" required>
        <option value="active" <?= $user['status'] === 'active' ? 'selected' : '' ?>>Active</option>
        <option value="inactive" <?= $user['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
        <option value="suspended" <?= $user['status'] === 'suspended' ? 'selected' : '' ?>>Suspended</option>
    </select><br><br>

    <button type="submit" style="background-color: #007bff; color: white; padding: 5px 10px; cursor: pointer;">Update User</button>
</form>

<p><a href="<?= site_url('admin') ?>">Back to User Management</a></p>

<?= $this->endSection() ?>
