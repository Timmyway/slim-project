<!DOCTYPE html>
<html>
	<head>
		<!-- Metas -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:title" content="VOS DEVIS TRAVAUX" />		
		<meta property="og:url" content="https://budgetdevis.com/travaux" />
		<meta property="og:image" content="http://budgetdevis.com/travaux/images/favicon.png" />
		<meta property="og:description" content="Faire vos devis travaux gratuit" />				
		
		<title>VOS DEVIS TRAVAUX</title>
		
		<link rel="icon" type="icon" sizes="32x32" href="./images/favicon-32x32.ico">		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="assets/css/style.css">		
	</head>

	<body>
		<div id="app" v-cloak>
			<!-- Barre de debug -->
            <div v-if="debug" class="debug" style="background: #333; position: fixed; bottom: 0; left: 0; top: 0; z-index: 999; font-size: 0.8; color: white; opacity: .9; overflow: auto; max-width: 20%">
                <button @click="debug = !debug" class="button is-small is-danger">Debug</button>
                <div>
                    <div v-for="(formValue,formName) in $v.form">
                        <b>{{ formName }}</b><br>
                        {{ formValue }}
                    </div>
                    <div>
                        <ul v-for="(value,name,index) in form" :key="name">
                            <li style="list-style-type: none">{{ index+1 }}. {{ name }} : {{ value }}</li>                        
                        </ul>
                        12. {{ departement }}
                    </div>
                </div>
            </div>
			<div>
				<header class="">
					<div class="navbar ">
						<div class="container">
							<a href="#">
								<img src="images/logo.png" class="img-logo">
							</a>
							<p class="text-white">Demandez votre devis travaux gratuit en 1 minute</p>
						</div>
					</div>
				</header>
				<div class="banner">
					<!-- <img src="images/header.jpg" class="banner"> -->
					<div class="mycontainer">
						<h1 class="desktop-only">Devis gratuit <br> sous 24 heures <br> <span>20 000</span> professionnels</h1>
						<!-- Formulaire -->
						<div class="form" v-if="!form.isSent">
							<!-- <h3> Avez-vous un projet à venir ?</h3> -->
							<?php require_once('form.php'); ?>
						</div>
						<div v-else class="container is-flex align-items-center msg--thanks bg-primary">
                        	<h2 class="subtitle font-weight-bold text-white">Merci pour la confiance que vous nous portez, nous vous contacterons très bientôt</h2>
                    	</div>
					</div>
				</div>

				<div class="bg">
					<div class="presentation">
						<img src="images/top.png">
						<p class="black">Trouvez des <strong>artisans qualifiés</strong> et professionnels pour assurer la réalisation de vos projets</p>
					</div>
					<div class="blogue">
						<div class="container">
							<div class="img">
								<img src="images/contrat.jpg" alt="Des artisans qualifiés à votre service">
							</div>
							<div class="desc">
								<h2>Nous sommes <br> à vos côtés ! <br> <small>Nous vous accompagnons à toutes les étapes du parcours</small></h2>
								<a href="#" class="btn--cta btn">Nous contacter</a>
							</div>
						</div>
						<div class="bg-fond"></div>
					</div>

					<div class="etapes">
						<div class="container">
							<article>
							<div class="img">
								<img src="images/carnet.png">
							</div>
							<div class="caption">
								<h3>Devis travaux en détail</h3>
								<p>Profitez de votre estimation travaux gratuite en quelques minutes seulement.</p>
							</div>
						</article>
						<article>
							<div class="img">
								<img src="images/chef_de_chantier.png">
							</div>
							<div class="caption">
								<h3>Des artisans de qualité</h3>
								<p>La qualité de nos artisans est assurée, ce sont des experts avec en moyenne 6 ans d'exercices dans leur profession. Les retours des clients sont excellents.</p>
							</div>
						</article>
						<article>
							<div class="img">
								<img src="images/presentation.png">
							</div>
							<div class="caption">
								<h3>Accompagnement de A à Z</h3>
								<p>Un conseiller est mis à votre disposition afin que vous soyez bien suivi dans votre projet.</p>
							</div>
						</article>
						</div>
					</div>
				</div>

				<div class="travaux">
					<h2>Besoin d'un entrepreneur <br/>vérifié pour vos travaux ? </h2>
					<p>Découvrez tout ce dont vous avez besoin pour bien démarrer.</p>
					<p><a href="#" class="btn--cta btn">Nous contacter</a></p>
				</div>

				<div class="jumbotron custume-banner">
					<h2>Nous réalisons tout type de travaux</h2>
					<div class="liste-article">
						<article>
							<img src="./images/peinture.jpg" alt="Peinture">
							<p>Peinture</p>
						</article>
						<article>
							<img src="./images/renovation.jpg" alt="Rénovation">
							<p>Rénovation</p>
						</article>
						<article>
							<img src="./images/volet-et-fenetres.jpg" alt="Volet & fenêtres">
							<p>Volet & fenêtres</p>
						</article>
						<article>
							<img src="./images/chauffage-et-radiateur.jpg" alt="Chauffage et radiateurs">
							<p>Chauffage et radiateurs</p>
						</article>
						
					</div>
					<div class="liste-other">
						<div id="other" class="liste-article">
							<article>
								<img src="./images/demolition-et-evacuation.jpg" alt="Démolition et évacuation">
								<p>Démolition et évacuation</p>
							</article>
							<article>
								<img src="./images/salle-de-bain.jpg" alt="Salle de bain et sanitaire">
								<p>Salle de bain et sanitaire</p>
							</article>
							<article>
								<img src="./images/nettoyage.jpg" alt="Nettoyage">
								<p>Nettoyage</p>
							</article>
							<article>
								<img src="./images/bricolage.jpg" alt="Bricolage">
								<p>Bricolage</p>
							</article>
						</div>
					</div>
					
					<div class="voir-plus">
						<button class="btn--cta btnDown">Voir plus</button>
						<button class="btn--cta  btnUp">Voir moins</button>
					</div>
				</div>
				<footer class="footer">
					<ul class="container">
						<li class="parent ">
							<a id="modale-legale" href="#" style="color:#ededed;" @click="view.legalModal = true">
								<div class="main-menu-title"><span>Mentions légales et politique de confidentialité</span></div>
							</a>
						</li>						
						<li class="parent ">
							<a id="confidense" href="#" style="color:#ededed;" @click.prevent="scrollToTop"><span>2020 BUDGETDEVIS.COM</span></a>
						</li>
					</ul>
				</footer>

				<!-- Footer Modal for legal text -->
				<transition 
					enter-active-class="animate__animated animate__bounceInLeft" 
					leave-active-class="animate__animated animate__bounceOutRight"
				>
					<div id="animatedModal" class="page-popop" v-if="view.legalModal" @keydown.esc="view.legalModal = false">
						<div class="legale-content">
							<button type="button" class="close-animatedModal" @click="view.legalModal = false">
								<img src="images/closebt.svg ">
							</button> 
							<div class="header">
								<h4 class="title">CONDITIONS GÉNÉRALES</h4>
							</div>

							<!-- Modal body -->
							<div class="body default-skin">
							<?php include 'templates/legal.php'; ?>
							</div>
						</div>
					</div>
				</transition>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/animatedModal.min.js"></script> -->
		<script type="text/javascript" src="js/popper.js"></script>
		<script type="text/javascript" src="js/app.v2.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="./assets/js/validators.min.js"></script>
		<script src="./assets/js/vuelidate.min.js"></script>		
		<script src="./assets/js/lodash.debounce/index.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

		<script>
        	<?php include('category_leads.php'); ?>        
			var categoryLeads = <?= $categoryLeads ?>;
			var abtest = <?= isset($_GET['format']) ? '"' . $_GET['format'] . '"' : '""' ?>;
			var prefills = {
				email: <?= isset($_GET['email']) ? '"' . $_GET['email'] . '"' : '""' ?>,
				firstname: <?= isset($_GET['fname']) ? '"' . $_GET['fname'] . '"' : '""' ?>,
				lastname: <?= isset($_GET['lname']) ? '"' . $_GET['lname'] . '"' : '""' ?>,
				zipcode: <?= isset($_GET['zcode']) ? '"' . $_GET['zcode'] . '"' : '""' ?>,
				phone: <?= isset($_GET['phone']) ? '"' . $_GET['phone'] . '"' : '""' ?>,
				civ: <?php 
				if (isset($_GET['civ'])) 
				{
					if ( $_GET['civ'] == 'monsieur' || $_GET['civ'] == 'madame' ) 
					{
						echo '"' . $_GET['civ'] . '"';    
					} else {
						echo "''";
					}
				} else {
					echo "''";
				}
				?>,
				affiliateID: <?= isset($_GET['a']) ? '"' . $_GET['a'] . '"' : '0' ?>,
			}
    	</script>
    	<script src="./assets/js/app.js" defer>

		<script type="text/javascript">		
        	$('.content-confirmation').click(function(){
        		$(this).removeClass('active');
        	})

		</script>
	</body>
</html>