<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Edit Education Level</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-message flash-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-message flash-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <form
        action="<?= site_url('admin/education-levels/update/' . $level['id']) ?>"
        method="post"
        style="max-width:600px; width:100%; text-align:left; margin-top:20px;">

        <label for="name">Name *</label>
        <input
            type="text"
            name="name"
            id="name"
            value="<?= old('name', esc($level['name'])) ?>"
            required
            class="input-field">

        <label for="category">Category *</label>
        <select name="category" id="category" required class="input-field">
            <option value="primary" <?= old('category', $level['category']) == 'primary' ? 'selected' : '' ?>>Primary</option>
            <option value="secondary" <?= old('category', $level['category']) == 'secondary' ? 'selected' : '' ?>>Secondary</option>
            <option value="tertiary" <?= old('category', $level['category']) == 'tertiary' ? 'selected' : '' ?>>Tertiary</option>
        </select>

        <label for="sort_order">Sort Order</label>
        <input
            type="number"
            name="sort_order"
            id="sort_order"
            value="<?= old('sort_order', $level['sort_order']) ?>"
            class="input-field">

        <label for="qualifications">Qualifications (one per line)</label>
        <textarea
            name="qualifications"
            id="qualifications"
            rows="6"
            placeholder="Enter one qualification per line"
            class="input-field"><?= old('qualifications', isset($qualificationsText) ? esc($qualificationsText) : '') ?></textarea>

        <label>
            <input
                type="checkbox"
                name="is_active"
                id="is_active"
                <?= old('is_active', $level['is_active']) ? 'checked' : '' ?>>
            Active
        </label>

        <button
            type="submit"
            class="admin-btn"
            style="width:100%; margin-top:15px;">
            Update Education Level
        </button>
    </form>
</div>

<style>
    .admin-dashboard-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .input-field,
    textarea.input-field {
        width: 100%;
        padding: 10px;
        margin: 5px 0 15px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
        resize: vertical;
    }

    button.admin-btn {
        display: inline-block;
        background: #16a34a;
        color: #fff;
        padding: 10px 14px;
        border-radius: 5px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    button.admin-btn:hover {
        background: #15803d;
    }

    .flash-message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        width: 100%;
        max-width: 600px;
        text-align: center;
    }

    .flash-error {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .flash-success {
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }
</style>

<?= $this->endSection() ?>
