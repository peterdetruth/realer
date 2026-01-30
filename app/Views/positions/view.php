<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div style="max-width:900px; margin:0 auto;">

    <h2 style="text-align:center; margin-bottom:10px;">
        <?= esc($position['title']) ?>
        <span style="font-size:0.9rem; color:#555;">
            (<?= esc($position['vacant_positions']) ?> Vacant Posts)
        </span>
    </h2>

    <hr>

    <!-- Salary -->
    <h4>Salary</h4>
    <ul>
        <?php foreach (explode("\n", $position['salary']) as $item): ?>
            <?php if (trim($item)): ?>
                <li><?= esc($item) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <!-- Duties -->
    <h4>Duties & Responsibilities</h4>
    <ul>
        <?php foreach (explode("\n", $position['duties']) as $item): ?>
            <?php if (trim($item)): ?>
                <li><?= esc($item) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <!-- Requirements -->
    <h4>Requirements</h4>
    <ul>
        <?php foreach (explode("\n", $position['requirements']) as $item): ?>
            <?php if (trim($item)): ?>
                <li><?= esc($item) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <br>

    <!-- Action Buttons -->
    <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <a href="<?= site_url('application/start?position=' . $position['id']) ?>"
            class="admin-btn">
            Apply for this Position
        </a>

        <a href="<?= site_url('/') ?>"
            class="admin-btn"
            style="background:#6b7280;">
            Back to Positions
        </a>
    </div>

</div>

<?= $this->endSection() ?>
