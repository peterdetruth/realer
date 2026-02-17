<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Education Levels</h2>

    <!-- Flash Messages -->
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

    <a href="<?= site_url('admin/education-levels/create') ?>" class="admin-btn mb-3">
        Add Education Level
    </a>

    <table class="table table-bordered" style="max-width:700px; margin:0 auto;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Education Level</th>
                <th>Category</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($levels)): ?>
                <?php foreach ($levels as $level): ?>
                    <tr>
                        <td><?= esc($level['id']) ?></td>
                        <td><?= esc($level['name']) ?></td>
                        <td><?= esc($level['category']) ?></td>
                        <td><?= esc($level['sort_order']) ?></td>
                        <td><?= $level['is_active'] ? 'Active' : 'Inactive' ?></td>
                        <td>
                            <a href="<?= site_url('admin/education-levels/edit/' . $level['id']) ?>"
                                class="admin-btn">Edit</a>
                            <a href="<?= site_url('admin/education-levels/delete/' . $level['id']) ?>"
                                onclick="return confirm('Are you sure?')"
                                class="admin-btn" style="background:#dc2626;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align:center;">No education levels found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-bottom:20px;">
        <a href="<?= site_url('admin/work-experience') ?>" class="admin-btn">Work Experience</a>
    </div>
</div>



<style>
    .admin-dashboard-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
        padding: 12px 15px;
        border: 1px solid #dee2e6;
    }

    .table th {
        background-color: #16a34a;
        color: white;
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .admin-btn {
        display: inline-block;
        background: #16a34a;
        color: #fff;
        padding: 8px 14px;
        margin: 2px 0;
        border-radius: 4px;
        font-size: 14px;
        text-decoration: none;
    }

    .admin-btn:hover {
        background: #15803d;
    }

    .flash-message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        width: 100%;
        max-width: 700px;
    }

    .flash-error {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .flash-success {
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }
</style>

<?= $this->endSection() ?>
