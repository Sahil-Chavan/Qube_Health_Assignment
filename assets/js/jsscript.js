function recaptchaRender() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    const recaptchaVerifier = window.recaptchaVerifier;
    recaptchaVerifier.render().then((widgetId) => {
        window.recaptchaWidgetId = widgetId;
      });
    
}

function preauth(){
    var phoneno = document.getElementById('phoneno').value;
    $.ajax({
        url:"http://localhost/Qube_Health_Assignment/pages/check_user",
        type: 'post',
        // dataType: "json",
        data: { 'phoneno': phoneno },
        success: function (res) {
          if(res.status == "success"){
            phoneAuth();
          }else{
            alert("You are not registered user. Please register first through master login");
            // window.location.href = "http://localhost/Qube_Health_Assignment/userlogin";
          }
        },
        error: function (xhr, status, error) {
            alert('Error Please Try Again');
            window.location.href = "http://localhost/Qube_Health_Assignment/pages/user_login";
            
        }
    }); 
}

function phoneAuth(){
    
    var phoneno = document.getElementById('phoneno').value;
    if (phoneno==''){
        alert("Please enter phone number");
        return false;}
    phoneno = '+91'+phoneno;

    const appVerifier = window.recaptchaVerifier;

    firebase.auth().signInWithPhoneNumber(phoneno, appVerifier)
    .then((confirmationResult) => {
      window.confirmationResult = confirmationResult;
      coderesult = confirmationResult;
      alert('OTP has been sent by SMS to your phone number ' + phoneno);
    
      document.getElementById('master_log').style.display = 'none';
      document.getElementById('master_otp').style.display = 'block';
    }).catch((error) => {
      alert(error.message);
      console.log('error'); 
    });
}

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