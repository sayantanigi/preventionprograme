<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<div class="PasswordContainer">
    <img src="<?= base_url('uploads/logos/'.@$settings->logo) ?>" alt="Logo">
    <h2>Forgot Password</h2>
    <div class="input-field" id="emailField">
        <label for="role">Email</label>
        <input type="email" placeholder="Enter recovery email">
        <span class="icon fa fa-envelope"></span>
    </div>
    <div class="OTPBlock" id="otpBlock">
        <div class="input-field">
            <label for="role">Enter OTP sent to your email</label>
            <div class="OTPContainer">
                <input type="text" class="OTPinput" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    oninput="moveToNext(this, 'otp2')" id="otp1">
                <input type="text" class="OTPinput" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    oninput="moveToNext(this, 'otp3')" id="otp2">
                <input type="text" class="OTPinput" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    oninput="moveToNext(this, 'otp4')" id="otp3">
                <input type="text" class="OTPinput" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    oninput="moveToNext(this, 'otp5')" id="otp4">
            </div>
        </div>
        <a class="Link">Resend Code</a>
    </div>
    <button class="OTPSendBtn" onclick="showOTPBlock()">Send</button>
    <div class="Bottomlink">Back to <a href="<?= base_url('login'); ?>">Sign In</a></div>
</div>