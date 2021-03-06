<?php
// Start the session
session_start();

if(isset($_SESSION["user"])){
	header("Location: main.php");
}

?>
<html>
<head>
	 <title>Code test - login</title>
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
<script type="text/javascript" src="data/users.json"></script>

	</head>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="col-md-12">
                           
								<div  id="loginform">
								<input type="text" id="username" class="form-control mb-2" placeholder="Username">
								<input type="password" id="password" class="form-control" placeholder="Password">
								</div>
								
								<div  id="registerform">
								<input type="text" id="newusername" class="form-control mb-2" placeholder="Username">
								<input type="text" id="newpassword" class="form-control" placeholder="Password">
								
								</div>
								
                           
                        </div>
						<div class="col-md-12 mt-4">
						<div class="d-grid gap-2">
						<button class="btn btn-secondary" type="button" onclick="login(0)" id="loginbutton">??????????????</button>
						<button class="btn btn-secondary" type="button" onclick="login(1)">??????????????</button>
						</div>
				</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function login(index){

if (index == 0){
	
	var user = $("#username").val();
	var password = $("#password").val();
	if(user!="" && password!=""){
	$.ajax({
				type: "POST",
				url: "loguser.php",
				data: {user : user,
					   password : password
					   }, 
				cache: false,
		
				success: function(data, status){
					if(status === "success" ){
						console.log(status);
						window.open("main.php");
					}
				},
		error: function(xhr, status, error){
		console.error(xhr);
		}
		});
}
}
else {
	$("#loginform").hide();
	$("#registerform").show();
	$("#loginbutton").hide();
	
	var newuser = $("#newusername").val();
	var newpassword = $("#newpassword").val();
if(newuser!="" && newpassword!=""){	
	$.ajax({
				type: "POST",
				url: "registeruser.php",
				data: {newuser : newuser,
					   newpassword : newpassword
					   }, 
				cache: false,
		
				success: function(data, status){
					console.log(">>>> "+status);
					if(status === "success" ){
						console.log("ok");
					$("#loginform").show();
					$("#registerform").hide();
					$("#loginbutton").show();
					}
				},
		error: function(xhr, status, error){
		console.error(xhr);
		}
		});
}
	}
}

$(document).ready(function() {
	
    $("#registerform").hide();
	
	$('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
	
});
</script>
