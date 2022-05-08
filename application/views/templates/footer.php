<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.8.0/firebase-auth.js"></script>
<script type="module">
  import {
    initializeApp
  } from "https://www.gstatic.com/firebasejs/9.8.0/firebase-app.js";
  import {
    getAnalytics
  } from "https://www.gstatic.com/firebasejs/9.8.0/firebase-analytics.js";

  const firebaseConfig = {
    apiKey: "AIzaSyC4ZWnL7fgxMe4PiX-ihjTXSB0QmVlqA-w",
    authDomain: "qubeassignment-77e6a.firebaseapp.com",
    projectId: "qubeassignment-77e6a",
    storageBucket: "qubeassignment-77e6a.appspot.com",
    messagingSenderId: "879700951575",
    appId: "1:879700951575:web:f09660dc1988f38f1c5252",
    measurementId: "G-3X55EZC1EV"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>

<script src="<?= base_url("assets/js/jsscript.js"); ?>"></script>


<footer class="text-center text-white fixed-bottom" style="background-color: #e3f2fd;">

  <div class="container pt-1">

    <section>


      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.linkedin.com/in/sahil-chavan/" role="button" data-mdb-ripple-color="dark"><i class="bi bi-linkedin"></i></a>

      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.github.com/Sahil-Chavan" role="button" data-mdb-ripple-color="dark"><i class="bi-github" role="img" aria-label="GitHub"></i></a>
      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/Sahil-Chavan/Qube_Health_Assignment" role="button" data-mdb-ripple-color="dark"><i class="bi bi-link-45deg"></i></a>
    </section>

  </div>


  <div class="text-center text-dark p-2">
    Made By - Sahil S Chavan
  </div>

</footer>



</body>

</html>