<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2 class="page-title"><?= esc($title) ?></h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="flash-message flash-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="flash-message flash-error"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant</th>
                <th>Job Title</th>
                <th>County</th>
                <th>Constituency</th>
                <th>Ward</th>
                <th>Work Experience</th>
                <th>Period</th>
                <th>Status</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($applications)): ?>
                <?php foreach ($applications as $i => $app): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($app['user_name']) ?></td>
                        <td><?= esc($app['position_title']) ?></td>
                        <td><?= esc($app['county_name']) ?></td>
                        <td><?= esc($app['constituency_id']) ?></td> <!-- Optional: you can join constituency table -->
                        <td><?= esc($app['ward_id']) ?></td> <!-- Optional: you can join ward table -->
                        <td><?= esc($app['work_experience_id']) ?></td> <!-- Optional: join work_experiences -->
                        <td><?= esc($app['work_experience_period_id']) ?></td> <!-- Optional: join experience_periods -->
                        <td>
                            <?php
                            $status = $app['status'] ?? 'Pending';
                            $statusClass = $status === 'Approved' ? 'status-approved' : ($status === 'Rejected' ? 'status-rejected' : 'status-pending');
                            ?>
                            <span class="<?= $statusClass ?>"><?= esc($status) ?></span>
                        </td>
                        <td><?= date('d M Y H:i', strtotime($app['created_at'])) ?></td>
                        <td class="action-buttons">
                            <a href="<?= site_url('admin/applications/edit/' . $app['id']) ?>" class="btn btn-edit">Edit</a>
                            <a href="<?= site_url('admin/applications/approve/' . $app['id']) ?>" class="btn btn-approve" onclick="return confirm('Approve this application?')">Approve</a>
                            <a href="<?= site_url('admin/applications/reject/' . $app['id']) ?>" class="btn btn-reject" onclick="return confirm('Reject this application?')">Reject</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" style="text-align:center;">No applications found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .table-container {
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .admin-table th,
    .admin-table td {
        padding: 10px 12px;
        text-align: left;
        border-bottom: 1px solid #e5e5e5;
    }

    .admin-table th {
        background-color: #f3f4f6;
        font-weight: 600;
    }

    .admin-table tr:hover {
        background-color: #f9fafb;
    }

    .status-approved {
        color: #16a34a;
        font-weight: 600;
    }

    .status-rejected {
        color: #dc2626;
        font-weight: 600;
    }

    .status-pending {
        color: #f59e0b;
        font-weight: 600;
    }

    .action-buttons a {
        display: inline-block;
        margin-right: 5px;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 13px;
        color: #fff;
        transition: 0.2s;
    }

    .btn-edit {
        background-color: #3b82f6;
    }

    .btn-edit:hover {
        background-color: #2563eb;
    }

    .btn-approve {
        background-color: #16a34a;
    }

    .btn-approve:hover {
        background-color: #15803d;
    }

    .btn-reject {
        background-color: #dc2626;
    }

    .btn-reject:hover {
        background-color: #b91c1c;
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
