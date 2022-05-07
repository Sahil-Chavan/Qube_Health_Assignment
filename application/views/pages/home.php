
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>

      <!-- Column 2 -->
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <div class="row align-items-center" style="padding-top:10rem;">

      <div class="container-fluid justify-content-center mb-3">
          <h1 class="text-center">Master Login</h1>
            </div>

        <!-- <form onSubmit="phoneAuth();" > -->
          <?php #echo form_open('pages/master_login',array('onSubmit'=>"phoneAuth()"))?>
          <div id="master_log">
          <div class="form-outline mb-4">
            <input type="tel" minlength="10" maxlength="10" id='phoneno' name = 'phoneno' placeholder='9876543210' class="form-control form-control-lg m-2 p-2" required/>
            <label class="form-label" for="form1Example13">Phone Number</label>
            <div id="recaptcha-container"></div>
          </div>
       
          <div class="d-flex justify-content-around align-items-center mb-4">
          
          <!-- <button type="submit" value='submit' name='submit' class="btn btn-primary btn-lg btn-block">Send OTP</button> -->
          <button type="button" value='submit' name='submit' onclick="phoneAuth()" class="btn btn-primary btn-lg btn-block">Send OTP</button>
            </div>
          </div>
            <!-- </form> -->
            <div id="master_otp" style="display:none;">
            <?php #echo form_open('pages/master_home',array('onSubmit'=>"codeverify()"))?>
            <div class="form-outline mb-3">
            <input type="number" id="verificationCode" name="verificationCode" placeholder = "Please enter the OTP" class="form-control form-control-lg m-2 p-2" />
            <label class="form-label" for="form1Example13">The OTP has been sent to registered contact number.</label>
          </div>
          
          <div class="d-flex justify-content-around align-items-center mb-4">
          <button type="button" name="submit" class="btn btn-primary btn-lg btn-block" onclick="codeverify()">Confirm OTP</button>
          <!-- <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" >Confirm OTP</button> -->
            </div>
            </div>
          <!-- <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>
          <div class="container-fluid justify-content-center">
          <h1 class="text-center">User Login</h1>
            </div>
        <form>
          
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Phone Number</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Send OTP</button>
            </div> -->
          

        
        </div>
      </div>
    </div>
  </div>
<script>
  window.onload = function() {
    recaptchaRender();
}
</script>
<!-- </div> -->


<!-- <footer class="text-center text-white fixed-bottom" style="background-color: #e3f2fd;">
  
  <div class="container pt-1">
    
    <section>

      
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://www.linkedin.com/in/sahil-chavan/"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="bi bi-linkedin"></i></a>
      
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://www.github.com/Sahil-Chavan"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="bi-github" role="img" aria-label="GitHub"></i></a>
        <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://github.com/Sahil-Chavan/Qube_Health_Assignment"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="bi bi-link-45deg"></i></a>
    </section>
    
  </div>

  <div class="text-center text-dark p-2" >
    Made By - Sahil S Chavan
  </div>
</footer>



</body>
</html> -->