<?php
session_start();

if(!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] == "0"){
   header("Location: error.php");
  die;
}
if (strpos($_SERVER['HTTP_REFERER'], 'admin.php') === false) {
   header("Location: error.php");
die();
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
                        <h3>Εισαγωγή νέας εγγραφής</h3>
                        <p>Στοιχεία ασφαλιζόμενου</p>
                        <form class="requires-validation" action="create.php" method="post">
							<div class="col-md-12">
								
							<input type="date" id="start" name="start"  max="2050-12-31">
						
							<input type="date" id="end" name="end"  max="2050-12-31">
							</div>
                            <div class="col-md-12">
                               <input class="form-control text-dark" type="text" name="password" placeholder="Κωδικός πελάτη" required>
                              
                            </div>
              <div class="col-md-12">
                               <input class="form-control text-dark" type="text" name="insid" placeholder="Αριθμός ασφαλιστηρίου" required>
                              
                            </div>
                    <div class="col-md-12">
                               <input class="form-control text-dark" type="text" name="platenumber" id="platenumber" placeholder="Αριθμός πινακίδων" >
                              
                            </div>
            <div class="col-md-12">
                               <input class="form-control text-dark" type="text" name="name" placeholder="Όνομα ασφαλιζόμενου" value=""required>
                              
                            </div>

                           <div class="col-md-12">
                              <input class="form-control text-dark" type="text" name="phone1" id="phone1" placeholder="Φροντίδα ατυχήματος" >
                            
                           </div>
              
                <div class="col-md-12">
                              <input class="form-control text-dark" type="text" name="phone2" id="phone2" placeholder="Οδική βοήθεια" >
                            
                           </div>
							 <div class="col-md-12">
                              <input class="form-control text-dark" type="text" name="phone" id="phone" placeholder="Τηλ. κέντρο" >
                            
                           </div>
              <div class="col-md-12">
                              <input class="form-control text-dark" type="text" id="location" name="location" placeholder="Τοποθεσία" >
                            
                           </div>
							<div class="col-md-12 mt-3">
                           
								<textarea class="form-control text-dark" id="covers" name="covers" >Καλύψεις</textarea>
                            
                           </div>
						 <div class="col-md-12">
                              <input class="form-control text-dark" type="text" id="link" name="link" placeholder="Ασφαλιστήριο"  >
                            
                           </div>	
					
         
                           <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="type">Τύπος ασφαλίστρου: </label>

                            <input type="radio" class="btn-check" name="type" id="car" autocomplete="off" required onclick="set_type(1)">
                            <label class="btn btn-sm btn-outline-secondary" for="car">Αυτοκίνητο</label>

                            <input type="radio" class="btn-check" name="type" id="health" autocomplete="off" required onclick="set_type(2)">
                            <label class="btn btn-sm btn-outline-secondary" for="health">Υγεία</label>
							   
							     <input type="radio" class="btn-check" name="type" id="property" autocomplete="off" required onclick="set_type(3)">
                            <label class="btn btn-sm btn-outline-secondary" for="property">Περιουσία</label>
							   
  <input type="radio" class="btn-check" name="type" id="travel" autocomplete="off" required onclick="set_type(4)">
							   
                            <label class="btn btn-sm btn-outline-secondary" for="travel">Ταξιδιωτική ασφάλιση</label>
                          
                            </div>

                      
                  

                            <div class="form-button mt-3">
                              <input type="hidden" name="type" id="type">
                                <button id="submit" type="button" class="btn btn-danger"><a href="admin.php" class="text-light">Επιστροφή</a></button>
								<button id="submit" type="submit" class="btn btn-primary">Εισαγωγή</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
   $(document).ready(function(){
	   $("#car").click();
             // set_type(1);
         });
  function set_type(index){
    if(index == 1){
      $("#platenumber").show();
	  $("#phone").hide();	
	  $("#phone1").show();
	  $("#phone2").show();
	  $("#location").hide();
	  $("#covers").hide();	
      $("#type").val("car");
    }
    else if(index == 2){
	$("#phone").show();	
	$("#phone1").hide();
	$("#phone2").hide();	
    $("#platenumber").hide();
	$("#location").hide();
	$("#covers").show();	
    $("#type").val("health");
    }
	   else if(index == 3){
		   $("#phone").hide();	
	$("#phone1").hide();
	$("#phone2").hide();	
    $("#platenumber").hide();
	$("#location").show();
	$("#covers").hide();	   
    $("#type").val("property");
    }
	   else if(index == 4){
	$("#phone").hide();	
	$("#phone1").hide();
	$("#phone2").hide();	
    $("#platenumber").hide();
	$("#location").hide();
	$("#covers").hide();	   
    $("#type").val("travel");
    }
  }
 </script> 