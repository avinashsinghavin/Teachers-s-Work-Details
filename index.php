<!DOCTYPE html>	
<html>
<head>
	<title>Login Page </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="cssfile.css">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
	  <a class="navbar-brand" href="#" style="font-family: 'Tangerine', serif;
  font-size: 25px;">Teacher's Detail</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      
	    </ul>
	   	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>
	  </div>
	</nav>
	<hr>
	<div class="dropdown" id = "login" style="visibility: visible; display : block; text-align: center;">
	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">	    
	  	Select 
	  </button>
	  <div class="dropdown-menu">
	    <a class="dropdown-item" onclick="Teacher()">Teacher</a>
	    <a class="dropdown-item" onclick="Admin()">Admin</a>
	  </div>
	</div>
	<!-- Teachers Login Form  -->
	<div id = "Teacher_login" class="text-center" style="visibility: hidden; display : none; text-align: center;">
		<div class="form-signin">
			<!-- <form class="form-signin"> -->
	      <img class="mb-4" src="giet-logo-opt.png" alt="" width="50%" height="50%">
	      <h1 class="h3 mb-3 font-weight-normal">Teachers sign in</h1>
	      <label for="inputEmail" class="sr-only">Email address</label>
	      <input type="text" id="Teacher_uid" class="form-control" placeholder="Employee Id" required autofocus>
	      <label for="inputPassword" class="sr-only">Password</label>
	      <input type="password" id="Teacher_pas" class="form-control" placeholder="Password" required>
	      <div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Remember me
	        </label>
	      </div>
	      <button class="btn btn-lg btn-primary btn-block" type="submit" id="signin_btn" onclick="Teacher_submit()">Login</button>
	      <p class="mt-5 mb-3 text-muted">&copy; 2019-20220</p>
	  	</div>
	    <!-- </form> -->
	</div>
	<!-- Admin Login Form -->
	<div id = "Admin_login" style="visibility: hidden; display : none; text-align: center;">
		<form class="form-signin">
	      <img class="mb-4" src="giet-logo-opt.png" alt="" width="50%" height="50%">
	      <h1 class="h3 mb-3 font-weight-normal">Admin's Sign In</h1>
	      <label for="Employee_id" class="sr-only">Employee Id</label>
	      <input type="text" id="Employee_id" class="form-control" placeholder="Employee Id" required autofocus>
	      <label for="inputPassword" class="sr-only">Password</label>
	      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
	      <div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Remember me
	        </label>
	      </div>
	      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	      <p class="mt-5 mb-3 text-muted">&copy; 2019-20220</p>
	    </form>
	</div>

</body>
<script type="text/javascript">
	function Teacher_submit() {
		var uid = document.getElementById('Teacher_uid').value;
		var pas = document.getElementById('Teacher_pas').value;
		var signin_btn=$("#signin_btn");
		if(uid != "" || pas != "") {
			$.ajax({
				url: "./Teacherlogin.php",
				type: "POST",
				data: {userid : uid, password : pas},
				success: function(result){
					result=JSON.parse(result);
					console.log(result);
					if(result.status=='ok'){
						swal("Success","Logged In","success");
					}
					signin_btn.html("Login");
					signin_btn.removeAttr('disabled');
				},
				beforeSend: function(){
					signin_btn.html("Logging in...");
					signin_btn.attr('disabled', 'disabled');
				},
				error:function(err){
					console.log(err);
				}
			});
		}
		
	}
	function Teacher() {
		document.getElementById("login").style.visibility = 'hidden'; 
		document.getElementById("login").style.display = 'none';
		document.getElementById('Teacher_login').style.visibility = 'visible';
		document.getElementById('Teacher_login').style.display = 'block';
		//alert("Teacher");
	}
	function Admin() {
		//alert("Admin");
		document.getElementById("login").style.visibility = 'hidden'; 
		document.getElementById("login").style.display = 'none';
		document.getElementById('Admin_login').style.visibility = 'visible';
		document.getElementById('Admin_login').style.display = 'block';
	}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" cossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>