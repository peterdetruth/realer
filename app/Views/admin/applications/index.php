<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">

    <h2>Applications</h2>

    <?php if (empty($applications)): ?>
        <div class="flash-message flash-error">
            No applications submitted yet.
        </div>
    <?php else: ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Applicant</th>
                    <th>Position</th>
                    <th>County</th>
                    <th>Date Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $i => $app): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($app['user_name']) ?></td>
                        <td><?= esc($app['position_title']) ?></td>
                        <td><?= esc($app['county_name']) ?></td>
                        <td><?= date('d M Y H:i', strtotime($app['created_at'])) ?></td>
                        <td>
                            <a href="<?= site_url('admin/applications/view/' . $app['id']) ?>" class="admin-btn">
                                View
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>
