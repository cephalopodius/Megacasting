<?php

if (isset($_POST)){

  require('cobdd.php');

  $Intitule=$_POST['Intituler'];
  $Localisation=$_POST['Localisation'];
  $DateDebutContrat =$_POST['DateDebutContrat'];
  $DescriptionPoste=$_POST['DescriptionPoste'];
  $DescriptionProfileRecherche=$_POST['DescriptionProfileRecherche'];
  $NbPostes=$_POST['NbPostes'];
  $Telephone=$_POST['Telephone'];
  $Email=$_POST['Email'];
  $DureeDiffusion=$_POST['DureeDiffusion'];
  $DomaineMetier=$_POST['DomaineMetier'];
  $Metier=$_POST['Metier'];
  $TypeContrat=$_POST['TypeContrat'];
  
  $Date = date('Y-m-d');
//creation d'une chaine aleatoire pour creer la reference
  function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
  {
      $nb_lettres = strlen($chaine) - 1;
      $generation = '';
      for($i=0; $i < $nb_car; $i++)
      {
          $pos = mt_rand(0, $nb_lettres);
          $car = $chaine[$pos];
          $generation .= $car;
      }
      return $generation;
  }
  $Reference = chaine_aleatoire(8) ;
//recuperation de la date et conversion pour insérer dans bdd (sans les heures)

    $req = $bdd->prepare('INSERT INTO Offre(Intitule,Reference, DatePublication, DureeDiffusion, DateDebutContrat, NbPostes, DescriptionPoste, DescriptionProfil, Telephone, Email, Localisation, Validation , IdentifiantType_Contrat , IdentifiantMetier ,IdentifiantDomaine_Metier) VALUES(:Intitule,:Reference, :Date, :DureeDiffusion, :DateDebutContrat, :NbPostes, :DescriptionPoste, :DescriptionProfil, :Telephone, :Email, :Localisation, 0 , :IdentifiantType_Contrat , :IdentifiantMetier ,:IdentifiantDomaine_Metier)');

   $req->execute(array(

      'Intitule'=>$Intitule,
      'Reference'=>$Reference,
	  'DureeDiffusion'=>$DureeDiffusion,
	  'DateDebutContrat'=> $DateDebutContrat,
      'NbPostes'=>$NbPostes,   
      'DescriptionPoste'=>$DescriptionPoste,
      'DescriptionProfil'=>$DescriptionProfileRecherche,  
      'Telephone'=>$Telephone,
      'Email'=>$Email,
	  'Date' => $Date ,
      'Localisation'=>$Localisation,
	  'IdentifiantType_Contrat'=>$TypeContrat,
      'IdentifiantMetier'=>$Metier,
	  'IdentifiantDomaine_Metier'=>$DomaineMetier    
	  
    	));
	 header('Location: ../index.php');
}
  else
  {
      header('Location: connexion.php');
  }
  ?>
