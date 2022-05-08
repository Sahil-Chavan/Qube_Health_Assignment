<div class="container py-5 h-100">
  <div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-8 col-lg-7 col-xl-6">
      <img class="img-fluid" style="max-width:75%;" src="<?php echo base_url();?>assets/images/userimg.svg"  />
    </div>

    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <div class="row align-items-center" style="padding-top:10rem;">

        <div class="container-fluid justify-content-center mb-3">
          <h1 class="text-center">User Login</h1>
        </div>


        <div id="master_log">
          <div class="form-outline mb-4">
            <input type="tel" minlength="10" maxlength="10" id='phoneno' name='phoneno' placeholder='9876543210' class="form-control form-control-lg m-2 p-2" required />
            <label class="form-label" for="form1Example13">Phone Number</label>
            <div id="recaptcha-container"></div>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">

            <button type="button" value='submit' name='submit' onclick="preauth()" class="btn btn-primary btn-lg btn-block">Send OTP</button>
          </div>
        </div>
        <div id="master_otp" style="display:none;">
          <div class="form-outline mb-3">
            <input type="number" id="verificationCode" name="verificationCode" placeholder="Please enter the OTP" class="form-control form-control-lg m-2 p-2" />
            <label class="form-label" for="form1Example13">The OTP has been sent to registered contact number.</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <button type="button" name="submit" class="btn btn-primary btn-lg btn-block" onclick="codeverify_user()">Confirm OTP</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  window.onload = function() {
    recaptchaRender();
  }
</script>