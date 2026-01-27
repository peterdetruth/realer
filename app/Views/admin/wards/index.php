<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Wards</h2>

    <!-- Add Ward Button -->
    <a href="<?= site_url('admin/wards/create') ?>" class="admin-btn">Add Ward</a>

    <!-- Wards Table -->
    <div style="overflow-x:auto; margin-top:20px; width:100%; max-width:1000px;">
        <table style="width:100%; border-collapse: collapse; background:#fff; box-shadow:0 3px 6px rgba(0,0,0,0.1);">
            <thead style="background:#2563eb; color:#fff;">
                <tr>
                    <th style="padding:10px; text-align:center;">#</th>
                    <th style="padding:10px; text-align:left;">Ward Name</th>
                    <th style="padding:10px; text-align:left;">Constituency</th>
                    <th style="padding:10px; text-align:left;">County</th>
                    <th style="padding:10px; text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wards as $row): ?>
                    <tr style="border-bottom:1px solid #e5e7eb;">
                        <td style="padding:10px; text-align:center;"><?= $row['id'] ?></td>
                        <td style="padding:10px;"><?= esc($row['name']) ?></td>
                        <td style="padding:10px;"><?= esc($row['constituency_name']) ?></td>
                        <td style="padding:10px;"><?= esc($row['county_name']) ?></td>
                        <td style="padding:10px; text-align:center;">
                            <a href="<?= site_url('admin/wards/edit/' . $row['id']) ?>" class="admin-btn" style="background:#2563eb;">Edit</a>
                            <a href="<?= site_url('admin/wards/delete/' . $row['id']) ?>" onclick="return confirm('Are you sure?')" class="admin-btn" style="background:#dc2626;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php if (empty($wards)): ?>
                    <tr>
                        <td colspan="5" style="padding:15px; text-align:center; color:#6b7280;">No wards found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
