<style>
    .aboutcontainer {
        background-color: white;
        height: auto;
        width: 100%;
        font-family: Poppins;
 		background-repeat: no-repeat;
    }
	.abouttitle{	
		width: calc(50% - 100px);
		margin: 80px auto 30px auto;
		text-align: center;
	}
	.aboutinfo{
		margin: 0 auto 30px auto;
		width: calc(58% - 100px);
		font-size:14px;
	}
	.aboutinfo p{
		text-align: center;
	}
	.moreinfo{
		margin: 50px auto 20px auto;
		width: calc(68% - 100px);
		font-size:14px;
	}
	.moreinfo p{
		text-align: left;
	}
	.abouttitle h1{
		font-family: Sanchez;
		font-size: 30px;
	}
	.images1,.images2{
		width: fit-content;
		height: fit-content;
		margin: 5px;
	}	
	.images1 img,.images2 img{
		width: 450px;
		height: 280px;
		margin: 5px;
		border-radius: 40px;
	}
	.imagecontainer{
		margin: 0 auto;
		width: fit-content;
	}
	.buttonread {
		width: fit-content;
		height: fit-content;
		padding: 12px 0;
		position: relative; /* Add position relative to enable absolute positioning of pseudo-element */
		overflow: hidden; /* Hide overflowing content */
	}

	.buttonread a {
		text-decoration: none;
		font-size: 13px;
		font-weight: bold;
		font-family: Sanchez;
		color: black;
	}

	/* Create the line using a pseudo-element */
	.buttonread::after {
		content: '';
		position: absolute;
		left: 0;
		bottom: 0;
		width: 0; /* Initially 0 width */
		height: 2px; /* Height of the line */
		background-color: black; /* Color of the line */
		transition: width 0.3s; /* Transition effect for width */
	}

	/* Define hover effect */
	.buttonread:hover::after {
		width: 100%; /* Grow to 100% width on hover */
	}
	.about-container{
		max-width: 1240px;
		margin: auto;
	}
</style>

<div class="aboutcontainer" id="aboutscroll">
	<div class="abouttitle">
        <h1>New community center envisioned to bring congregation closer together.</h1>
    </div>

	<div class="aboutinfo">
		<p>The Sacred Heart Shrine of Jesus Parish is an religious organization that serves as a vital part of the communal and spiritual lives of its members. The parish lays plans for many events carried out such as Masses, religious ceremonies, fundraisers, community outreach initiatives, and various social gatherings.</p>
	</div>

	<div class="about-container">
		<div class="imagecontainer">
			<div class="images1">
				<img src="img/img/about-2.jpg" alt="">
				<img src="img/img/about-5.jpg" alt="">
			</div>
			<div class="images2">
				<img src="img/img/about-4.jpg" alt="">
				<img src="img/img/about-3.jpg" alt="">
			</div>
		</div>

		<div class="moreinfo">
			<p style="margin-bottom: 20px;">Established in 1941, the Sacred Heart of Jesus Parish is the first church to serve both the residents of the government’s Homesite Barrio Obrero and the wealth residents of the nearby Magdalena Estate. Before that, the residents in both area attended masses at the chapels of the Convent of Carmel of Thérèse of Lisieux. (Est. 1932), and the Christ the King Mission Seminary (Est. 1933); which are all located within the Magdalena Estates.</p>
			<p>Upon the 1939 establishment of the Homesite Project’s Barrio Obrero, the residents approached the missionaries of the Society of the Divine Word (SVD, or Societas Verbi Divini) from the nearby Divine Word Mission Seminary, to hold masses in their neighborhood. So Christmas day 1940, Fr. Herman Kondring, of the SDV, gave the first mass in a makeshift chapel along K-A Street (now Vice-Mayor Luis Sianghio Street); which now the site of the Kamuning Public Market. Around 100 parishioners attended that first mass, from the 500 families who had settled in the Kamuning area.</p>
			<div class="buttonread">
			<a href="http://www.osacredheart.info/">Readmore</a>
		</div>
		</div>
	</div>
</div>
