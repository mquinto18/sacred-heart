<?php
require_once "inc/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="style/style.css">

	<style>
    body {
      margin: 0;
    }

    .container {
      width: auto;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
	.container_message{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
	}

    .pop-container {
      background-color: rgb(255, 255, 255);
      width: 80vh;
      height: auto;
      border-radius: 20px;
      padding: 25px;
      max-width: 80vh;
      opacity: 0;
      transform: translateY(50px);
      animation: fadeInUp 0.5s ease-in forwards;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(50px); /* Start with translateY */
      }
      to {
        opacity: 1;
        transform: translateY(0); /* End with translateY */
      }
    }

    .content-container {
      text-align: center;
      font-family: "Poppins", sans-serif;
    }

    .content-container h2 {
      color: #7066e0;
    }

    .image img {
      margin: 15px;
      width: 150px;
      max-width: 200px;
      min-width: 200px;
    }

    .content-container p {
      margin: 0;
      font-size: 12px;
      font-family: "Poppins", sans-serif;
      color: #393939;
    }

    .pop-buttons button {
      border: none;
      width: 200px;
      padding: 10px;
      border-radius: 10px;
      color: white;
      font-family: "Poppins", sans-serif;
      cursor: pointer;
    }

    .cancel {
      border: none;
      margin-top: 20px;
      background-color: transparent;
      cursor: pointer;
      font-family: "Poppins", sans-serif;
      color: #7066e0;
    }

    .cancel:hover {
      color: #685ecf;
    }
	.otp_container{
		padding: 20px 0;
		width: 200px;
		margin: auto;
		display: flex;
		flex-direction: column;
	}
	.otp_container input{
		height: 40px;
		padding: 0 10px;
	}
  </style>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


		*,
		::before,
		::after {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		:root {
			--primary-clr: ##374151;
			--secondary-clr: #FFFF;
			--third-clr: #666;
			--fourth-clr: #6b7280;
			--fifth-clr: #e5e7eb;
			--sixth-clr: #0d6efd;
			--seventh-clr: #212529;
			--eight-clr: #194F90;
		}

		#signup-container {
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			background-image: url("img/img/login-bg.jpg");
			background-position: center;
			background-size: cover;
			object-fit: cover;
			position: relative;
		}


		.user-signup {
			background-color: var(--secondary-clr);
			border: 1px solid var(--fifth-clr);
			border-radius: 6px;
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 30px;
			width: 80%;
			max-width: 1200px;
			padding: 30px 60px 40px 60px;
			flex-direction: column;
			margin: auto;
		}

		@media (max-width: 768px) {
			#signup-container {
				height: auto;
			}

			.user-signup {
				padding: 20px;
				margin: 60px;
			}

			.field-row {
				flex-direction: column;
				gap: 15px;
			}

			.field-row label {
				flex: 1 0 100%;
			}

			.signup-button {
				width: 100%;
			}
		}

		.user-signup h1 {
			font-size: 30px;
			color: var(--eight-clr);
			text-align: center;
			margin-bottom: 20px;
		}

		.field-row {
			flex-wrap: wrap;
			display: flex;
			justify-content: space-between;
			gap: 30px;
			width: 100%;
		}

		.field-row label {
			flex: 1 0 0;
			color: var(--primary-clr);
			font-weight: bold;
		}

		.field-row label input {
			display: block;
			width: 100%;
			padding: .5rem .75rem;
			height: 40px;
			border-radius: 6px;
			border: 1px solid #e5e7eb;
			margin-top: 4px;
			min-width: 120px;
			flex: 1 0 auto;
		}

		.signup-button {
			height: 40px;
			background-color: var(--eight-clr);
			border-radius: 6px;
			border: 0px;
			margin-top: 20px;
			color: var(--secondary-clr);
			font-weight: 500;
			cursor: pointer;
			width: 100%;
			text-align: center;
		}

		a {
			text-decoration: none;
		}

		.password-container {
			position: relative;
		}

		#passLog {
			padding-right: 30px;
		}

		.toggle-password {
			position: absolute;
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
			cursor: pointer;
		}

		#toggleIcon {
			display: block;
			margin: auto;
		}

		.back-button {
			margin-right: auto;
		}
		.container-wrapper{
			position: relative;
		}
	</style>
</head>

