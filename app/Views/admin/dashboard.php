<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<h2>Dashboard</h2>
<p>Welcome to the Kennie Admin Dashboard</p>

<div class="dashboard-cards">
    <a href="<?= site_url('admin') ?>" class="dashboard-card">
        <h3><?= $totalUsers ?></h3>
        <p>Users</p>
    </a>

    <a href="<?= site_url('admin/counties') ?>" class="dashboard-card">
        <h3><?= $totalCounties ?></h3>
        <p>Counties</p>
    </a>

    <a href="<?= site_url('admin/constituencies') ?>" class="dashboard-card">
        <h3><?= $totalConstituencies ?></h3>
        <p>Constituencies</p>
    </a>

    <a href="<?= site_url('admin/wards') ?>" class="dashboard-card">
        <h3><?= $totalWards ?></h3>
        <p>Wards</p>
    </a>
</div>

<?= $this->endSection() ?>
