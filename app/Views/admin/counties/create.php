<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2>Add County</h2>

<form method="post" action="/admin/counties/store">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">County Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter county name" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="/admin/counties" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
