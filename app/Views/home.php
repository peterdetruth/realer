<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div style="max-width: 900px; margin: 0 auto; text-align: center;">

    <h1 class="mb-4">Welcome to Realer</h1>

    <!-- Poster Preview -->
    <iframe
        src="<?= base_url('documents/poster.pdf') ?>"
        style="width:100%; height:700px; border:1px solid #ccc;">
    </iframe>

    <br><br>

    <!-- Download Button -->
    <a href="<?= base_url('documents/poster.pdf') ?>"
        class="admin-btn"
        download>
        Download Poster
    </a>

    <br><br><br>

    <!-- Application Notice -->
    <div style="text-align: left; font-size: 0.95rem; line-height: 1.6;">
        <p>
            <strong>NB / Note:</strong><br>
            All applicants should be submitted <strong>[ONLINE]</strong> at
            <a href="https://github.com/peterdetruth/realer.git" target="_blank">
                https://github.com/peterdetruth/realer.git
            </a>
            indicating the specific position one is applying for.
        </p>

        <p>
            Please note that hard copy applications will not be accepted.
            Only shortlisted candidates will be contacted.
        </p>

        <p>
            All applications should be submitted not later than the stated deadline.
        </p>
    </div>

    <br>

    <!-- Start Application Button -->
    <a href="<?= site_url('application/start') ?>"
        class="admin-btn"
        style="padding: 12px 30px; font-size: 1rem;">
        Start Application
    </a>

</div>

<?= $this->endSection() ?>
