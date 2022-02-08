<?php
// Start the session
session_start();
/*
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if($pageWasRefreshed ) {
  session_unset();
  session_destroy();
}
*/

require 'auth/auth_code.php';
$displaylogin="block";
$displaycrudform="none";

if(isset($_POST["auth_code"])){
	$auth_code = md5($_POST["auth_code"]);
	
}
if($auth_code == $local_auth_code){
		
		$_SESSION["authenticated"]="1"; 
}
if ($_SESSION["authenticated"]=="0" || !isset($_SESSION["authenticated"])){
	
	$displaylogin="block";
	$displaycrudform="none";
	
}
else {
	$displaylogin="none";
	$displaycrudform="block";
}



?>
<html>
<head>
	 <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

html, body {
    height: 100%;
    background-color: #152733;
    overflow: hidden;
}


.form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
 /*   padding: 60px; */
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
 /*   min-width: 540px; */
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}


.form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
    color: #fff;
}

.form-content input[type=text], .form-content input[type=password], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}




.form-content textarea {
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	(function () {
'use strict'
const forms = document.querySelectorAll('.requires-validation')
Array.from(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

	
</script>
	</head>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="col-md-12" style="display:<?php echo $displaylogin; ?>">
                            <form method="post" action="#">
								<div class="d-grid gap-2">
								<input type="password" name="auth_code" class="form-control" placeholder="Κωδικός διαχειριστή">
								<button class="btn btn-secondary" type="submit">Σύνδεση</button>
								</div>
                            </form>
                        </div>
						<div style="display:<?php echo $displaycrudform; ?>">
                        <h3>Διαχείριση βάσης δεδομένων</h3>
						<br>
                        <div class="d-grid gap-2 ">
							<button class="btn btn-secondary" type="button"><a href="add.php" class="link-light">Εισαγωγή νέου</a></button>
							<button class="btn btn-secondary" type="button"><a href="update.php" class="link-light">Μεταβολή</a></button>
							<button class="btn btn-secondary" type="button"><a href="delete.php" class="link-light">Διαγραφή</a></button>
                        </div>
					</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
