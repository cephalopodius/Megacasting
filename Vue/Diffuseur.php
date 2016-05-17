<?php
  require('../Controleur/cobdd.php');
  
// Set the content type to be XML, so that the browser will   recognise it as XML.
header("content-type: application/xml; charset=ISO-8859-15");

// "Create" the document.
$xml = new DOMDocument("1.0", "ISO-8859-15");

// Create some elements.
$xml_rss = $xml->createElement("rss");
$xml_rss->setAttribute("version", "2.0");

$xml_channel = $xml->createElement("channel");
$xml_channel->appendChild($xml->createElement("title", "MegaCastings"));
$xml_channel->appendChild($xml->createElement("link", "http://172.16.2.21/Offre.php"));
$xml_channel->appendChild($xml->createElement("description", "Offers RSS stream."));

$listOffers = $bdd->query('SELECT * FROM Offre WHERE Validation = 1 ORDER BY Identifiant DESC')->fetchAll();

foreach ($listOffers as $item) {
	
    $xml_item = $xml->createElement("item");
    $xml_item->appendChild($xml->createElement("title", utf8_decode($item["Intitule"])));
    $xml_item->appendChild($xml->createElement("link", "http://172.16.2.21/Offre.php?identifiant=" . $item["Identifiant"]));
    $xml_item->appendChild($xml->createElement("DescriptionPoste", utf8_decode($item["DescriptionPoste"])));
    $xml_item->appendChild($xml->createElement("Reference",$item["Reference"]));
    $xml_item->appendChild($xml->createElement("DateDebutContrat", $item["DateDebutContrat"]));
	$xml_item->appendChild($xml->createElement("DureeDiffusion", $item["DureeDiffusion"]));
    $xml_item->appendChild($xml->createElement("DatePublication", $item["DatePublication"]));
	$xml_item->appendChild($xml->createElement("NbPostes", $item["NbPostes"]));
    $xml_item->appendChild($xml->createElement("DureeDiffusion", $item["DureeDiffusion"]));
    $xml_item->appendChild($xml->createElement("DescriptionProfil", utf8_decode($item["DescriptionProfil"])));
    $xml_item->appendChild($xml->createElement("TypeContrat", $item["TypeContrat"]));
	$xml_item->appendChild($xml->createElement("Metier", $item["IdentifiantMetier"]));
    $xml_item->appendChild($xml->createElement("Domaine", $item["IdentifiantDomaine_Metier"]));
    $xml_item->appendChild($xml->createElement("Localisation", $item["Localisation"]));
	$xml_item->appendChild($xml->createElement("Email", $item["Email"]));
	$xml_item->appendChild($xml->createElement("Telephone", $item["Telephone"]));
	
   $xml_channel->appendChild($xml_item);
}

$xml_rss->appendChild($xml_channel);
$xml->appendChild($xml_rss);

// Parse the XML.
print $xml->saveXML();
