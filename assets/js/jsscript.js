
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

