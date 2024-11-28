<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<style>
    body,html{display:flex;align-items:center;justify-content:center;background:#eee;font-family:Arial,sans-serif}
</style>
<!-- Submission Complete Container -->
<div class="DocumentContainer DataComplete" id="submissionComplete">
    <img src="<?= base_url('assets/users_assets/images/CompleteIcon.png'); ?>" alt="Logo">
    <h2>Registration Complete</h2>
    <?php if ($this->session->flashdata('success')) { ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
    <?php $this->session->unset_userdata('success'); } ?>
    <button type="button" class="SubmitBtn"><a href="<?= base_url('login')?>">Go to Login</a></button>
</div>