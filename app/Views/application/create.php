<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="application-container">

    <h2>Submit Your Application</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-message flash-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-message flash-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('application/store') ?>" method="post">

        <!-- Row 1: Job Title + Applied County -->
        <div class="form-row">
            <div class="form-col">
                <label>Job Title <span class="required">*</span></label>
                <select name="position_id" required class="input-field">
                    <option value="">Select Position</option>
                    <?php foreach ($positions as $pos): ?>
                        <option value="<?= $pos['id'] ?>"><?= esc($pos['title']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-col">
                <label>Applied County <span class="required">*</span></label>
                <select name="county_id" id="county" required class="input-field">
                    <option value="">Select County</option>
                    <?php foreach ($counties as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Row 2: Applied Constituency + Applied Ward -->
        <div class="form-row">
            <div class="form-col">
                <label>Applied Constituency</label>
                <select name="constituency_id" id="constituency" class="input-field">
                    <option value="">Select Constituency</option>
                </select>
            </div>
            <div class="form-col">
                <label>Applied Ward</label>
                <select name="ward_id" id="ward" class="input-field">
                    <option value="">Select Ward</option>
                </select>
            </div>
        </div>

        <!-- Row 3: Primary Education Level + Qualification -->
        <div class="form-row">
            <div class="form-col">
                <label>Primary Education Level <span class="required">*</span></label>
                <select name="primary_education_level_id" id="primary_education_level" required class="input-field">
                    <option value="">Select Primary Exam</option>
                    <?php foreach ($education_levels as $lvl): ?>
                        <?php if ($lvl['category'] === 'primary'): ?>
                            <option value="<?= $lvl['id'] ?>"><?= esc($lvl['name']) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-col">
                <label>Primary Qualification <span class="required">*</span></label>
                <select name="primary_qualification_id" id="primary_qualification" required class="input-field">
                    <option value="">Select Qualification</option>
                </select>
            </div>
        </div>

        <!-- Row 4: Secondary Education Level + Qualification -->
        <div class="form-row">
            <div class="form-col">
                <label>Secondary Education Level <span class="required">*</span></label>
                <select name="secondary_education_level_id" id="secondary_education_level" required class="input-field">
                    <option value="">Select Secondary Exam</option>
                    <?php foreach ($education_levels as $lvl): ?>
                        <?php if ($lvl['category'] === 'secondary'): ?>
                            <option value="<?= $lvl['id'] ?>"><?= esc($lvl['name']) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-col">
                <label>Secondary Qualification <span class="required">*</span></label>
                <select name="secondary_qualification_id" id="secondary_qualification" required class="input-field">
                    <option value="">Select Qualification</option>
                </select>
            </div>
        </div>

        <!-- Row 5: Tertiary Education Level + Qualification -->
        <div class="form-row">
            <div class="form-col">
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
            <div class="form-col">
                <label>Tertiary Qualification</label>
                <select name="tertiary_qualification_id" id="tertiary_qualification" class="input-field">
                    <option value="">Select Qualification</option>
                </select>
            </div>
        </div>

        <!-- Row 6: Work Experience + Period -->
        <div class="form-row">
            <div class="form-col">
                <label>Work Experience <span class="required">*</span></label>
                <select name="work_experience_id" required class="input-field">
                    <option value="">Select Experience</option>
                    <?php foreach ($work_experiences as $we): ?>
                        <option value="<?= $we['id'] ?>"><?= esc($we['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-col">
                <label>Period of Work Experience <span class="required">*</span></label>
                <select name="work_experience_period_id" required class="input-field">
                    <option value="">Select Period</option>
                    <?php foreach ($experience_periods as $ep): ?>
                        <option value="<?= $ep['id'] ?>"><?= esc($ep['label']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <button type="submit" class="admin-btn submit-btn">Submit Application</button>
    </form>
</div>

<style>
    .application-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    .application-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .form-col {
        flex: 1;
        min-width: 250px;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
    }

    button.admin-btn.submit-btn {
        width: 100%;
        background-color: #16a34a;
        color: #fff;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        transition: background 0.2s ease;
    }

    button.admin-btn.submit-btn:hover {
        background-color: #15803d;
    }

    .flash-message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
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

    .required {
        color: red;
    }
</style>

<!-- Dynamic dropdowns remain the same as before -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Application form script loaded');

        const countyEl = document.getElementById('county');
        const constituencyEl = document.getElementById('constituency');
        const wardEl = document.getElementById('ward');

        // County → Constituencies
        countyEl.addEventListener('change', function() {

            const countyId = this.value;

            constituencyEl.innerHTML = '<option value="">Loading...</option>';
            wardEl.innerHTML = '<option value="">Select Ward</option>';

            if (!countyId) {
                constituencyEl.innerHTML = '<option value="">Select Constituency</option>';
                return;
            }

            fetch(`/application/constituencies/${countyId}`)
                .then(res => res.json())
                .then(data => {

                    constituencyEl.innerHTML = '<option value="">Select Constituency</option>';

                    data.forEach(c => {
                        constituencyEl.innerHTML += `<option value="${c.id}">${c.name}</option>`;
                    });
                });
        });

        // Constituency → Wards
        constituencyEl.addEventListener('change', function() {

            const constituencyId = this.value;

            wardEl.innerHTML = '<option value="">Loading...</option>';

            if (!constituencyId) {
                wardEl.innerHTML = '<option value="">Select Ward</option>';
                return;
            }

            fetch(`/application/wards/${constituencyId}`)
                .then(res => res.json())
                .then(data => {

                    wardEl.innerHTML = '<option value="">Select Ward</option>';

                    data.forEach(w => {
                        wardEl.innerHTML += `<option value="${w.id}">${w.name}</option>`;
                    });
                });
        });

        // Load qualifications for education levels
        function loadQualifications(levelSelectId, qualificationSelectId) {
            const levelSelect = document.getElementById(levelSelectId);
            const qualificationSelect = document.getElementById(qualificationSelectId);

            levelSelect.addEventListener('change', function() {
                const levelId = this.value;

                qualificationSelect.innerHTML = '<option value="">Loading...</option>';

                if (!levelId) {
                    qualificationSelect.innerHTML = '<option value="">Select Qualification</option>';
                    return;
                }

                fetch(`/application/qualifications/${levelId}`)
                    .then(response => response.json())
                    .then(data => {
                        qualificationSelect.innerHTML = '<option value="">Select Qualification</option>';

                        data.forEach(q => {
                            const option = document.createElement('option');
                            option.value = q.id;
                            option.textContent = q.name;
                            qualificationSelect.appendChild(option);
                        });
                    })
                    .catch(() => {
                        qualificationSelect.innerHTML = '<option value="">Error loading</option>';
                    });
            });
        }

        // Attach to all 3 education levels
        loadQualifications('primary_education_level', 'primary_qualification');
        loadQualifications('secondary_education_level', 'secondary_qualification');
        loadQualifications('tertiary_education_level', 'tertiary_qualification');

    });
</script>

<?= $this->endSection() ?>
