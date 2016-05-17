
<?php
session_start();
require('Controleur/cobdd.php');
if($_SESSION == NULL){

  $_SESSION['Accreditation'] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="Vue/img/icon.png" />
    <link rel="icon" href="">

    <title>MegaCastings</title>

    <!-- Bootstrap core CSS -->
    <link href="Vue/css/bootstrap.min.css" rel="stylesheet">
    <link href="Vue/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script src="Vue/js/bootstrap.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <header>
		 <div class="container-fluid">

		  <div class="row header-back">
		  <div class="col-xs-6">
		   <nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav element-menu">
					<li class="active"><a href="index.php"><img src="Vue/img/home-active.png" height="20px"><span class="sr-only">(current)</span></a></li>
					<li><a href="Vue/offre.php">Les Offres</a></li>
					<li><a href="Vue/article.php">Les Articles</a></li>
          <?php

          if($_SESSION['Accreditation']==2){
          	echo'<li><a href="Vue/ProposerOffre.php">Proposer une offre</a></li> ';
          }
          ?>
					<li><a href="Vue/inscription.php">S'Inscrire</a></li>
          <li><a href="Vue/connexion.php">Se connecter</a></li>
          <?php

          if($_SESSION['Accreditation']==3){
            echo'<li><a href="Vue/Diffuseur.php">Génération flux RSS</a></li> ';
          }
          ?>
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			</div>
			<div class="col-xs-offset-3 col-xs-3">

			<img class="logo-accueil" src="Vue/img/logo.png" width="115px"></img>
			</div>
			</div>
		</div>
      </header>


	  <div class="row">
	  <div class="col-xs-12">
      <div id="myCarousel" class="carousel slide" data-interval="6500" data-ride="carousel">
    	<!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item carousel-fade">
                <img src="Vue/img/index/Carousel1.png" height="300" width="100%">
            </div>
            <div class="item carousel-fade">
			<img src="Vue/img/index/Carousel2.png" height="300" width="100%">

            </div>
            <div class="item carousel-fade">
			<img src="Vue/img/index/Carousel3.png" height="300" width="100%">
            </div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
	</div>
	</header>
	<div class="row">
		<div class="col-xs-12 introduction-index">
		<div class="introduction-index-bienvenue">Bienvenue,</div> Vous avez des compétences artistiques et êtes à la recherche d'un
		job ? Créez dès maintenant votre compte MegaCastings et accédez au plus grand annuaire d'annonces proposées par les plus grandes
		organisations du domaine artistique
		</div>
	</div>
	<div class="row">
	<div class="col-xs-12">
		<div class="titre-offres">
				<div class="row">
				<div class="col-xs-8 titre-offres-last">
				Dernières Offres
				</div>
				<div class="col-xs-4 titre-offres-categories">
				Catégories<br/>Populaires
				</div>
			</div>
		</div>
	</div>
	<!-- Rectangle contenant le contenu des offres -->
	<div class="row panel-offers">
		<div class="col-sm-8 col-xs-12">
		<!--Dernières offres-->
			<div class="last-offers">
				<div class="row">
				<?php

				$reponse = $bdd->query('SELECT TOP 10 * FROM Offre WHERE Validation = 1 ORDER BY Identifiant DESC');
      
            while ($donnees = $reponse->fetch())
				   {
             ?>

						<a type="button" data-toggle="modal" data-target="#myModal">
							<div class="col-xs-12 last-offers-list">
								<div class="row">
									<div class="col-xs-4 content-list-offres content-list-offres-titre">
										<?php echo $donnees['Intitule']; ?>
									</div>
									<div class="col-xs-8 content-list-offres">
										<?php echo substr($donnees['DescriptionPoste'], 0, 200).'...'; ?>
									</div>
								</div>
							</div>
						</a>
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal">&times;</button>
										 <h4 class="modal-title"><?php echo $donnees['Intitule']; ?></h4>
									 </div>
									 <div class="modal-body">
                     <u><b>  Description du poste</b></u>
                       <p><?php echo $donnees['DescriptionPoste']; ?></p>
                       <u><b>Durée de la diffusion</b></u>
                       <p><?php echo $donnees['DureeDiffusion']; ?></p>
                       <u><b>Nombre de poste à pourvoir</b></u>
                       <p><?php echo $donnees['NbPostes']; ?></p>
                       <u><b>Profile recherché</b></u>
                       <p><?php echo $donnees['DescriptionProfil']; ?></p>
                       <u><b>Numero de téléphone</b></u>
                       <p><?php echo $donnees['Telephone']; ?></p>
                       <u><b>Référence de l'offre</b></u>
                       <p><?php echo $donnees['Reference']; ?></p>
                       <u><b>Email de l'auteur</b></u>
                       <p><?php echo $donnees['Email']; ?></p>
                     <u><b>Localisation</b></u>
                       <p><?php echo $donnees['Localisation']; ?></p>
									 </div>
									 <div class="modal-footer">
										 <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									 </div>
								 </div>
							 </div>
						</div>
				   <?php

				   } ?>

				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
		<!--Meilleures catégories-->

					<div class="best-offers">
					<div class="row">
		<?php
				   $i = 1;

          $reponse = $bdd->query('SELECT * FROM DomaineMetier');
          $donnees = 0;

              while ($donnees = $reponse->fetch())
				   {?>
					<a href="Vue/offre.php?id=<?php echo $donnees['Identifiant']; ?>">
					<div class="col-xs-12 best-offer-<?=$i?>">
					<?php echo $donnees['Libelle']; ?>
					</div>
					</a>
				   <?php
				   $i++;
				   } ?>
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="titre-articles">
				Articles
			</div>
		</div>
	</div>
	<!-- Rectangle contenant le contenu des articles -->
	<div class="row panel-articles">
		<!--Article le plus lu-->
		<div class="col-xs-5 famous-article">
		<div class="row">
		<div class="col-xs-12 famous-article-titre">
		Bien rédiger son CV
		</div>
		<div class="col-xs-12 famous-article-description">
		Le CV est un des éléments clés de la réussite de vos candidatures, et pourtant les bases pour rédiger un bon CV ne sont pas toujours respectées. Voici donc en ...<a href="#">lire la suite</a>
		</div>
		</div>
		</div>
		<div class="col-xs-7">
			<div class="row">
				<!--Article Aléatoire-->
				<div class="col-xs-12 ramdom-article">
					<div class="row">
						<div class="col-xs-12 ramdom-article-titre">
						Titre de l'article
						</div>
						<div class="col-xs-12 ramdom-article-description">
						Le CV est un des éléments clés de la réussite de vos candidatures, et pourtant les bases pour rédiger un bon CV ne sont pas toujours respectées. Voici donc en ...<a href="#">lire la suite</a>

						</div>
					</div>
				</div>
				<!--Derniers Articles-->
				<div class="col-xs-12">
					<div class="row">
						<a href="#">
						<div class="col-xs-4 last-article-one">
						Tutoriels
						</div>
						</a>
						<a href="#">
						<div class="col-xs-4 last-article-two">
						Interviews
						</div>
						</a>
						<a href="#">
						<div class="col-xs-4 last-article-three">
						Actualités
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container marketing">
	      <div class="row">
        <div class="col-lg-4 description-index">
          <img src="Vue/img/index/logo-simple.png" height="140">
          <h2>Le secteur d’activité</h2>
          <p>Médias, cinéma, musique, théâtre, danse... Les métiers de l'audiovisuel et du spectacle attirent de plus en plus de jeunes. Ils deviennent aussi de plus en plus précaires... Un talent certain, une formation de qualité, mais aussi de la ténacité et de la volonté sont indispensables.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 description-index">
          <img src="Vue/img/index/icon-per.png" height="140">
          <h2>MegaProduction</h2>
          <p>MegaProduction est une société de production créée en janvier 2003. Cette production officie dans plusieurs domaines culturels : le spectacle vivant, le secteur de l’image et celui de la musique. MegaProduction a su s’entourer de personnes qualifiées dans chacun de ces domaines qui aujourd’hui encore sont des partenaires proches.</p>
       </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 description-index">
          <img src="Vue/img/index/icon-terre.png" height="140">
          <h2>Suivi assuré</h2>
          <p>Depuis un peu plus de 10 ans, MegaProduction accompagne les artistes, qu’ils soient danseurs, musiciens, chorégraphes, compositeurs, réalisateurs ou photographes. Le bureau leur apporte un soutien en administration, en diffusion, met à leur disposition du matériel et des outils de travail, les accompagne sur les dates de tournées, gère leurs diffusions et leurs communications.</p>
         </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
		</div>
	</div>

      <footer class="footer">
	  <a href="#"><div class="image-contact"></div></a>
	  <div class="row background-footer">
	  <div class="col-xs-3 content-footer">
		<div class="content-footer-titre">
		Contenu de notre site:<br/>
			</div>
		<a href="#">Accueil</a><br/>
		<a href="Vue/offre.php">Nos Offres</a><br/>
		<a href="Vue/article.php">Nos Articles</a><br/>
		<a href="#">Nous Contacter</a><br/>
		<a href="#">Mentions Légales</a>
	  </div>
	  <div class="col-xs-3 content-footer">
		<div class="content-footer-titre">
		Dernières offres postées:<br/>
			</div>
			<?php
  $sql = $bdd->query('SELECT TOP 5 * FROM  Offre ORDER BY Identifiant DESC ');

      $donnees = $sql->fetch();
        while($donnees = $sql->fetch())
				   {?>
						<a type="button" data-toggle="modal" data-target="#myModal<?=$donnees?>">
		<?php echo $donnees['Intitule']; ?>
						</a><br/>
						<div class="modal fade" id="myModal<?=$donnees?>" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal">&times;</button>
										 <h4 class="modal-title"><?php echo $donnees['Intitule']; ?></h4>
									 </div>
									 <div class="modal-body">
                     <u><b>Description du poste</b></u>
                       <p><?php echo $donnees['DescriptionPoste']; ?></p>
                       <u><b>Durée de la diffusion</b></u>
                       <p><?php echo $donnees['DureeDiffusion']; ?></p>
                       <u><b>Nombre de poste à pourvoir</b></u>
                       <p><?php echo $donnees['NbPostes']; ?></p>
                       <u><b>Profile recherché</b></u>
                       <p><?php echo $donnees['DescriptionProfil']; ?></p>
                       <u><b>Numero de téléphone</b></u>
                       <p><?php echo $donnees['Telephone']; ?></p>
                       <u><b>Référence de l'offre</b></u>
                       <p><?php echo $donnees['Reference']; ?></p>
                       <u><b>Email de l'auteur</b></u>
                       <p><?php echo $donnees['Email']; ?></p>
                     <u><b>Localisation</b></u>
                       <p><?php echo $donnees['Localisation']; ?></p>
									 </div>
									 <div class="modal-footer">
										 <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									 </div>
								 </div>
							 </div>
						</div>
				   <?php

				   } ?>
	  </div>
	  <div class="col-xs-3 content-footer">
		<div class="content-footer-titre">
			Derniers articles postés:<br/>
			</div>
		<a href="#">Titre de l'article 1</a><br/>
		<a href="#">Titre de l'article 2</a><br/>
		<a href="#">Titre de l'article 3</a><br/>
		<a href="#">Titre de l'article 4</a><br/>
		<a href="#">Titre de l'article 5</a>
	  </div>
	  <div class="col-xs-3 content-footer">
		<img class="logo-squid-footer" src="Vue/img/logoSquidSkills.png" height="100%">
	  </div>
	</div>
	  <div class="bandeau-footer">
	  Copyright | MegaProduction* | 2016 -
	  </div>
      </footer>



  </body>
</html>
