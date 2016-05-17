<?php

require('../Controleur/cobdd.php');

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
					<li class="active"><a href="inscription.php">S'Inscrire<span class="sr-only">(current)</span></a></li>
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

      <form class="form-signin emplacement-login" action="../Controleur/AjoutOffre.php"  method='POST'>
        <label for="Identifiant" class="sr-only">Intituler</label>
        <input type="text" id="Intituler" name="Intituler" class="form-control" placeholder="Intituler" required autofocus>

        <label for="Localisation" class="sr-only">Localisation</label>
        <input type="text" id="Localisation" name="Localisation" class="form-control" placeholder="Localisation" required>

        <label for="Email" class="sr-only">Date du debut du contrat</label>
        <input type="date" id="DateDebutContrat" name="DateDebutContrat" class="form-control" placeholder="Date du debut du contrat" required autofocus>

        <label for="DescriptionPoste" class="sr-only">Description du poste</label>
        <input type="text" id="DescriptionPoste" name="DescriptionPoste" class="form-control" placeholder="Description du Poste" required autofocus>

        <label for="DescriptionProfileRecherche" class="sr-only">Description des Profiles Recherchés</label>
        <input type="text" id="DescriptionProfileRecherche" name="DescriptionProfileRecherche" class="form-control" placeholder="Description des Profiles Recherchés" required>

        <label for="NbPoste" class="sr-only">Nombre de poste</label>
        <input type="number" id="NbPostes" name="NbPostes" class="form-control" placeholder="Nombre de postes" required>

        <label for="Telephone" class="sr-only">Téléphone</label>
        <input type="phone" id="Telephone" name="Telephone" class="form-control" placeholder="Telephone" required autofocus>

        <label for="Email" class="sr-only">Email</label>
        <input type="Email" id="Email" name="Email" class="form-control" placeholder="Email" required autofocus>

        <label for="Email" class="sr-only">Durée de diffusion de l'offre</label>
        <input type="number" id="DureeDiffusion" name="DureeDiffusion" class="form-control" placeholder="Durée de diffusion de l'offre" required autofocus>


<!-- list dynamique type contrat -->
            <SELECT name="TypeContrat"  class='form-control'>
          <?php
          $reponse = $bdd->query('SELECT Libelle,Identifiant FROM TypeContrat');
    foreach ($reponse as $donnees):
        echo '<OPTION value="' . $donnees['Identifiant'] . '">' . $donnees['Libelle'] . '</OPTION>';
    endforeach;
    ?>
          ?>
          </SELECT>
<!--
Liste domaineMetier dynamique -->
<SELECT name="DomaineMetier"  class='form-control'>
<?php
  $reponse = $bdd->query('SELECT Libelle,Identifiant FROM  DomaineMetier');

    while ($data = $reponse->fetch()){

      echo '<OPTION value="' . $data['Identifiant'] . '">' . $data['Libelle'] . '</OPTION>   ';

  }
 ?>
</SELECT>

<!-- Liste Metier dynamique -->

<SELECT name="Metier"  class='form-control'>
<?php
$reponse = $bdd->query('SELECT Libelle,Identifiant FROM  Metier');

  while ($data = $reponse->fetch()){

    echo '<OPTION value="' . $data['Identifiant'] . '">' . $data['Libelle'] . '</OPTION>   ';



}
?>
</SELECT>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Proposer</button>
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
		<a href="index.php">Accueil</a><br/>
		<a href="offre.php">Nos Offres</a><br/>
		<a href="article.php">Nos Articles</a><br/>
		<a href="#">Nous Contacter</a><br/>
		<a href="#">Mentions Légales</a>
	  </div>
	  <div class="col-xs-3 content-footer">
		<div class="content-footer-titre">
		Dernières offres postées:<br/>
			</div>
		<a href="#">Titre de l'offre 1</a><br/>
		<a href="#">Titre de l'offre 2</a><br/>
		<a href="#">Titre de l'offre 3</a><br/>
		<a href="#">Titre de l'offre 4</a><br/>
		<a href="#">Titre de l'offre 5</a>
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
