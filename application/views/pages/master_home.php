<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <title>Qube Health Assignment</title>
    <style>
        li.nav-item {
            padding: 3rem;
        }

        input.form-control-lg {
            margin: 2rem;
            padding: 1rem;
        }
    </style>
</head>

<body class="min-vh-100">



    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; height:20vh;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 fs-1" style="padding-left:7rem; font-weight: 500; "><?= $phoneno ?></span>
            <br>
            <span class="navbar-brand mb-0 fs-1" style="padding-left:7rem; display:block;">Welcome to Master Dashboard</span>

            <div class="collapse navbar-collapse flex-grow-0" id="navbarNav" style="padding:6rem;">
                <ul class="navbar-nav text-right">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>pages/master_logout">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- ---------------------------------------------------------------------------- -->
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-6 col-lg-5 col-xl-4">
            <img class="img-fluid" style="max-width:100%;" src="<?php echo base_url();?>assets/images/adminhome.svg"  />    
        </div>


            <div class="col-md-6 col-lg-7 col-xl-7 offset-xl-1">
                <div class="row align-items-center" style="padding-top:1rem;">

                    <div class="container-fluid justify-content-center mb-3">
                        <h1 class="text-center">Register New User</h1>
                    </div>

                    <?php echo form_open('pages/master_newuser', array('onSubmit' => "codeverify()")) ?>
                    <div class="form-group row">
                        <label for="form-control-lg" class="fs-3">User's Name</label>
                        <input type="text" pattern="^[a-zA-Z0-9]+$" class="form-control-lg" id="uname" name="uname" placeholder="Please enter your name here. Special characters are not allowed.">
                    </div>
                    <div class="form-group row">
                        <label for="form-control-lg" class="fs-3">User's Contact Number</label>
                        <input type="tel" minlength="10" maxlength="10" class="form-control-lg" id="ucontact" name="ucontact" placeholder="Enter the 10 digit contact number for registration.">
                    </div>


                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-4"><span class="fs-4">Insert Data</span></button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- ---------------------------------------------------------------------------- -->





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