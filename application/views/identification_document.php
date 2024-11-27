<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<div class="DocumentContainer active" id="formContainer">
    <img src="<?= base_url('uploads/logos/'.@$settings->logo) ?>" alt="Logo">
    <h2>Identification Document</h2>
    <form onsubmit="showSubmissionComplete(event)">
        <div class="input-field">
            <label for="role">Document Type</label>
            <select id="role">
                <option value="">Select document type</option>
                <option value="">Document 2</option>
                <option value="">Document 3</option>
                <option value="">Document 4</option>
            </select>
        </div>

        <div class="input-field">
            <label for="role">Document Number</label>
            <input type="text" placeholder="Enter document number">
        </div>

        <div class="input-field">
            <label for="UploadFile">Upload Photo</label>
            <label for="UploadFile" class="CustomFileUpload">Choose File</label>
            <input type="file" class="UploadData" id="UploadFile" name="UploadFile" accept="image/*"
                onchange="updateFileName('UploadFile', 'photo-chosen1')">
            <span id="photo-chosen1" class="FileChosen">No file chosen</span>
        </div>

        <div class="input-field">
            <label for="role">Date of Birth</label>
            <input type="date" id="dob" name="dob">
        </div>

        <div class="input-field">
            <label for="role">Upload your Photo</label>
            <label for="UploadPhoto" class="CustomFileUpload">Choose File</label>
            <input type="file" class="UploadData" id="UploadPhoto" name="UploadPhoto" accept="image/*"
                onchange="updateFileName('UploadPhoto', 'photo-chosen2')">
            <span id="photo-chosen2" class="FileChosen">No file chosen</span>
        </div>

        <button type="submit" class="SubmitBtn">Submit</button>

        <a class="Link" href="SignUp.html">Back</a>
    </form>
</div>

<script>
    function updateFileName(inputId, displayId) {
        const fileInput = document.getElementById(inputId);
        const fileChosen = document.getElementById(displayId);
        fileChosen.textContent = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
    }

    function showSubmissionComplete(event) {
        event.preventDefault();
        document.getElementById("formContainer").classList.remove("active");
        document.getElementById("submissionComplete").classList.add("active");
    }
</script>