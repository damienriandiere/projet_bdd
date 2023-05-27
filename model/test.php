<?php

require_once("MysqlConnexion.php");

// ---------------------------------------------------------------- 
// Test de la classe AdresseDAO
// ----------------------------------------------------------------
require_once("Adresse.php");
require_once("AdresseDAO.php");

$adresse = new Adresse();
$adresse->init(1, "rue de la paix", "75000", "Paris", "France");
AdresseDAO::getInstance()->insert($adresse);
$adresse->setCode_postal("75001");
AdresseDAO::getInstance()->update($adresse);
//print_r(AdresseDAO::getInstance()->findAll());
echo "last id : ";
print_r(AdresseDAO::getInstance()->findLastId()[0]->getId_adresse());
echo "last id : ";
// ----------------------------------------------------------------
// Test de la classe TelephoneDAO
// ----------------------------------------------------------------
require_once("Telephone.php");
require_once("TelephoneDAO.php");

$telephone = new Telephone();
$telephone->init(1, "0606060606", "0606060606");
TelephoneDAO::getInstance()->insert($telephone);
$telephone->setNumero("0707070707");
TelephoneDAO::getInstance()->update($telephone);
//print_r(TelephoneDAO::getInstance()->findAll());


// ----------------------------------------------------------------
// Test de la classe ClientDAO
// ----------------------------------------------------------------
require_once("Client.php");
require_once("ClientDAO.php");



?>