<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2>Education Levels</h2>

<a href="<?= site_url('admin/education-levels/create') ?>" class="admin-btn">
    Add Education Level
</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="flash-message flash-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<table class="table table-bordered" style="margin-top:20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($levels as $level): ?>
            <tr>
                <td><?= $level['sort_order'] ?></td>
                <td><?= esc($level['name']) ?></td>
                <td><?= ucfirst($level['category']) ?></td>
                <td><?= $level['is_active'] ? 'Active' : 'Inactive' ?></td>
                <td>
                    <a href="<?= site_url('admin/education-levels/edit/' . $level['id']) ?>" class="admin-btn">Edit</a>
                    <a href="<?= site_url('admin/education-levels/delete/' . $level['id']) ?>"
                        onclick="return confirm('Delete this record?')"
                        class="admin-btn">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
