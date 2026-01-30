<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="admin-dashboard-container">
    <h2>Edit Position</h2>

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
        action="<?= site_url('/admin/positions/update/' . $position['id']) ?>"
        method="post"
        style="max-width:600px; width:100%; text-align:left; margin-top:20px;">

        <!-- Number on Table -->
        <label for="table_order">Number on Table</label>
        <input
            type="number"
            name="table_order"
            id="table_order"
            value="<?= old('table_order', $position['table_order']) ?>"
            required
            class="input-field">

        <!-- Vacant Positions -->
        <label for="vacant_positions">Number of Vacant Positions</label>
        <input
            type="number"
            name="vacant_positions"
            id="vacant_positions"
            min="1"
            value="<?= old('vacant_positions', $position['vacant_positions']) ?>"
            required
            class="input-field">

        <!-- Position Title -->
        <label for="title">Position</label>
        <input
            type="text"
            name="title"
            id="title"
            value="<?= old('title', $position['title']) ?>"
            required
            class="input-field">

        <!-- Salary -->
        <label for="salary">Salary (each line will be a bullet)</label>
        <textarea
            name="salary"
            id="salary"
            rows="4"
            required
            class="textarea-field"><?= old('salary', $position['salary']) ?></textarea>

        <!-- Duties -->
        <label for="duties">Duties and Responsibilities (each line will be a bullet)</label>
        <textarea
            name="duties"
            id="duties"
            rows="4"
            required
            class="textarea-field"><?= old('duties', $position['duties']) ?></textarea>

        <!-- Requirements -->
        <label for="requirements">Requirements (each line will be a bullet)</label>
        <textarea
            name="requirements"
            id="requirements"
            rows="4"
            required
            class="textarea-field"><?= old('requirements', $position['requirements']) ?></textarea>

        <button
            type="submit"
            class="admin-btn"
            style="width:100%; margin-top:15px;">
            Update Position
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
    .textarea-field {
        width: 100%;
        padding: 10px;
        margin: 5px 0 15px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
    }

    textarea.textarea-field {
        resize: vertical;
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
