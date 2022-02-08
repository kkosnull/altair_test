<?php
session_start();

if(!isset($_SESSION["user"])){
	header("Location: login.php");
	die;
}

?>
<script> 
var user;
user = "<?php echo $_SESSION["user"];?>";
console.log(user);
</script>
<html>
<head>
   <title>Code test - main</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="select2/components.css">
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
	  
#typefront {
border: 0;
outline: 0;
background: transparent;
border: 1px solid #e5e5e5;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
var order=[];
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
       
            <div class="col-md-9">
                <div class="form-content">
                    <div class="form-items">
                        <h3>User : [<?php echo $_SESSION["user"]; ?>]  <button type="button" class="btn btn-danger" onclick="logoff()">Έξοδος</button></h3>
                        <hr>
            <div class="col-md-12">
            <select class="browser-default custom-select"  aria-label="Default select example" id="items" data-input="select2">
              <option selected>Διαθέσμια προιόντα</option>
            </select>
               </div>
                       


 <div class="col-md-12" id="product" style="color:white">
                            </div>
                    
 <div class="col-md-12" id="price" style="color:white">
</div>
  <div class="col-md-12" id="weight" style="color:white;margin-bottom:20px;">
                             
                            </div>
							
 <div class="col-md-1" id="buttonadd" style="color:white">

                           </div>
							
                         

							<div class="col-md-12" id="myorder" style="color:white;margin-top:20px;">

	
							
							</div >
							<div class="col-md-12"  style="color:white;margin-top:20px;">
							<p id="total"></p>
							</div>
							 <div class="form-button mt-3">
                            
                                <button id="submit" type="button" class="btn btn-primary" onclick="placeorder()">Παραγγελία</button>
                            </div>
                     
                    </div>
                </div>
            </div>
      
    </div>
</body>
</html>
<script type="text/javascript" src="data/data.json"></script>
<script>
  var data0 = JSON.stringify(data);
  var obj = JSON.parse(data0);
  var order=[];
  var order2send=[];
  var total=0;
  var totalweight=0;
    try {

 Object.keys(obj).forEach(key => {
     
  //  obj[key]["type"]
     $('#items').append($('<option>', {
    value: obj[key]["productid"],
    text: obj[key]["product"]+", "+obj[key]["price"]+" ευρώ, "+"κατασκευαστής : "+obj[key]["manufacturer"]
  }));   
   
});
    
      
}
catch(err) {
 console.log(err);
  
}

function findproduct(insid){
  try {   
     Object.keys(obj).forEach(key => {
       
  if(insid == obj[key]["productid"]){
 
	 $("#product").html(obj[key]["product"]+" κατασκευαστής :  " +obj[key]["manufacturer"]);
     $("#price").html(obj[key]["price"]+" ευρώ");
     $("#weight").html(obj[key]["weight"]+" kg, "+ "όγκος : "+obj[key]["size"]);
	
	 $("#buttonadd").html("<button  type='button' class='btn btn-success' onclick='add(\""+obj[key]["productid"]+", "+obj[key]["product"]+", "+obj[key]["price"]+" ευρώ, "+obj[key]["weight"]+" kg, "+obj[key]["size"]+", κατ : "+obj[key]["manufacturer"]+"\")'>Προσθήκη</button>");

 
  }

});
}    
catch(err) {
 console.log(err);
  
}
      
}

function add(id){
	
	try {
		order.pop(); // clear order
		order.push(id); // push next order
		order2send.push(id);
		var price = 0;
		var weight = 0;
		price = parseInt(id.split(", ")[2].match(/\d+/)[0]);
		weight = parseInt(id.split(", ")[3]);
		console.log("weight : "+weight);
		
		
		for (var i=0; i<order.length; i++){
			
			
			total = total + price;
			totalweight = totalweight + weight;
			$("#myorder").append("<p>"+order[i]+"</p>");
			console.log("t "+total);
		
		}
		
		console.log("totalweight : "+totalweight);
		if(totalweight > 5){
			var diff = totalweight - 5;
			var extra = 0;
			extra = 4.5*diff;
			total =total+extra;
		}
		$("#total").text("Σύνολο : "+total+" ευρώ, συνολικό βάρος : "+totalweight+" kg");
	}	
	catch(err) {
	console.log(err);
  
	}
}
  
function placeorder(){
	try {
			
		var finalorder = JSON.stringify(order2send);
		var jsonString = JSON.stringify(finalorder);
		$.ajax({
				type: "POST",
				url: "finalizeorder.php",
				data: {data : jsonString,
					   total: total,
					   user: user}, 
				cache: false,
		
				success: function(data){
					console.log(data);
				},
		error: function(xhr, status, error){
		console.error(xhr);
		}
		});
	}
	catch(err) {
	console.log(err);
  
	}
}

function logoff(){
	window.location.href = "logout.php";
}
</script>
<script>
 
 $('#items').on('change', function (e) {
          
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
 findproduct(valueSelected);
});
  
 </script> 
 
 <script>
$("#items").select2({
  width: 'resolve',
  minimumInputLength : "300px",
	dropdownAutoWidth : true,
	width: '100%'
});

	$("#items>optgroup>option[value='1']").attr('disabled','disabled');
</script>
