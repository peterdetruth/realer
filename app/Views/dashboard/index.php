<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Welcome to the Kennie Dashboard</h2>
<p>Hello, <?= session()->get('user_name') ?>!</p>

<?php if (isset($message)): ?>
    <p><?= esc($message) ?></p>
<?php endif; ?>

<p><a href="<?= site_url('auth/logout') ?>">Logout</a></p>

<?= $this->endSection() ?>
