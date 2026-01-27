<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Create New User</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="flash-message flash-error"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="<?= site_url('admin/create') ?>">
    <label>Email Address*:</label><br>
    <input type="email" name="email" placeholder="Enter email address" value="<?= old('email') ?>" required><br><br>

    <label>Password*:</label><br>
    <input type="password" name="password" placeholder="Enter password" required><br><br>

    <label>Role*:</label><br>
    <select name="role_id" required>
        <?php foreach ($roles as $role): ?>
            <option value="<?= $role['id'] ?>"><?= esc($role['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit" style="background-color: green; color: white; padding: 5px 10px; cursor: pointer;">Create User</button>
</form>

<p><a href="<?= site_url('admin') ?>">Back to User Management</a></p>

<?= $this->endSection() ?>
