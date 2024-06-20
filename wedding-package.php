<!DOCTYPE html>
<html lang="en">

	<?php require_once "template-parts/head.php"; ?>
	<style>
		.weddingheader{
			height: 50vh;
			background-image: url(img/img/wedding.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
		.weddingheadertext{
			background-color: rgba(0,0,0,0.70);
			height: 100%;
			font-family: Poppins;
			color: white;
			text-align: center;
		}
		.weddingheadertext h1{
			font-size: 70px;
			position:relative ;
			font-weight: 550;
			top: 35%;
		}
		.weddingheadertext h3{
			font-size: 20px;
			position:relative ;
			top: 37%;
			font-weight: 200;
		}
		
		.weddingcontentpage{
			height: auto;
			weight: auto;
			/* padding: 30px 0; */
		}
		.weddingcontentpage img {
			max-width: 100%;
			height: auto;
			display: block;
			margin: 0 auto; /* Center the image horizontally */
		}
		.firstcontent, .thirdcontent ,.fourthcontent{
			font-family: Poppins;
			text-align: center;
			padding-bottom: 50px;
			justify-content: center;
			position: relative;
		}

		.firstcontent:before {
			content: ""; 
			border-bottom: 3px solid rgba(0,0,0,0.20);
			position: absolute;
			bottom: 0; 
			left: 20%; 
			right: 0; 
			width: 113vh;
		}
		.contents{
			width: 30vh;
			font-size: 15px;
			margin: 0 40px;
		}
		.contents p{
			text-align: left;
		}
		.bodycontents{
			display: flex;
			justify-content: center;
		}
		.secondcontent{
			position: relative;
		}
		.secondbodycontents{
			display: flex;
			justify-content: center;
			padding: 40px 0;
		}
		.moreoffers{
			margin: 0 10vh;
		}
		.morecontents{
			margin: 0 26vh;
		}
		.morecontents p{
			font-family: Poppins;
			font-size: 15px;
			margin: 2px 0;
		}
		.moreoffers p, .offers p{
			font-family: Poppins;
			font-size: 15px;
			margin: 2px 0;
		}
		.secondcontent:before {
			content: ""; 
			border-bottom: 3px solid rgba(0,0,0,0.20);
			position: absolute;
			bottom: 0; 
			left: 20%; 
			right: 0; 
			width: 113vh;
		}
		.thirdcontent:before {
			content: ""; 
			border-bottom: 3px solid rgba(0,0,0,0.20);
			position: absolute;
			bottom: 0; 
			left: 20%; 
			right: 0; 
			width: 113vh;
		}
		.lastcontents{
			width: 110vh;
		}
		.redtext{
			color: red;
			text-align: center;
			font-family: Poppins;
			font-size: 13px;
			font-weight: 440;
			padding-bottom: 20px;
			padding-top: 20px;
			font-style: italic;
		}
		.minifooter{
			background-color: #f1f1f1;
			height: auto;
		}
		.minifooterheader{
			padding:22px 0 20px 0;
		}
		.minifooterheader p{
			text-align: center;
			font-family: Poppins;
			color: white;
			font-size: 20px;
			font-weight: 550;
			color: #212529;
		}
		.informationfooter{
			width: fit-content;
			display: inline-block;
			position: relative;
			left: 18%;
			
		}
		.informationfooter img{
			height: 25px;
			margin-right: 7px;
		}
		.informationfooter p, .information a{
			font-family: Poppins;
			font-size: 12px;
			color: #212529;
			vertical-align: middle;
		}
		.informationfooter .information{
			display:flex; 
			margin: 15px;
			align-items: center;
		}
		.weddingnav{
			background-color: yellow;
			color: #212529;
		}
		.scred-contact{
			display: flex;
			max-width: 1240px;
			margin: auto;
			gap: 50px;
		}
	</style>

	<body>
		<?php 
			require_once "template-parts/sub-nav.php"; 
		?>

		<!-- <div class="weddingheader">
			<div class="weddingheadertext">
				<h1>Wedding Packages</h1>
				<h3>More than affair it’s a Sacrament</h3>
			</div>
		</div> -->

		<div class="weddingcontentpage">
			<img src="img/img/wedding_offers_page-0001.jpg" alt="Wedding Offers" />
		</div>
		
		<?php
			require_once "template-parts/bottom.php"; 
		?>
</body>
</html>