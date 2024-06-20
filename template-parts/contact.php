<style>
	.contactcontainer{
		background-color: white;
		height: auto;
		width: 100%;
		display: flex;
		align-items: center;
	}
	.childcontainer{
		margin: 20px 50px 50px 50px;
	}
	.mapcontainer{
		height: fit-content;
		width: 60vh;
		margin: 0 0 0 20px;
	}
	.formcontainer{
		justify-content: center;
		width: fit-content;
		display: inline-block;
	}
	.inputs{
		background-color: yellow;
		width: 50vh;
		height: 45px;
	}
	.inputs input{
		width: 100%;
		height: 100%;
		border: none;
		padding: 20px;
		font-size: 12px;
		outline: none;
		font-family: Poppins;
		box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
	}
	textarea{
		width: 50vh;
		box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
		padding:20px;
		font-size: 12px;
		font-family: Poppins;
		outline: none;
		resize: none;
		border: none;
		height: 180px;
	}
	input[type=submit]{
		box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
		width: 50vh;
		font-size: 12px;
		padding: 15px 0 15px 0;
		border: none;
		border-radius:5px;
		background-color:#0d6efd;  
		color: white;
		font-weight: bold;
	}
	.childcontainer{
		display: flex;
		justify-content: center;
		align-items:center;
	}
	.locationtext {
		display: flex;
		align-items: center; /* Align items vertically */
		margin: 20px;
	}

	.locationtext img {
		filter: invert(40%) sepia(54%) saturate(6752%) hue-rotate(208deg) brightness(98%) contrast(102%);
		width: 40px;
		height: 55px;
		margin-right: 15px; /* Add margin for spacing between image and text */
	}
	.info {
		display: flex; 
		flex-direction: column; 
		justify-content: center; 
	}
	.info p,h2{
		margin: 0;
		font-family: Poppins;
		color: #212529;
	}
	.footerinformation{
		display: flex;
		margin-bottom: 50px;
		justify-content: center; 
	}
	.contactheader{
		margin-top: 80px;
		padding-top: 50px;
		width: calc(68% - 100px);
		margin: 50px auto 0 auto;
	}
	.contactheader h4{
		font-family: Sanchez;
	}
</style>
	

<div class="contactcontainer"  id="contactside">
	<div class="container">
	<div class="contactheader">
		<h4>Contact Us:</h4>
		<p stlye="font-family: Poppins;">Reach out to us for any inquiry</p>
	</div>
		<div class="childcontainer">
			<div class="formcontainer">
				<form class="" method="POST" novalidate="" action="<?php htmlspecialchars("PHP_SELF"); ?>">
				<div class="mb-2">
					<div class="inputs">
						<input type="text" name="name" class="" placeholder="Full Name" required="">
					</div>
				</div>

				<div class="mb-2">
					<div class="inputs">
						<input type="email" name="email" class="" placeholder="Your Email" required="">
					</div>
				</div>

				<div class="mb-2">
					<textarea class=" textarea" rows="9" name="message" placeholder="Message" required=""></textarea>
					
				</div>

				<div class="mb-2">
					<input type="submit" name="btnSend" class="" value="SEND">
				</div>
				</form>
			</div>

			<div class="mapcontainer ">
				<?php require_once "template-parts/map.php"; ?>
			</div>
		</div>
	</div>
	
</div>
	<div class="footerinformation" >
		<div class="locationtext">
			<!-- Location Icon -->
			<img src="img/img/map.svg" alt="Map Icon">
			
			<div class="info">
				<h2 style="font-size: 15px; ">Location:</h2>
				<p style="font-size: 10px;">28 Scout Ybardolaza Street, Barangay Sacred Heart, <br>Kamuning, Philippines</p>
			</div>	
		</div>
		<div class="locationtext">
			<!-- Email Icon -->
			<img src="img/img/mail.svg" alt="Mail Icon">
			<div class="info">
				<h2 style="font-size: 15px; ">Email:</h2>
				<p style="font-size: 10px;">sacredheart_kamuning@yahoo.com</p>
			</div>	
		</div>
		<div class="locationtext">
			<!-- Phone Icon -->
			<img src="img/img/phone.svg" alt="Phone Icon">
			<div class="info">
				<h2 style="font-size: 15px; ">Phone:</h2>
				<p style="font-size: 10px;">0906 271 2197</p>
			</div>	
		</div>
    </div>