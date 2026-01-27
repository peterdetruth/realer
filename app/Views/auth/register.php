<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Account Sign Up</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="flash-message flash-error">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= site_url('auth/register') ?>">
    <label>Email Address*:</label><br>
    <input type="email" name="email" placeholder="Enter your email address" value="<?= old('email') ?>" required><br><br>

    <label>Password*:</label><br>
    <input type="password" name="password" placeholder="Enter your password" required><br><br>

    <label>Confirm Password*:</label><br>
    <input type="password" name="password_confirm" placeholder="Confirm your password" required><br><br>

    <button type="submit" style="background-color: green; color: white; padding: 5px 10px; cursor: pointer;">Create Account</button>
</form>

<p>Already have an account? <a href="<?= site_url('auth/login') ?>">Login here</a></p>

<?= $this->endSection() ?>
