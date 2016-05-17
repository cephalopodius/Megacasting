
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

              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>


              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav element-menu">
                  <li><a href="../index.php"><img src="img/home.png" height="20px"></a></li>
                  <li><a href="offre.php">Les Offres</a></li>
                  <li><a href="article.php">Les Articles</a></li>
				  <li class="active"><a href="inscription.php">S'Inscrire<span class="sr-only">(current)</span></a></li>
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

  <div class="background-signin">
    <div class="container">
      <div class="emplacement-signin">
        <div class="row">
          <div class="col-md-offset-2 col-md-8">
            <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
          </div>
        </div>
        <!-- Renvois au webservice Ajout suer pour l'insertion -->
        <form action='../Controleur/AjoutUser.php' method='POST'>
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <div class="form-group">
                <label for="Nom">Nom</label>
                <input name="Nom" type="text" class="form-control" id="nom" placeholder="Nom">
              </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
              <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" name="Prenom" class="form-control" id="prenom" placeholder="Prénom">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-offset-2 col-md-7">
              <div class="form-group">
                <label for="Email">Email address</label>
                <input type="text" name="Email" class="form-control" id="email" placeholder="Enter email">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <div class="form-group">
                <label for="Password">Mot de passe</label>
                <input type="password" name="Password" class="form-control" id="password" placeholder="Mot de passe">
              </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
              <div class="form-group">
                <label for="Vpassword">Vérification mot de passe</label>
                <input type="password" name="Password1" class="form-control" id="vpassword" placeholder="Vérification mot de passe">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                <input type="phone" name="Telephone" class="form-control" placeholder="Téléphone" aria-describedby="basic-addon1">
              </div>
              <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-globe"></span>
                <input type="text" name="Adresse" class="form-control" placeholder="Adresse" aria-describedby="basic-addon1">
              </div>
            </div>
          </div>

          <SELECT name="Accreditation" size="1">

            <OPTION value='1'>Artiste</OPTION>
              <OPTION value='2'>Organisation</OPTION>
              <OPTION value='3'>Diffuseur</OPTION>
              </SELECT>


              <br/>
              <div class="row">
                <div class="col-md-offset-5 col-md-1">
                  <button type="submit" class="btn btn-primary">Envoyer mes informations</button>

                </div>
              </div>

            </div>
          </div>
        </div>

      </FORM>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>
