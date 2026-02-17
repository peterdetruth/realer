<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-container">

    <h2>Work Experience Management</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-message flash-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-message flash-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- ===== WORK EXPERIENCE ===== -->
    <div class="card">
        <h3>Add New Work Experience</h3>
        <form method="post" action="<?= site_url('admin/work-experience/create-work') ?>" class="inline-form">
            <input type="text" name="name" placeholder="New work experience" required class="input-field">
            <button type="submit" class="admin-btn">Add</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($work_experiences as $w): ?>
                    <tr>
                        <form method="post" action="<?= site_url('admin/work-experience/update-work/' . $w['id']) ?>">
                            <td>
                                <input type="text" name="name" value="<?= esc($w['name']) ?>" class="input-field">
                            </td>
                            <td class="center">
                                <input type="checkbox" name="is_active" value="1" <?= $w['is_active'] ? 'checked' : '' ?>>
                            </td>
                            <td class="center">
                                <button type="submit" class="admin-btn btn-sm">Save</button>
                                <a href="<?= site_url('admin/work-experience/delete-work/' . $w['id']) ?>" onclick="return confirm('Delete this record?')" class="admin-btn btn-sm btn-danger">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ===== EXPERIENCE PERIODS ===== -->
    <div class="card">
        <h3>Add New Experience Period</h3>
        <form method="post" action="<?= site_url('admin/work-experience/create-period') ?>" class="inline-form">
            <input type="text" name="label" placeholder="Label" required class="input-field">
            <input type="number" name="sort_order" placeholder="Sort order" class="input-field">
            <button type="submit" class="admin-btn">Add</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($periods as $p): ?>
                    <tr>
                        <form method="post" action="<?= site_url('admin/work-experience/update-period/' . $p['id']) ?>">
                            <td>
                                <input type="text" name="label" value="<?= esc($p['label']) ?>" class="input-field">
                            </td>
                            <td>
                                <input type="number" name="sort_order" value="<?= esc($p['sort_order']) ?>" class="input-field">
                            </td>
                            <td class="center">
                                <input type="checkbox" name="is_active" value="1" <?= $p['is_active'] ? 'checked' : '' ?>>
                            </td>
                            <td class="center">
                                <button type="submit" class="admin-btn btn-sm">Save</button>
                                <a href="<?= site_url('admin/work-experience/delete-period/' . $p['id']) ?>" onclick="return confirm('Delete this record?')" class="admin-btn btn-sm btn-danger">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<style>
    .admin-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
    }

    .admin-container h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .card {
        background: #fff;
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 8px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .inline-form {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .input-field {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        flex: 1;
        min-width: 180px;
        box-sizing: border-box;
    }

    .admin-btn {
        padding: 8px 14px;
        background-color: #16a34a;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.2s;
        text-decoration: none;
    }

    .admin-btn:hover {
        background-color: #15803d;
    }

    .admin-btn.btn-sm {
        padding: 5px 10px;
        font-size: 13px;
    }

    .admin-btn.btn-danger {
        background-color: #dc2626;
    }

    .admin-btn.btn-danger:hover {
        background-color: #b91c1c;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .admin-table th,
    .admin-table td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .admin-table th {
        background-color: #f3f4f6;
    }

    .center {
        text-align: center;
    }

    .flash-message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        text-align: center;
    }

    .flash-success {
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .flash-error {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }
</style>

<?= $this->endSection() ?>
