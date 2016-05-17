
<?php
require('../Controleur/cobdd.php');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="img/icon.png" />
    <link rel="icon" href="">

    <title>MegaCastings</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


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
					<li><a href="../index.php"><img src="img/home.png" height="20px"></a></li>
					<li class="active"><a href="#">Les Offres<span class="sr-only">(current)</span></a></li>
					<li><a href="article.php">Les Articles</a></li>
					<li><a href="inscription.php">S'Inscrire</a></li>
					<li><a href="connexion.php">Se Connecter</a></li>
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			</div>
			<div class="col-xs-offset-3 col-xs-3">

			<img class="logo-accueil" src="img/index/logo.png" width="115px"></img>
			</div>
			</div>
		</div>
      </header>
	  	<div class="row offre-header-back">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-2">
		<a href="offre.php?domainemetier=1">
			<div class="hexagon hexagon-bg-1 hexagon-2">
				<div class="hexTop"></div>
				<div class="hexBottom"></div>
			</div>
			</a>
		</div>
		<div class="col-xs-1">
		<a href="offre.php?domainemetier=2">
			<div class="hexagon hexagon-bg-2">
				<div class="hexTop"></div>
				<div class="hexBottom"></div>
			</div>
			</a>
		</div>
		<div class="col-xs-2">
			<div class="hexagon hexagon-bg-3 hexagon-2">
				<div class="hexTop"></div>
				<div class="hexBottom"></div>
			</div>
		</div>
		<div class="col-xs-1">
			<div class="hexagon hexagon-bg-4">
				<div class="hexTop"></div>
				<div class="hexBottom"></div>
			</div>
		</div>
		<div class="col-xs-2">
			<div class="hexagon hexagon-bg-5 hexagon-2">
				<div class="hexTop"></div>
				<div class="hexBottom"></div>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>
	<div class="row  content-offre-filtre-back">
	<div class="col-sm-4">
		<div class="content-offre-filtre">
		
		
      <?php
	/* filter system*/
      $reponse = $bdd->query('SELECT * FROM DomaineMetier');


        $i =1;
          while($donnees = $reponse->fetch())

				   {
                echo '
              <a href="offre.php?id='.$i.'">
              <button class="content-offre-filtre" onclick="'.$i.'='.$donnees['Identifiant'].'">'.$donnees['Libelle'].' </button>
              </a>';
              $i++;
           }

      ?>
	  <!-- $choix défini la requete SQl à effectuer pour délimiter les résultats afficher -->
							<div class="row">
							<div class="col-xs-12">
							<a href="offre.php?id=<?php $choix ?>">
							<button class="content-offre-filtre" action="<?php $choix=NULL ?>">
				            Enlever les Filtres

              </button>


				</a>
						</div>
					</div>
		</div>
	</div>
		<div class="col-sm-8">
			<div class="content-offre">
				<div class="row">
					<div class="col-sm-12 content-offre-liste-back">
		<?php
					if($_GET['id'] == null){
            $sql = $bdd->query('SELECT * FROM Offre WHERE Validation = 1 ORDER BY Identifiant');

          }else{
            $choix= $_GET["id"];
            $sql = $bdd->query('SELECT * FROM Offre  WHERE IdentifiantDomaine_Metier = '.$choix.' AND Validation = 1 ORDER BY Identifiant');

          }
          // var_dump($sql);
            while($donnees = $sql->fetch())
						{

		?>

             <a type="button" data-toggle="modal" data-target="#<?=$donnees['Identifiant'];?>">
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
             <div class="modal fade" id="<?=$donnees['Identifiant'];?>" role="dialog">
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
            }

					?>


					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="titre-articles-offre">
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

      <footer class="footer">
	  <a href="#"><div class="image-contact"></div></a>
	  <div class="row background-footer">
	  <div class="col-xs-3 content-footer">
		<div class="content-footer-titre">
		Contenu de notre site:<br/>
			</div>
		<a href="../index.php">Accueil</a><br/>
		<a href="Offre.php">Nos Offres</a><br/>
		<a href="article.php">Nos Articles</a><br/>
		<a href="#">Nous Contacter</a><br/>
		<a href="#">Mentions Légales</a>
	  </div>
	  <div class="col-xs-3 content-footer">
		<div class="content-footer-titre">
		Dernières offres postées:<br/>
			</div><?php
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
		<img class="logo-squid-footer" src="img/logoSquidSkills.png" height="100%">
	  </div>
	</div>
	  <div class="bandeau-footer">
	  Copyright | MegaProduction* | 2016 -
	  </div>
      </footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

  </body>
</html>
