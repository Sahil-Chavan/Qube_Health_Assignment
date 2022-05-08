
// window.onload = function() {
//     recaptchaRender();
// }

function recaptchaRender() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    const recaptchaVerifier = window.recaptchaVerifier;
    recaptchaVerifier.render().then((widgetId) => {
        window.recaptchaWidgetId = widgetId;
      });
    
}
// function render(){

//     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
//     recaptchaVerifier.render();
// }

function phoneAuth(){
    
    var phoneno = document.getElementById('phoneno').value;
    phoneno = '+91'+phoneno;
    console.log(typeof phoneno);
    console.log(phoneno);
    const appVerifier = window.recaptchaVerifier;
    console.log(appVerifier);
    firebase.auth().signInWithPhoneNumber(phoneno, appVerifier)
    .then((confirmationResult) => {
      // SMS sent. Prompt user to type the code from the message, then sign the
      // user in with confirmationResult.confirm(code).
      window.confirmationResult = confirmationResult;
      coderesult = confirmationResult;
      alert('OTP has been sent by SMS to your phone number ' + phoneno);
      console.log(coderesult);
      document.getElementById('master_log').style.display = 'none';
      document.getElementById('master_otp').style.display = 'block';
    }).catch((error) => {
      alert(error.message);
      console.log('error');
    });
}

function codeverify() {
    var code = document.getElementById('verificationCode').value;

    coderesult = window.confirmationResult
    coderesult.confirm(code).then(function(result) {
        alert("Successfully registered");
        var user = result.user;
        console.log(result);
        console.log(user);
        window.location.href = "<?php echo base_url('pages/master_home'); ?>";
    }).catch(function(error) {
        alert(error.message);
        window.location.href = "<?php echo base_url(); ?>";
    });
}

function ajax_master(){
    var phoneno = document.getElementById('phoneno').value;
    $.ajax({
        type: 'GET',
        url: Url.Action("ActionMethod", "MyController"),
        data: {
            param1: DD1Value,
            param2: DD2Value,
            param3: xyz
        },
        success: function (data) {
            window.location.href = data.redirecturl;
        },
        error: function () {
            alert('error happened');
        }
    }); 
}