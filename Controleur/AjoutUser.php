<?php

if (isset($_POST)){


  require('cobdd.php');
  
  $Nom=$_POST['Nom'];
  $Prenom=$_POST['Prenom'];
  $Password=$_POST['Password'];
  $Password1=$_POST['Password1'];
  $Email=$_POST['Email'];
  $Adresse=$_POST['Adresse'];
  $Accreditation=$_POST['Accreditation'];
  $Telephone=$_POST['Telephone'];


if($Password1 == $Password){

  if ($Accreditation == "1"){

    $req = $bdd->prepare('INSERT INTO Utilisateur(Nom, Prenom, Password, Adresse, Email, Accreditation, Telephone, Validation) VALUES(:Nom, :Prenom, :Password, :Adresse, :Email, :Accreditation, :Telephone, 1)');
    $req->execute(array(
    	'Nom' => $Nom,
    	'Prenom' => $Prenom,
    	'Password' => $Password,
    	'Adresse' => $Adresse,
    	'Email' => $Email,
    	'Accreditation' => $Accreditation,
    	'Telephone' => $Telephone
    	));
		header('Location: index.php');

  }

  if ($Accreditation != "1"){
    $req = $bdd->prepare('INSERT INTO Utilisateur(Nom, Prenom, Password, Adresse, Email, Accreditation, Telephone, Validation) VALUES(:Nom, :Prenom, :Password, :Adresse, :Email, :Accreditation, :Telephone, 0)');
    $req->execute(array(
      'Nom' => $Nom,
      'Prenom' => $Prenom,
      'Password' => $Password,
      'Adresse' => $Adresse,
      'Email' => $Email,
      'Accreditation' => $Accreditation,
      'Telephone' => $Telephone
      ));
	header('Location: ../index.php');
  }

}
  else
  {
      header('Location: ../inscription.php');
  }


}
  ?>
