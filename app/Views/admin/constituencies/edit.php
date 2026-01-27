<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2>Edit Constituency</h2>

<form method="post" action="/admin/constituencies/update/<?= $constituency['id'] ?>">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">County<span class="text-danger">*</span></label>
        <select name="county_id" class="form-control" required>
            <?php foreach ($counties as $county): ?>
                <option value="<?= $county['id'] ?>"
                    <?= $county['id'] == $constituency['county_id'] ? 'selected' : '' ?>>
                    <?= esc($county['name']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Constituency Name<span class="text-danger">*</span></label>
        <input type="text"
            name="name"
            class="form-control"
            value="<?= esc($constituency['name']) ?>"
            required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/admin/constituencies" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
