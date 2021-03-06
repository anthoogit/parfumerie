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

function getCadeauxCommande($commande_id){
	$db = dbConnect();
    $req = $db->prepare('SELECT nomCadeau, quantite, cadeau_commande.prixFidelite FROM cadeau_commande INNER JOIN cadeau ON cadeau_commande.noCadeau = cadeau.noCadeau WHERE noCommande = ?');
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

function setCommande($noCommande, $nbP, $pt, $numC, $fl, $fs, $promo, $cc){
	$db = dbConnect();
	$req = $db->prepare("INSERT INTO Commande (noCommande, dateCommande, etatCommande, nbPoints, prixTotal, numColis, fraisLivraison, fraisService, promotion, codeClient) VALUES (?, DATE(NOW()), 0, ?, ?, ?, ?, ?, ?, ?)");
	$req->execute(array($noCommande, $nbP, $pt, $numC, $fl, $fs, $promo, $cc));

	return $req;
}

function editClient($n, $p, $ad, $fb, $insta, $m, $tel, $cc){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Client SET nom=?, prenom=?, adresse=?, facebook=?, instagram=?, email=?, numeroTel=? WHERE CodeClient=?");
	$req->execute(array($n, $p, $ad, $fb, $insta, $m, $tel, $cc));

	return $req;
}

function editCommande($d, $e, $p, $pt, $nc, $de, $da, $dp, $fl, $fs, $promo, $c, $n){
	$db = dbConnect();
	$req = $db->prepare("UPDATE commande SET dateCommande=?, etatCommande=?, nbPoints=?, prixTotal=?, numColis=?, dateExpedition=?, dateArrivee=?, datePaiement=?, fraisLivraison=?, fraisService=?, promotion=?, codeClient=? WHERE noCommande=?");
	$req->execute(array($d, $e, $p, $pt, $nc, $de, $da, $dp, $fl, $fs, $promo, $c, $n));

	return $req;
}

function getCommandes(){
	$db = dbConnect();
    $req = $db->prepare('SELECT * FROM commande');
    $req->execute(array());

	return $req;
}

function deleteCommande($commande_id){
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM produit_commande WHERE noCommande=?');
    $req->execute(array($commande_id));
    $req2 = $db->prepare('DELETE FROM commande WHERE noCommande=?');
    $req2->execute(array($commande_id));
}

function verifFacture_ID($commande_id){
	$db = dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nb FROM facture WHERE noCommande = ?');
	$req->execute(array($commande_id));

	$res = $req->fetch();
	if($res['nb'] == 1){
		return true;
	}
	else
		return false;
}

function setFacture($ci, $current_date){
	$db = dbConnect();
	$req = $db->prepare("INSERT INTO facture (noFacture, dateFacture, noCommande) VALUES (?, ?, ?)");
	$req->execute(array($ci, $current_date, $ci));

	return $req;
}

function getFacture($commande_id){
	$db = dbConnect();
    $req = $db->prepare('SELECT * FROM facture WHERE noCommande = ?');
	$req->execute(array($commande_id));
	
	$facture = $req->fetch();

	return $facture;
}

function getClientInfo_invoice($commande_id){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM client WHERE CodeClient = (SELECT codeClient FROM commande WHERE noCommande = ?)');
	$req->execute(array($commande_id));

	$clientinfo = $req->fetch();

	return $clientinfo;
}

function getMemberShip($id_membership){
	$db = dbConnect();
    $req = $db->prepare('SELECT nom FROM membership WHERE id = ?');
	$req->execute(array($id_membership));
	
	$membership = $req->fetch();

	return $membership;
}

function setCadeau($nc, $n, $p, $m, $s){
	$db = dbConnect();
	$req = $db->prepare("INSERT INTO Cadeau (noCadeau, nomCadeau, prixFidelite, niveauMembership, stock) VALUES (?, ?, ?, ?, ?)");
	$req->execute(array($nc, $n, $p, $m, $s));

	return $req;
}