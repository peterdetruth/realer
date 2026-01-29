<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2>Positions</h2>

<a href="/admin/positions/create" class="admin-btn mb-3">Add Position</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="flash-message flash-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Duties & Responsibilities</th>
            <th>Requirements</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positions as $pos): ?>
            <tr>
                <td><?= $pos['table_order'] ?></td>
                <td><?= esc($pos['title']) ?></td>
                <td>
                    <ul><?php foreach (explode("\n", $pos['salary']) as $s) echo "<li>" . esc($s) . "</li>"; ?></ul>
                </td>
                <td>
                    <ul><?php foreach (explode("\n", $pos['duties']) as $d) echo "<li>" . esc($d) . "</li>"; ?></ul>
                </td>
                <td>
                    <ul><?php foreach (explode("\n", $pos['requirements']) as $r) echo "<li>" . esc($r) . "</li>"; ?></ul>
                </td>
                <td>
                    <a href="/admin/positions/edit/<?= $pos['id'] ?>" class="admin-btn">Edit</a>
                    <a href="/admin/positions/delete/<?= $pos['id'] ?>" onclick="return confirm('Are you sure?')" class="admin-btn">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
