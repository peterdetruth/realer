<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div style="max-width: 900px; margin: 0 auto;">

    <h2 class="mb-4" style="text-align:center;">Submit Your Application</h2>

    <form action="<?= site_url('application/store') ?>" method="post">

        <div style="display: flex; gap: 20px; flex-wrap: wrap;">

            <!-- Left Column -->
            <div style="flex: 1; min-width: 250px;">
                <!-- Job Title -->
                <label>Job Title *</label>
                <select name="position_id" required class="input-field">
                    <option value="">Select Position</option>
                    <?php foreach ($positions as $pos): ?>
                        <option value="<?= $pos['id'] ?>"><?= esc($pos['title']) ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Applied Constituency -->
                <label>Applied Constituency</label>
                <select name="constituency_id" id="constituency" class="input-field">
                    <option value="">Select Constituency</option>
                </select>

                <!-- Primary Education Level -->
                <label>Primary Education Level *</label>
                <select name="primary_education_level_id" id="primary_education_level" required class="input-field">
                    <option value="">Select Primary Exam</option>
                    <?php foreach ($education_levels as $lvl): ?>
                        <?php if ($lvl['category'] === 'primary'): ?>
                            <option value="<?= $lvl['id'] ?>"><?= esc($lvl['name']) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <!-- Secondary Education Level -->
                <label>Secondary Education Level *</label>
                <select name="secondary_education_level_id" id="secondary_education_level" required class="input-field">
                    <option value="">Select Secondary Exam</option>
                    <?php foreach ($education_levels as $lvl): ?>
                        <?php if ($lvl['category'] === 'secondary'): ?>
                            <option value="<?= $lvl['id'] ?>"><?= esc($lvl['name']) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <!-- Tertiary Education Level -->
                <label>Tertiary Education Level</label>
                <select name="tertiary_education_level_id" id="tertiary_education_level" class="input-field">
                    <option value="">Select Tertiary Exam</option>
                    <?php foreach ($education_levels as $lvl): ?>
                        <?php if ($lvl['category'] === 'tertiary'): ?>
                            <option value="<?= $lvl['id'] ?>"><?= esc($lvl['name']) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

            </div>

            <!-- Right Column -->
            <div style="flex: 1; min-width: 250px;">
                <!-- Applied County -->
                <label>Applied County *</label>
                <select name="county_id" id="county" required class="input-field">
                    <option value="">Select County</option>
                    <?php foreach ($counties as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Applied Ward -->
                <label>Applied Ward</label>
                <select name="ward_id" id="ward" class="input-field">
                    <option value="">Select Ward</option>
                </select>

                <!-- Primary Qualification -->
                <label>Primary Qualification *</label>
                <select name="primary_qualification_id" id="primary_qualification" required class="input-field">
                    <option value="">Select Qualification</option>
                </select>

                <!-- Secondary Qualification -->
                <label>Secondary Qualification *</label>
                <select name="secondary_qualification_id" id="secondary_qualification" required class="input-field">
                    <option value="">Select Qualification</option>
                </select>

                <!-- Tertiary Qualification -->
                <label>Tertiary Qualification</label>
                <select name="tertiary_qualification_id" id="tertiary_qualification" class="input-field">
                    <option value="">Select Qualification</option>
                </select>

                <!-- Work Experience -->
                <label>Work Experience *</label>
                <select name="work_experience_id" required class="input-field">
                    <option value="">Select Experience</option>
                    <?php foreach ($work_experiences as $we): ?>
                        <option value="<?= $we['id'] ?>"><?= esc($we['name']) ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Work Experience Period -->
                <label>Period of Work Experience *</label>
                <input type="text" name="work_experience_period" required class="input-field" placeholder="e.g., 2 years">
            </div>

        </div>

        <button type="submit" class="admin-btn" style="width:100%; margin-top:20px;">Submit Application</button>
    </form>
</div>

<!-- Dynamic dropdowns -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // County → Constituency → Ward
        const countyEl = document.getElementById('county');
        const constituencyEl = document.getElementById('constituency');
        const wardEl = document.getElementById('ward');

        countyEl.addEventListener('change', function() {
            fetch(`/index.php/ajax/constituencies/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    constituencyEl.innerHTML = '<option value="">Select Constituency</option>';
                    data.forEach(c => {
                        constituencyEl.innerHTML += `<option value="${c.id}">${c.name}</option>`;
                    });
                    wardEl.innerHTML = '<option value="">Select Ward</option>';
                });
        });

        constituencyEl.addEventListener('change', function() {
            fetch(`/index.php/ajax/wards/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    wardEl.innerHTML = '<option value="">Select Ward</option>';
                    data.forEach(w => {
                        wardEl.innerHTML += `<option value="${w.id}">${w.name}</option>`;
                    });
                });
        });

        // Education Level → Qualifications
        function setupQualifications(levelElId, qualElId) {
            const levelEl = document.getElementById(levelElId);
            const qualEl = document.getElementById(qualElId);

            levelEl.addEventListener('change', function() {
                fetch(`/index.php/ajax/qualifications/${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        qualEl.innerHTML = '<option value="">Select Qualification</option>';
                        data.forEach(q => {
                            qualEl.innerHTML += `<option value="${q.id}">${q.name}</option>`;
                        });
                    });
            });
        }

        setupQualifications('primary_education_level', 'primary_qualification');
        setupQualifications('secondary_education_level', 'secondary_qualification');
        setupQualifications('tertiary_education_level', 'tertiary_qualification');

    });
</script>

<?= $this->endSection() ?>
