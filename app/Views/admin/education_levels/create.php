<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Add Education Level</h2>

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
        action="<?= site_url('admin/education-levels/store') ?>"
        method="post"
        style="max-width:600px; width:100%; text-align:left; margin-top:20px;">

        <!-- Education Category -->
        <label for="category">
            Education Category <span style="color:red">*</span>
        </label>
        <select
            name="category"
            id="category"
            required
            class="input-field">
            <option value="">-- Select Category --</option>
            <option value="primary" <?= old('category') === 'primary' ? 'selected' : '' ?>>Primary</option>
            <option value="secondary" <?= old('category') === 'secondary' ? 'selected' : '' ?>>Secondary</option>
            <option value="tertiary" <?= old('category') === 'tertiary' ? 'selected' : '' ?>>Tertiary</option>
        </select>

        <!-- Exam / Level Name -->
        <label for="name">
            Exam / Education Level Name <span style="color:red">*</span>
        </label>
        <input
            type="text"
            name="name"
            id="name"
            value="<?= old('name') ?>"
            placeholder="e.g. KCPE, KCSE, Diploma, Degree"
            required
            class="input-field">

        <!-- Table Order -->
        <label for="table_order">
            Order (Display Position)
        </label>
        <input
            type="number"
            name="table_order"
            id="table_order"
            value="<?= old('table_order') ?>"
            placeholder="e.g. 1"
            class="input-field">

        <button
            type="submit"
            class="admin-btn"
            style="width:100%; margin-top:15px;">
            Save Education Level
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

    .input-field {
        width: 100%;
        padding: 10px;
        margin: 5px 0 15px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
    }

    .flash-message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        width: 100%;
        max-width: 600px;
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
