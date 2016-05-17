<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
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
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <header>
		 <div class="container-fluid">

		  <div class="row">
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
					<li><a href="offre.php">Les Offres</a></li>
					<li><a href="article.php">Les Articles</a></li>
					<li><a href="inscription.php">S'Inscrire<span class="sr-only">(current)</span></a></li>
					<li class="active"><a href="connexion.php">Se Connecter</a></li>
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
	  <div class="background-login">
 <div class="container">

      <form class="form-signin emplacement-login" action="../Controleur/config.php"  method='POST'>
        <label for="Identifiant" class="sr-only">Email</label>
        <input type="email" id="Email" name="Email" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      </form>

    </div> <!-- /container -->
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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
