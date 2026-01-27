<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2>Add Ward</h2>

<form method="post" action="/admin/wards/store">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">
            Constituency<span class="text-danger">*</span>
        </label>
        <select name="constituency_id" class="form-control" required>
            <option value="">Select Constituency</option>
            <?php foreach ($constituencies as $row): ?>
                <option value="<?= $row['id'] ?>">
                    <?= esc($row['county_name']) ?> — <?= esc($row['name']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Ward Name<span class="text-danger">*</span>
        </label>
        <input type="text"
            name="name"
            class="form-control"
            placeholder="Enter ward name"
            required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="/admin/wards" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
