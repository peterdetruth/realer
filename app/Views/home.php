<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div style="max-width: 1000px; margin: 0 auto;">

    <h1 class="mb-4" style="text-align:center;">Welcome to Realer</h1>

    <!-- Positions Table -->
    <table class="table table-bordered" style="width:100%; background:#fff;">
        <thead style="background:#e8f5e9;">
            <tr>
                <th>No.</th>
                <th>Position</th>
                <th>No. of Vacant Posts</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($positions)): ?>
                <?php foreach ($positions as $pos): ?>
                    <tr>
                        <td><?= esc($pos['table_order']) ?></td>

                        <td>
                            <?= esc($pos['title']) ?>
                        </td>

                        <td>
                            <?= esc($pos['vacant_positions']) ?>
                        </td>

                        <td>
                            <a href="<?= site_url('positions/view/' . $pos['id']) ?>"
                                class="admin-btn">
                                View
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">
                        No positions available at the moment.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>

    <!-- Download Button -->
    <div style="text-align:center; margin-bottom:25px;">
        <a href="<?= base_url('documents/poster.pdf') ?>"
            class="admin-btn"
            download>
            Download Poster
        </a>
    </div>

    <!-- Application Notice -->
    <div style="font-size:0.95rem; line-height:1.6;">
        <p>
            <strong>NB / Note:</strong><br>
            All applicants should be submitted <strong>[ONLINE]</strong> indicating
            the specific position one is applying for.
        </p>

        <p>
            Hard copy applications will not be accepted.
            Only shortlisted candidates will be contacted.
        </p>
    </div>

    <br>

    <!-- Start Application Button -->
    <div style="text-align:center;">
        <a href="<?= site_url('application/start') ?>"
            class="admin-btn"
            style="padding:12px 30px;">
            Start Application
        </a>
    </div>

</div>

<?= $this->endSection() ?>
