
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

// function codeverify() {
//     var code = document.getElementById('verificationCode').value;

//     coderesult = window.confirmationResult
//     coderesult.confirm(code).then(function(result) {
//         alert("Successfully registered");
//         var user = result.user;
//         console.log(result);
//         console.log(user);
//         window.location.href = "<?php echo base_url('pages/master_home'); ?>";
//     }).catch(function(error) {
//         alert(error.message);
//         window.location.href = "<?php echo base_url(); ?>";
//     });
// }

function ajax_master(){
    var phoneno = document.getElementById('phoneno').value;
    $.ajax({
        url:"http://localhost/Qube_Health_Assignment/pages/master_session",
        type: 'post',
        // dataType: "json",
        data: { 'phoneno': phoneno },
        success: function (res) {
          if(res.status == "success"){
            window.location.href = res.redirect_url;
          }
        },
        error: function (xhr, status, error) {
            alert('Error Please Try Again');
            window.location.href = "http://localhost/Qube_Health_Assignment";
            
        }
    }); 
}

  function codeverify() {
    var code = document.getElementById('verificationCode').value;

    coderesult = window.confirmationResult
    coderesult.confirm(code).then(function(result) {
        alert("Successfully registered");
        ajax_master()
    }).catch(function(error) {
        alert(error.message);
        window.location.href = "http://localhost/Qube_Health_Assignment";
    });
}


function ajax_user(){
    var phoneno = document.getElementById('phoneno').value;
    $.ajax({
        url:"http://localhost/Qube_Health_Assignment/pages/user_session",
        type: 'post',
        // dataType: "json",
        data: { 'phoneno': phoneno },
        success: function (res) {
          if(res.status == "success"){
            window.location.href = res.redirect_url;
          }
        },
        error: function (xhr, status, error) {
            alert('Error Please Try Again');
            window.location.href = "http://localhost/Qube_Health_Assignment";
            
        }
    }); 
}

  function codeverify_user() {
    var code = document.getElementById('verificationCode').value;

    coderesult = window.confirmationResult
    coderesult.confirm(code).then(function(result) {
        alert("Successfully registered");
        ajax_user()
    }).catch(function(error) {
        alert(error.message);
        window.location.href = "http://localhost/Qube_Health_Assignment";
    });
}