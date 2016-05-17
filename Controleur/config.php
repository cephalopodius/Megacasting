<?php
require('cobdd.php');

  if (isset($_POST)){


      $req = $bdd->prepare('SELECT COUNT(*) FROM Utilisateur WHERE Password = :Password AND Email = :Email'); // Je compte le nombre d'entrée ayant pour mot de passe et login ceux rentrés
      $req->execute(array(
      'Password'=> $_POST['Password'],
       'Email'=> $_POST['Email']
));

    $data = $req->fetch();



  if($data != 0) { // On as trouvé un membre avec ce couple mdp, login

    $req = $bdd->prepare(' SELECT Accreditation FROM Utilisateur WHERE Email = :Email');
    $req->execute(array(
    'Email'=> $_POST['Email'],
));
  $data = $req->fetch();
$Accreditation = $data["Accreditation"];


       session_start();
     	$_SESSION['Email'] =$Email;
      $_SESSION['Accreditation'] = $Accreditation[0];
       header('Location: ../index.php');
  }
  else { // Personne n'existe dans la table avec ce couple mdp, login

       echo 'le login et le mot de passe rentrés sont invalides';
  }


}
?>
