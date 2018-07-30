<!DOCTYPE html>
<html>
	
	<head> 
		<meta charset="utf-8">
		<title> PetMe </title>
		<link rel="stylesheet" type="text/css" href="CSS/normalize.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="icon" type="image/icon" href="Slike/mini-logo.png" />
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="JavaScript/main.js"></script>
        <script type="text/javascript" src="JavaScript/index.js"></script>
	</head>
	
	<body>

		<header>

																		<!-- Navigacija -->
			<img src="Slike/petme-logo1.png" class="logo"/>
			<nav>
				<ul>
					<li id="navOnama"><a href="#o-nama"><strong>o nama</strong></a></li>
					<li id="navTim"><a href="#tim"><strong>tim</strong></a></li>
					<li id="navPartneri"><a href="#partneri"><strong>partneri</strong></a></li>
					<li id="navKontakt"><a href="#kontakt"><strong>kontakt</strong></a></li>
					<li><a href="#"><strong>blog</strong></a></li>
				</ul>
			</nav>
		</header>
																		<!-- O nama -->
		<article id="o-nama" class="o-nama">
    		<section>
    		<h1>Dobrodošli!</h1>
    		<p>PetMe je inovativna platforma pomoću koje težimo da udomimo što više kućnih ljubimaca, smanjimo broj lutalica
           sa ulica i pružimo pomoć azilima i drugim organizacijama koje se bave rešavanjem ovog problema. 
           Želja nam je da platforma u budućnosti simboliše humanost i da služi kao dokaz da zajedničkim snagama možemo
           da utičemo na promenu sistema i stvaranje boljih uslova za život - kako životinjama, tako i ljudima.
            </p>
           </section>
	    </article>
	    
        <article class="obavestenje">
	        <section>
	        	<h2>Platforma je trenutno u izradi!</h2>
	        	<p>Da biste među prvima bili obavešteni kada počinje sa radom</p>
	        	<button id="btnPopup" type="button" name="button">OSTAVI EMAIL</button>
	        	<div id="emailPopup" class="popup">
	        	<div class="popupContent">
	        		<div class="popupHeader">
	        			<span class="closePopup">&times;</span>
	        			<h3>Prijavi se</h3>
	        		</div>
	        		<form method="POST" action="petme.php">
                        <input type="email" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,3}$" required>
                        <br>
                        <span class="error_form" id="email_error_message"></span>
                        <br> 
                        <input type="submit" id="submit" name="submit" value="Pošalji">
                    </form>
	        	</div>
            </div>
            <div id="popupApproved" class="emailApproved">
            	<div class="approvedContent">
            		<h3>Uspešno ste se prijavili!</h3> 
            		<img src="Slike/potvrda.png">
            		<br>
            		<button id="approvedBtn" type="button" name="button">OK</button>           		
            	</div>
            </div>
	        	<p>ili nas zapratite na društvenim mrežama</p>
	        </section>
	            

	        <section class="drustvene-mreze">
	        	<a href="#"><img src="Slike/instagram.png" class="ikonice"></a>
	        	<a href="#"><img src="Slike/facebook.png" class="ikonice"></a>
	        	<a href="#"><img src="Slike/linkedin.png" class="ikonice"></a>
	        </section>
	    </article>

																		<!-- Tim -->
	<h1 id="tim" class="main-h1">Naš tim</h1>
	<main class="wrapper">
		<article class="team-member">	
			<section class="team-img">
				<img src="Slike/tim/adorable-animal-canine-1097551.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Emilia Davison </h1>
				<h3 class="radno-mesto"> menadzer </h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="http://1.bp.blogspot.com/-a6cCXFZRufo/Ti-bhl0iSaI/AAAAAAAAAG0/gbhf-tZIYyc/s1600/simon-cowell-and-his-pet-buster.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Simon Cowell </h1>
				<h3 class="radno-mesto"> menadzer </h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="https://image.afcdn.com/story/20151124/-817084_w767h767c1cx510cy248.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Vanessa Ives </h1>
				<h3 class="radno-mesto"> programer </h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="Slike/tim/animal-canine-cute-159557.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Michael Van der Smith  </h1>
				<h3 class="radno-mesto"> backend programer </h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="Slike/tim/animal-beautiful-blonde-460305.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Emilia Scott</h1>
				<h3 class="radno-mesto"> dizajner </h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="http://images6.fanpop.com/image/photos/35300000/Sophie-Turner-game-of-thrones-35320313-2197-1463.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Sophie Turner</h1>
				<h3 class="radno-mesto">frontend programer</h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="https://houseofgeekery.files.wordpress.com/2013/03/jon-snow-and-ghost.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Jon Snow </h1>
				<h3 class="radno-mesto"> backend programer</h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="http://3.bp.blogspot.com/-vYaqRqA4xgg/ULxeFIa8LaI/AAAAAAAAOYQ/S_mAOzRiFNo/s1600/HBT-TRL2-056.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Bilbo Baggins </h1>
				<h3 class="radno-mesto"> burglar</h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>
		<article class="team-member">	
			<section class="team-img">
				<img src="Slike/tim/affection-animal-brunette-1139793.jpg" alt="">
			</section>
			<section class="team-member-info">
				<h1 class="ime-prezime"> Lisa Simpson </h1>
				<h3 class="radno-mesto"> dizajner </h3>
				<p class="biografija">Murf pratt ungow ungow meow to be let in rub face on owner cereal boxes make for five star accommodation . Play time chill on the couch table this human feeds me, i should be a god.  </p>
                <ul>
                    <li>
                        <a href="#"> <img src="Slike/facebook.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/instagram.png" /> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="Slike/linkedin.png" /> </a>
                    </li>
                </ul>
			</section>
		</article>							
	</main>

																		<!-- Partneri -->
        <article id="partneri" class="partneri">
            <h1 class="main-h1"> Partneri </h1>
            <ul>
                <li> <a href="#"> <img src="Slike/pet-guards-logo.png" /> </a> </li>
                <li> <a href="#"> <img src="Slike/pet-guards-logo.png" /> </a> </li>
                <li> <a href="#"> <img src="https://images.ecosia.org/vzvDB9RW8rBDF7Xi4LqWdZEvTmA=/0x390/smart/http%3A%2F%2Flogok.org%2Fwp-content%2Fuploads%2F2014%2F05%2FCoca-Cola-logo.png" /> </a> </li>
                <li> <a href="#"> <img src="Slike/instagram.png" /> </a> </li>
                <li> <a href="#"> <img src="http://1.bp.blogspot.com/-CnTGBZaanBY/UO9sKnXkBJI/AAAAAAAAEB8/Z5b9Ei0xris/s1600/Facebook+logo.png" /> </a> </li>
                <li> <a href="#"> <img src="Slike/facebook.png" /> </a> </li>
            </ul>
        </article>
                                                                            <!-- Footer - kontakt -->
        <article id="kontakt" class="kontakt">
            <h1 class="main-h1"> Kontakt </h1>
            <section>
                <h2> e-mail: </h2>
                <ul>
                    <li> <strong> John Smith </strong> - john.smith@petme.rs </li>
                    <li> <strong> Lisa Simpson </strong> - lisa.simpson@petme.rs </li>
                </ul>
            </section>
            <section>
                <h2> telefon: </h2>
                <ul>
                    <li> <strong> John Smith </strong> - +3816###X##X# </li>
                    <li> <strong> Lisa Simpson </strong> - +3816###X##X# </li>
                </ul>
            </section>
        </article>

        <footer>
            Copyright ©2018 PetMe
        </footer>

        <script src="JavaScript/imgSlider.js">
        </script>
	</body>
</html>