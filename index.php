<?php
// Empêcher les utilisateurs de rafraîchir la page ou d'appuyer sur le bouton "retour" et de soumettre à nouveau le formulaire
// https://stackoverflow.com/a/59418923
if (!isset($_SESSION)) {
	session_start();
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$_SESSION['postdata'] = $_POST;
	unset($_POST);
	header("Location: ".$_SERVER[REQUEST_URI]);
	exit;
	}
	
	if (@$_SESSION['postdata']){
	$_POST=$_SESSION['postdata'];
	unset($_SESSION['postdata']);
	}
?>

<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>

	<title>Jérôme Rinner | Développeur web</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="Développeur web front-end / back-end" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/vivify.min.css" />
	<noscript>
	<link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<link rel=icon href=images/favicon.png sizes="any" type="image/png">

</head>





<!-- <body class="is-preload" onload="setInterval(run, 40)"></body> -->

<body class="is-preload">


	<!-- Wrapper-->
	<div id="wrapper">

		<!-- <div id="container" class="">

			<canvas id="game" width="100" height="100"></canvas>
			
		</div> -->



		<!-- Nav -->
		<nav id="nav">

			<a href="#" class="icon solid fa-home vivify swoopInTop"><span>Accueil</span></a>
			<a href="#work" class="icon solid fa-folder vivify swoopInTop delay-100"><span>Travaux</span></a>
			<a href="#contact" class="icon solid fa-envelope vivify swoopInTop delay-150"><span>Contact</span></a>


		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Me -->
			<article id="home" class="panel intro">

				<header>

					<h1 class="animated lightSpeedIn" style="text-align: center;">JÉRÔME RINNER</h1>
					<p class="animated bounceIn" style="text-align: center;margin-bottom: 0.5em;">Développeur Web & Web
						Mobile</p>
					<br>

					<p class="test mt-6" style="font-size: 0.8em;text-align: justify;margin-bottom: 5px;"><i
							class="fa fa-quote-left" aria-hidden="true"></i>
						En reconversion professionnelle Développeur Web au sein de l'école Access Code School.
						Passionné de technologie, je me donnerai à fond pour l’entreprise qui me fera confiance.
					</p>
					<hr class="resume" style="width:10em; margin: auto;">
					<br>

					<div class="social">
						<a title="ＧｉｔＨｕｂ" style="margin-left: 0;" href="https://github.com/HelixFix" target="_blank" rel="noopener noreferrer"><img
								class="vivify2 spin2" src="images/github-10-32.png" alt="" /></a>
						<a title="ＬｉｎｋｅｄＩｎ" href="https://fr.linkedin.com/in/jerome-rinner-helixfix-developpeur-web-mulhouse"
							target="_blank" rel="noopener noreferrer"><img class="vivify2 spin2" src="images/linked-5-32.png" alt="" /></a>
						<a title="Ｔｗｉｔｔｅｒ" href="https://twitter.com/helixfix" target="_blank" rel="noopener noreferrer"><img class="vivify2 spin2"
								src="images/tweet-5-32.png" alt="" /></a>
					</div>

				</header>

				<a href="#work" class="jumplink pic">

					<span class="arrow icon solid fa-chevron-right"><span>See my work</span></span>
					<img src="images/me2.jpg" alt="" />

				</a>

			</article>

			<!-- Work -->
			<article id="work" class="panel">

				<header>

					<h2>Travaux</h2>

				</header>

				<p style="margin-bottom: 1.5em;text-align: justify;">
					Vous trouverez ci-dessous les projets que j'ai réalisés durant ma formation Access Code School. Vous
					remerciant de l'intérêt porté à mes créations, je vous souhaite une bonne visite.
				</p>

				<section>

					<div class="row">

										<!--WeTransfert-->
						<div class="modal" id="modalTransfert">

							<div class="modal-content">

								<div class="header">

									<h2>Projet WeTransfer</h2>

								</div>

								<div class="copy">

									<p>En binôme la création d'un site permettant la compression et l'envoi de fichier.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS | PHP | SQL</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideTransfert">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/speedtransfert" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/SpeedTransfert/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>							
			

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="WeTransfer" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">WeTransfer like</span>
							<figure><a href="#modalTransfert" class="image fit"><img src="images/SpeedTransfert.png"
										alt=""></a></figure>

						</div>

						<!--Allociné-->
						<div class="modal" id="modalCiné">

							<div class="modal-content">

								<div class="header">

									<h2>Projet Allociné </h2>

								</div>

								<div class="copy">

									<p>Création d'un site qui répertorie des films, travail de groupe sur trois semaine.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS | PHP | SQL | MVC | TWIG | MySQL Workbench</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideToutUnCinema">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/joansor/AmericanMovies" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/toutuncinema/" target="_blank" rel="noopener noreferrer"">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>
						

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="ToutUnCinema" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Allociné like</span>
							<figure><a href="#modalCiné" class="image fit"><img src="images/ToutUnCinema.png" alt="Projet Allociné like"></a></figure>

						</div>

							<!--Bomberman-->
						<div class="modal" id="modalBomberman">

							<div class="modal-content">
			
								<div class="header">
			
									<h2>Projet Bomberman</h2>
			
								</div>
			
								<div class="copy">
			
									<p>Travail individuel - Créer un jeu où le joueur incarne un poseur de bombes, le but étant de faire exploser les adversaires/ennemis pour gagner.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS | JavaScript</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideBomberman">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/Bomberman/" target="_blank" rel="noopener noreferrer">Le projet</a>
			
								</div>
			
							</div>
			
							<div class="overlay"></div>
			
						</div>

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Bomberman" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Bomberman like</span>
							<figure><a href="#modalBomberman" 
									 class="image fit"><img src="images/Bomberman.png" alt=""></a>
							</figure>

						</div>

										<!--Inauguration-->
						<div class="modal" id="modalInauguration">

							<div class="modal-content">

								<div class="header">

									<h2>Projet d'inauguration </h2>

								</div>

								<div class="copy">

									<p>Travail de groupe - Réaliser un site présentant les apprenants d'Access Code school Mulhouse pour l'inauguration de la première session.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS | JavaScript</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideInauguration">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/Inauguration/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Inauguration" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Projet d'inauguration ACS</span>
							<figure><a href="#modalInauguration" 
									 class="image fit"><img src="images/Inauguration.png" alt=""></a>
							</figure><!---->

						</div>

									<!--Dico-->
						<div class="modal" id="modalDico">

							<div class="modal-content">

								<div class="header">

									<h2>Dico HTML</h2>

								</div>

								<div class="copy">

									<p>Travail individuel - Réaliser un dictionnaire des balises composé de plusieurs pages.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideDico">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/Projet1#projet1" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/Projet1bis/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Dico" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Dictionnaire balise HTML</span>
							<figure><a href="#modalDico" 
									 class="image fit"><img src="images/ProjetDico.png" alt=""></a>
							</figure>

						</div>

									<!--Multi-->
						<div class="modal" id="modalMulti">

							<div class="modal-content">

								<div class="header">

									<h2>Tables de multiplications</h2>

								</div>

								<div class="copy">

									<p>Travail individuel - Création d'un site avec du PHP qui permet aux utilisateurs de réviser leurs tables de multiplication.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS | PHP</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideMulti">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/Tables-de-multiplication" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/Tables-de-multiplication#tables-de-multiplication" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>	

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Multi" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Tables de multiplications</span>
							<figure><a href="#modalMulti"
									  class="image fit"><img
										src="images/TableMultiplication.png" alt=""></a></figure>

						</div>

												<!--Convert-->
						<div class="modal" id="modalConvert">

							<div class="modal-content">

								<div class="header">

									<h2>Convertisseur d'âge</h2>

								</div>

								<div class="copy">

									<p>Travail individuel - Écriture d'un script qui convertit l'âge.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">JavaScript</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideConvert">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/ageConverter#ageconverter" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/ageConverter-master/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>	

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Convert" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Convertisseur d'âge</span>
							<figure><a href="#modalConvert" 
									 class="image fit"><img src="images/ageConverter.png" alt=""></a>
							</figure>

						</div>

												<!--Inté1-->
						<div class="modal" id="modalInte1">

							<div class="modal-content">

								<div class="header">

									<h2>Projet d'intégration 1</h2>

								</div>

								<div class="copy">

									<p>Travail de groupe - Intégration d'une maquette</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideInte1">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/joansor/blueasy" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/blueasy-master/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Inte1" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Projet intégration n°1</span>
							<figure><a href="#modalInte1" 
									 class="image fit"><img src="images/BlueEasy.png" alt=""></a>
							</figure>

						</div>

									<!--Inté2-->
						<div class="modal" id="modalInte2">

							<div class="modal-content">

								<div class="header">

									<h2>Projet d'intégration 2</h2>

								</div>

								<div class="copy">

									<p>Travail de groupe - Intégration d'une maquette.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">HTML | CSS | Bootstrap</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideInte2">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/Integration-bootstrap" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/acs_mockup/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>

								<!--Wordpress-->
						<div class="modal" id="modalWordpress">

							<div class="modal-content">

								<div class="header">

									<h2>Thème Wordpress</h2>

								</div>

								<div class="copy">

									<p>Travail individuel - Création d'un thème Wordpress pour le blog de la promo.</p>

									<hr class="complinetop" style="width:10em; margin: auto;">
									<p class="comp">WAMP | Wordpress</p>
									<hr class="complinebot" style="width:10em; margin: auto;">

									<a href="#hideWordpress">Retour</a>
									<a class="vivify2 pulsate2" title="Lien vers GitHub" style="background: white;color: black;margin-left:10px;" href="https://github.com/HelixFix/Theme-Wordpress" target="_blank" rel="noopener noreferrer">GitHub</a>
									<a class="vivify2 pulsate2" title="Lien vers le projet" style="background: white;color: black;margin-left:10px;" href="https://jeromer401.promo-36.codeur.online/Wordpress/" target="_blank" rel="noopener noreferrer">Le projet</a>

								</div>

							</div>

							<div class="overlay"></div>

						</div>

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Inte2" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Projet intégration n°2</span>
							<figure><a href="#modalInte2" 
									 class="image fit"><img src="images/ACSMockup.png" alt=""></a>
							</figure>

						</div>

						<div class="col-4 col-6-medium col-12-small tooltip hover14" id="Wordpress" style="margin-top: 1.25em;">

							<span class="tooltiptext" style="top: -15px">Theme Wordpress</span>
							<figure><a href="#modalWordpress"  
									class="image fit"><img src="images/ThemeWordpress.png" alt=""></a></figure>

						</div>
						<!-- <div class="col-4 col-6-medium col-12-small">
							<a href="#" class="image fit"><img src="images/pic11.jpg" alt=""></a>
						</div>
						<div class="col-4 col-6-medium col-12-small">
							<a href="#" class="image fit"><img src="images/pic12.jpg" alt=""></a>
						</div> -->
					</div>

				</section>

			</article>

			<!-- Contact -->
			<article id="contact" class="panel">

				<header>

					<h2>Contactez-moi</h2>

				</header>

				<form id="form" action="index.php#contact" method="post" onsubmit="return validateForm()">

					<div>

						<div class="row">

							<div class="col-6 col-12-medium">

								<input id="name" type="text" name="name" placeholder="Nom" onkeyup=""/>
								<p class="error" id="error-name"></p>

							</div>

							<div class="col-6 col-12-medium">
								
								<input id="email" type="text" name="email" placeholder="Adresse électronique" onkeyup=""/>
								<p class="error" id="error-email"></p>

							</div>

							<div class="col-12">

								<input type="text" name="subject" placeholder="Sujet" />

							</div>

							<div id="message" class="col-12">

								<textarea name="message" placeholder="Message" rows="6" validateForm()></textarea>
								<p class="error" id="error-message"></p>

							</div>

							<div class="col-12">

								<input type="submit" value="Envoyer" />

							</div>

						</div>

					</div>

					<?php
					
						if(isset($_POST['email'])) {
						
							// EDIT THE 2 LINES BELOW AS REQUIRED
							$email_to = "jerome.rinner@gmail.com";
							$email_subject = $_POST['subject'];
							
						
							function died($error) {
								// your error code can go here
								echo "We are very sorry, but there were error(s) found with the form you submitted. ";
								echo "These errors appear below.<br /><br />";
								echo $error."<br /><br />";
								echo "Please go back and fix these errors.<br /><br />";
								die();
							}
						
						
							// validation expected data exists
							if(!isset($_POST['name']) ||
								!isset($_POST['email']) ||
								!isset($_POST['message'])) {
								died('We are sorry, but there appears to be a problem with the form you submitted.');       
							}
						
							
							$name = $_POST['name']; // required
							$email_from = $_POST['email']; // required
							$message = $_POST['message']; // required
							$subject = $_POST['subject'];
							$error_message = "";
							$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
						
						if(!preg_match($email_exp,$email_from)) {
							$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
						}
						
							$string_exp = "/^[A-Za-z .'-]+$/";
						
						if(!preg_match($string_exp,$name)) {
							$error_message .= 'The First Name you entered does not appear to be valid.<br />';
						}
						

						
						if(strlen($message) < 2) {
							$error_message .= 'The Comments you entered do not appear to be valid.<br />';
						}
						
						if(strlen($error_message) > 0) {
							died($error_message);
						}
						
							$email_message = "Form details below.\n\n";
						
							
							function clean_string($string) {
							$bad = array("content-type","bcc:","to:","cc:","href");
							return str_replace($bad,"",$string);
							}
						
							
						
							$email_message .= "Name: ".clean_string($name)."\n";
							$email_message .= "Email: ".clean_string($email_from)."\n";
							$email_message .= "Message: ".clean_string($message)."\n";
						
						// create email headers
						$headers = 'From: '.$email_from."\r\n".
						'Reply-To: '.$email_from."\r\n" .
						'X-Mailer: PHP/' . phpversion();
						@mail($email_to, $email_subject, $email_message, $headers);  
						
						
						
						?>
						
						
						<!-- include your own success html here -->
						
						<p style="margin-bottom: 0px;margin-top: 1em;">Merci de m'avoir contacté. Je prendrais contact avec vous très prochainement.</p>
						
						<?php

						}
						?>


				</form>
				
			</article>

	</div>

		<!-- Footer -->
		<div id="footer">

			<ul class="copyright" style="margin-bottom: 1em;">

				<li>&copy; 2020 <a title="Code du portfolio" href="https://github.com/HelixFix/MonPortfolio" target="_blank" rel="noopener noreferrer"><span>Jérôme
							Rinner</span></a></li>
				<li>|</li>
				<li>Design: <a href="http://html5up.net" target="_blank" rel="noopener noreferrer">HTML5 UP</a></li>
				<li>|</li>
				<li><a href="mentions-legales.html">Mentions légales </a></li>

			</ul>

		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://kwes.io/js/kwes.js"></script>
	<!--<script data-account="I7ZtVyShFg" src="https://accessibilityserver.org/widget.js"></script>-->


</body>

</html>