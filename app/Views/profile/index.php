<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Personal Details</h2>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form method="post" action="/profile/store">
    <?= csrf_field() ?>

    <div class="profile-grid">

        <!-- ROW 1: EMAIL (FULL WIDTH) -->
        <div class="grid-full">
            <label>Email Address<span class="text-danger" style="color:red">*</span></label>
            <input type="email"
                class="form-control"
                value="<?= esc($email) ?>"
                readonly>
        </div>

        <!-- ROW 2 -->
        <div>
            <label>First Name<span class="text-danger" style="color:red">*</span></label>
            <input type="text" name="first_name" class="form-control"
                placeholder="Enter your first name"
                value="<?= old('first_name', $profile['first_name'] ?? '') ?>" required>
        </div>

        <div>
            <label>Middle Name</label>
            <input type="text" name="middle_name" class="form-control"
                placeholder="Enter your middle name"
                value="<?= old('middle_name', $profile['middle_name'] ?? '') ?>">
        </div>

        <div>
            <label>Last Name<span class="text-danger" style="color:red">*</span></label>
            <input type="text" name="last_name" class="form-control"
                placeholder="Enter your last name"
                value="<?= old('last_name', $profile['last_name'] ?? '') ?>" required>
        </div>

        <div>
            <label>Date of Birth<span class="text-danger" style="color:red">*</span></label>
            <input type="date" name="date_of_birth" class="form-control"
                value="<?= old('date_of_birth', $profile['date_of_birth'] ?? '') ?>" required>
        </div>

        <div>
            <label>Gender<span class="text-danger" style="color:red">*</span></label>
            <select name="gender" class="form-control" required>
                <option value="">Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div>
            <label>Phone Number<span class="text-danger" style="color:red">*</span></label>
            <input type="text" name="phone" class="form-control"
                placeholder="Enter your phone number"
                value="<?= old('phone', $profile['phone'] ?? '') ?>" required>
        </div>

        <!-- ROW 3 -->

        <div>
            <label>Select Country<span class="text-danger" style="color:red">*</span></label>
            <input type="text" class="form-control" value="Kenya" readonly>
        </div>

        <div>
            <label>Document Type<span class="text-danger" style="color:red">*</span></label>
            <select name="document_type" id="document_type" class="form-control" required>
                <option value="">Select document type</option>
                <option value="id">National ID</option>
                <option value="passport">Passport</option>
            </select>
        </div>

        <div>
            <label>Document Number<span class="text-danger" style="color:red">*</span></label>
            <input type="text" name="document_number"
                id="document_number"
                class="form-control"
                placeholder="Select document type first" required>
        </div>

        <!-- ROW 4 -->
        <div>
            <label>Home County<span class="text-danger" style="color:red">*</span></label>
            <select name="home_county_id" id="county" class="form-control" required>
                <option value="">Select county</option>
                <?php foreach ($counties as $county): ?>
                    <option value="<?= $county['id'] ?>">
                        <?= esc($county['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <label>Home Constituency<span class="text-danger" style="color:red">*</span></label>
            <select name="home_constituency_id" id="constituency" class="form-control" required>
                <option value="">Select constituency</option>
            </select>
        </div>

        <div>
            <label>Home Ward<span class="text-danger" style="color:red">*</span></label>
            <select name="home_ward_id" id="ward" class="form-control" required>
                <option value="">Select ward</option>
            </select>
        </div>
        <!-- ROW 5 -->

        <!-- ROW 6 -->
        <div>
            <label>Are you PWD?<span class="text-danger" style="color:red">*</span></label>
            <select name="is_pwd" id="is_pwd" required>
                <option value="">Select</option>
                <option value="yes" <?= old('is_pwd') === 'yes' ? 'selected' : '' ?>>Yes</option>
                <option value="no" <?= old('is_pwd') === 'no'  ? 'selected' : '' ?>>No</option>
            </select>
        </div>

        <div>
            <div id="disability-wrapper">
                <label>
                    Type of Disability <span style="color:red">*</span>
                </label>
                <select name="disability_type">
                    <option value="">Select</option>
                    <option value="physical">Physical</option>
                    <option value="visual">Visual</option>
                    <option value="hearing">Hearing</option>
                    <option value="memory">Memory</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>

    </div>

    <div class="mt-4">
        <br><br>
        <button type="submit" class="btn btn-primary px-5">
            Proceed
        </button>
    </div>

</form>

<?= $this->endSection() ?>
