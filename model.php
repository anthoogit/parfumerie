<?php

function dbConnect(){
	try{
		$db = new PDO('mysql:host=localhost;dbname=parfumerie', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		// $db->exec('SET NAMES utf8');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	return $db;
}

function getProduits(){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM produit');
	$req->execute(array());

	return $req;
}

function getClient($id){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM client WHERE CodeClient = ?');
	$req->execute(array($id));

	$client = $req->fetch();

	return $client;
}

function getCadeau(){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM cadeau');
	$req->execute(array());

	return $req;
}


function getClients(){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM client');
    $req->execute(array());

    return $req;
function verifClient_ID($id){
	$db = dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nb FROM client WHERE CodeClient = ?');
	$req->execute(array($id));

	$res = $req->fetch();
	if($res['nb'] == 1){
		return true;
	}
	else
		return false;
}
