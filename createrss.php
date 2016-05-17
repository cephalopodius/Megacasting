<?php
 
function update_fluxRSS() {
	
	
	$xml = '<?xml version="1.0" encoding="UTF-8"?>';
	$xml .= '<rss version="2.0">';
	$xml .= '<channel>';
	$xml .= ' <title>flux RSS MegaCasting !</title>';
	$xml .= ' <link>localhost/megacasting/index.php</link>';
	$xml .= ' <description>Voici le Flux RSS du site Megacasting</description>';
	$xml .= ' <language>fr</language>';
	
	
	
	$index_selection = 0;
	$limitation = 25;
	
	$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$reponse = $bdd->prepare('SELECT * FROM offrecasting ORDER BY idOffre DESC LIMIT :index_selection, :limitation') or die(print_r($bdd->errorInfo()));
	$reponse->bindParam('index_selection', $index_selection, PDO::PARAM_INT);
	$reponse->bindParam('limitation', $limitation, PDO::PARAM_INT);
	$reponse->execute();
	
	while ($donnees = $reponse->fetch())
	{
	$xml .= '<item>';
	$xml .= '<title>'.$donnees['titre'].'</title>';
	$xml .= '<pubDate>'.$donnees['DateDebutPublication'].'</pubDate>';
	$xml .= '<description>'.$donnees['description'].'</description>';
	$xml .= '</item>';
	}
	
	$reponse->closeCursor();
	
	$xml .= '</channel>';
	$xml .= '</rss>';
	
	$fp = fopen("flux_rss.xml", 'w+');
	
	fputs($fp, $xml);
	
	fclose($fp);
 
} 
?>