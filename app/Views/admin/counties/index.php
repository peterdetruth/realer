<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Counties</h2>

    <!-- Flash messages are handled in the layout now -->

    <!-- Add County Button -->
    <a href="<?= site_url('admin/counties/create') ?>" class="admin-btn">Add County</a>

    <!-- Counties Table -->
    <div style="overflow-x:auto; margin-top:20px; width:100%; max-width:800px;">
        <table style="width:100%; border-collapse: collapse; background:#fff; box-shadow:0 3px 6px rgba(0,0,0,0.1);">
            <thead style="background:#2563eb; color:#fff;">
                <tr>
                    <th style="padding:10px; text-align:center;">#</th>
                    <th style="padding:10px; text-align:left;">County Name</th>
                    <th style="padding:10px; text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($counties as $county): ?>
                    <tr style="border-bottom:1px solid #e5e7eb;">
                        <td style="padding:10px; text-align:center;"><?= $county['id'] ?></td>
                        <td style="padding:10px;"><?= esc($county['name']) ?></td>
                        <td style="padding:10px; text-align:center;">
                            <a href="<?= site_url('admin/counties/edit/' . $county['id']) ?>" class="admin-btn" style="background:#2563eb;">Edit</a>
                            <a href="<?= site_url('admin/counties/delete/' . $county['id']) ?>" onclick="return confirm('Are you sure?')" class="admin-btn" style="background:#dc2626;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php if (empty($counties)): ?>
                    <tr>
                        <td colspan="3" style="padding:15px; text-align:center; color:#6b7280;">No counties found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
