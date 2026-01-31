<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h2>Edit Education Level</h2>

<form action="<?= site_url('admin/education-levels/update/' . $level['id']) ?>" method="post" style="max-width:500px;">

    <label>Name *</label>
    <input type="text" name="name" value="<?= esc($level['name']) ?>" required class="input-field">

    <label>Category *</label>
    <select name="category" required class="input-field">
        <option value="primary" <?= $level['category'] == 'primary' ? 'selected' : '' ?>>Primary</option>
        <option value="secondary" <?= $level['category'] == 'secondary' ? 'selected' : '' ?>>Secondary</option>
        <option value="tertiary" <?= $level['category'] == 'tertiary' ? 'selected' : '' ?>>Tertiary</option>
    </select>

    <label>Sort Order</label>
    <input type="number" name="sort_order" value="<?= $level['sort_order'] ?>" class="input-field">

    <label>
        <input type="checkbox" name="is_active" <?= $level['is_active'] ? 'checked' : '' ?>> Active
    </label>

    <button class="admin-btn" style="margin-top:15px;">Update</button>
</form>

<?= $this->endSection() ?>
