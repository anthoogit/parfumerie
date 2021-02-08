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

function getClientFromLogin($login){
	$db = dbConnect();
	$req = $db->prepare('SELECT id_client FROM utilisateur WHERE nom_utilisateur = ?');
	$req->execute(array($login));

	$clientfromlogin = $req->fetch();

	return $clientfromlogin;
}

function getClients(){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM client');
    $req->execute(array());

	return $req;
}

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

function verifCommande_ID($commande_id){
	$db = dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nb FROM commande WHERE noCommande = ?');
	$req->execute(array($commande_id));

	$res = $req->fetch();
	if($res['nb'] == 1){
		return true;
	}
	else
		return false;
}

function getCommandesClient($client_id){
	$db = dbConnect();
    $req = $db->prepare('SELECT noCommande, dateCommande, etatCommande FROM commande WHERE CodeClient = ?');
    $req->execute(array($client_id));

	return $req;
}

function getCommande($commande_id){
	$db = dbConnect();
    $req = $db->prepare('SELECT * FROM commande WHERE noCommande = ?');
	$req->execute(array($commande_id));
	
	$commande = $req->fetch();

	return $commande;
}

function getProduitsCommande($commande_id){
	$db = dbConnect();
    $req = $db->prepare('SELECT * FROM produit_commande NATURAL JOIN produit WHERE noCommande = ?');
	$req->execute(array($commande_id));

	return $req;
}

function setClient($cc, $n, $p, $ad, $fb, $insta, $m, $tel){
	$db = dbConnect();
	$req = $db->prepare("INSERT INTO Client (CodeClient, nom, prenom, adresse, facebook, instagram, email, numeroTel) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$req->execute(array($cc, $n, $p, $ad, $fb, $insta, $m, $tel));

	return $req;

}

function setUser($lo, $pd, $cc){
	$db = dbConnect();
	$req = $db->prepare("INSERT INTO utilisateur (nom_utilisateur, mot_de_passe, id_client) VALUES (?, ?, ?)");
	$req->execute(array($lo, $pd, $cc));

	return $req;

}

function editClient($n, $p, $ad, $fb, $insta, $m, $tel, $cc){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Client SET nom=?, prenom=?, adresse=?, facebook=?, instagram=?, email=?, numeroTel=? WHERE CodeClient=?");
	$req->execute(array($n, $p, $ad, $fb, $insta, $m, $tel, $cc));

	return $req;
}

function editCommande($d, $e, $p, $pt, $nc, $de, $da, $dp, $f, $promo, $c, $n){
	$db = dbConnect();
	$req = $db->prepare("UPDATE commande SET dateCommande=?, etatCommande=?, nbPoints=?, prixTotal=?, numColis=?, dateExpedition=?, dateArrivee=?, datePaiement=?, fraisLivraison=?, fraisService=?, promotion=? WHERE noCommande=?");
	$req->execute(array($d, $e, $p, $pt, $nc, $de, $da, $dp, $f, $promo, $c, $n));

	return $req;
}

function getCommandes(){
	$db = dbConnect();
    $req = $db->prepare('SELECT * FROM commande');
    $req->execute(array());

	return $req;
}