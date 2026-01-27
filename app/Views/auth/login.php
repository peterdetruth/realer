<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Login to Kennie</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div style="color: red;"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="<?= site_url('auth/login') ?>">
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= old('email') ?>" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<?= $this->endSection() ?>