<body>
	<div id="container-wrapper">
	<section id="signup-container">
		<form id="signup-form" class="user-signup" method="POST" action="<?php htmlspecialchars(" PHP_SELF"); ?>">
			<div class="back-button">
				<a href="login.php"><img src="img/img/back-button.svg" class="back-icon" alt=""></a>
			</div>
			<h1>Create New User Account</h1>
			<div class="field-row" >
				<label for="lastname-label">
					Last Name
					<input type="text" id="signLast" title="Please enter letters only." name="lname" class="form-control" required="" placeholder="Enter Last Name">
				</label>
				<label for="firstname-label">
					First Name
					<input type="text" id="signFirst" title="Please enter letters only." name="fname" class="form-control" required="" placeholder="Enter First Name">
				</label>
				<label for="middlename-label">
					Middle Name
					<input type="text" id="signMiddle" title="Please enter letters only." name="mname" class="form-control" placeholder="Enter Middle Name">
				</label>
				<label for="contact-label">
					Contact Number
					<input type="number" id="signNumber" class="form-control number" title="Please enter numbers only." pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" step="1" name="contact" maxlength="11" min="0" required="" placeholder="Enter Contact Number">
				</label>
			</div>
			<div class="field-row">
				<label for="name-label">
					Email
					<input type="email" id="signEmail" name="email" placeholder="Enter Email" oninput="emailrequired()" style="outline: none;">
				</label>
				<label for="name-label">
					Username
					<input type="text" id="signUser" name="username" class="form-control" title="Please enter letters only." placeholder="Enter Username" required="">
				</label>
				<label for="pass-label">
					Password
					<div class="password-container">
						<input type="password" id="password" name="password" oninput="checkPassword()" placeholder="Enter Password">
						<span class="toggle-password" onclick="togglePassword()">
							<img id="toggleIcon" src="img/img/eye-off.svg" alt="Show Password">
						</span>
					</div>
				</label>
			</div>
			<div class="field-row">
				<label for="">
					Address
					<input type="text" id="signAddress" name="address" class="form-control" placeholder="Enter Address">
				</label>
			</div>

			<input id="registerButton" class="signup-button" value="Register" type="button" onclick="toggleForm()" disabled style="background-color: grey;">

			<!--  -->

			<div id="verification-container" class="container_message" style="display:none; padding: 250px 400px; background-color: rgba(0, 0, 0, 0.40);" >
				<div class="pop-container">
					<div class="content-container">
					<h2>Verify your email</h2>

					<div class="NewLogin-OTP" style="display: none;">
						<label for="OTP">Enter OTP:</label><br>
						<input type="text" id="OTP" name="OTP" readonly>
					</div>

					<p>You will need to verify your email to complete registration</p>
					<p>Check you Email account for verification Code</p>
					<div class="image">
							<div class="otp_container">
								<label for="">Input OTP code</label>
								<input type="text" id="otpCode" oninput="validateInput()">
							</div>
					</div>
					<div class="pop-buttons">
						<button id="sendEmailBtn" type="submit" name="btnReg" style="background-color: grey;" disabled>Submit</button><br/>
						<a href="login.php"><button style="color: #7066e0; background-color: transparent; font-weight: bold;"> Cancel</button></a>
					</div>
					</div>
				</div>
			</div>
		</form>
	</section>
	</div>

	<script src="https://cdn.emailjs.com/dist/email.min.js"></script>

	<script>
		//Register Button

		function toggleForm() {
			var last = document.getElementById("signLast").value;
			var first = document.getElementById("signFirst").value;
			var middle = document.getElementById("signMiddle").value;
			var number = document.getElementById("signNumber").value;
			var email = document.getElementById("signEmail").value;
			var user = document.getElementById("signUser").value;
			var password = document.getElementById("password").value;
			var address = document.getElementById("signAddress").value;

			if (last !== "" && first !== "" && middle !== "" && number !== "" && email !== "" && user !== "" && password !== "" && address !== "") {
				var otpform = document.getElementById("verification-container");
				otpform.style.display = "block";
			} else {
				alert("Please fill in all fields.");
			}

			var otpNumbers = generateRandomNumbers();
            document.getElementById("OTP").value = otpNumbers;
            return otpNumbers;
		}

		function generateRandomNumbers() {
            var numbers = '';
            for (var i = 0; i < 5; i++) {
                numbers += Math.floor(Math.random() * 10); // Generate random numbers between 0 and 9
            }
            return numbers;
        }

		function validateInput(){
			const submitbtn = document.getElementById("sendEmailBtn");
			const otpcode = document.getElementById("OTP").value;
			const inputtedOTP = document.getElementById("otpCode").value;

			if (otpcode === inputtedOTP){
				submitbtn.disabled = false;
				submitbtn.style.backgroundColor = "#7066e0";
			}else{
				submitbtn.disabled = true;
				submitbtn.style.backgroundColor = "grey";
			}
		}

		function emailrequired() {
			const email = document.getElementById("signEmail").value;
			var submitButton = document.getElementById("registerButton");

			// Check if the email contains '@' and '.', and is not empty
			if (email !== "" && email.includes('@') && email.includes('.')) {
				document.getElementById("signEmail").style.outline = "2px solid green";
				submitButton.disabled = false;
   				submitButton.style.backgroundColor = '#194f90';
			} else {
				document.getElementById("signEmail").style.outline = "2px solid red";
				submitButton.disabled = true;
    			submitButton.style.backgroundColor = "#808080";
			}
		}


		(function() {
            emailjs.init("eIbAcbGvszDpkn7IG"); //APIKey Change
    
            document.getElementById("registerButton").addEventListener("click", function() {

                var inputed_email = document.getElementById("signEmail").value;
				var user = document.getElementById("signUser").value;
                var otp_number = document.getElementById("OTP").value;

                emailjs.send("service_czx06ma","template_6q78qtv", { //Service and  Template Changes
					from_name: "Sacred Heart of Jesus Catholic Church",
					username: user,	
                    to_email: inputed_email,
                    otp_number: otp_number
                }).then(function(response) {
                    alert("Email sent successfully!");
                }, function(error) {
                    alert("Failed to send email. Please try again later.");
                    console.error("Email sending error:", error);
                });
            });
        })();


		//validatepassword
		function checkPassword() {
			var password = document.getElementById("password").value;
			var submitButton = document.getElementById("registerButton");
		
			if (password.length >= 8 && /\d{2}/.test(password) && /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password)) {
				document.getElementById("password").style.outline = "2px solid green";
				submitButton.disabled = false;
   				submitButton.style.backgroundColor = '#194f90';
			} else {
				document.getElementById("password").style.outline = "2px solid red";
				submitButton.disabled = true;
    			submitButton.style.backgroundColor = "#808080";
			}

			
		}

		function togglePassword() {
			var passwordInput = document.getElementById("password");
			var toggleIcon = document.getElementById("toggleIcon");

			if (passwordInput.type === "password") {
				passwordInput.type = "text";
				toggleIcon.src = "img/img/eye.svg";
			} else {
				passwordInput.type = "password";
				toggleIcon.src = "img/img/eye-off.svg";
			}

		}		
	</script>
</body>
</html>