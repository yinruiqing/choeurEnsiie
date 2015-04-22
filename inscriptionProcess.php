<?php
	require_once 'InscriptionService.class.php';
	
	$inscriptionService=new InscriptionService();
	
	if (!empty($_REQUEST['flag'])) {
		$flag=$_REQUEST['flag'];
		//ajouter les information dans le inscriptionTemp
		if ($flag=='inscription') {
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$login=$_POST['login'];
			$motdepasse=$_POST['motdepasse'];
			$i=($nom=='' or $prenom=='' or $login=='' or $motdepasse=='');
			if($i){
				header("Location:failOfInscription.php");
			}else{						
			$res=$inscriptionService->addInscriptionTemp($nom,$prenom,$login,$motdepasse);
			if($res){
				header("Location:success.php");
			}
			else {
				header("Location:failOfInscription.php?$res");
			}
			}
			/*ajout un program de juge is it success*/
					
		}
		//delete le inscription
		else if ($flag=='del') {
			$id=$_REQUEST['id'];
			$res=$inscriptionService->deleteById($id);
			if ($res==1) {
				header("Location:success.php");
			}
			else{
				header("Location:failOfDelete.php");
			}
		}
		//donne un inscription_type par le tresorie
		else if ($flag=='update') {
			$id=$_REQUEST['id'];
			$nom=$_REQUEST['nom'];
			$prenom=$_REQUEST['prenom'];
			$login=$_REQUEST['login'];
			$inscription_type=$_REQUEST['inscription_type'];
			$res=$inscriptionService->updateInscriptionTemp($id,$nom,$prenom,$login,$inscription_type);
			if ($res==1) {
				header("Location:success.php");
			}
			else{
				header("Location:failOfUpdate.php");
				
			} 
				
		}
		//valid le inscription par le president
		else if ($flag=='addChoriste'){
			$nom=$_REQUEST['nom'];
			$prenom=$_REQUEST['prenom'];
			$utilisateur_login=$_REQUEST['login'];
			$motdepasse=$_REQUEST['motdepasse'];
			$inscription_type=$_REQUEST['inscription_type'];
			$titre=$_REQUEST['titre'];
			if($titre<1 || $titre>5){
				   header("Location:failOfAddChoriste.php");
			}
			else {
			     $res=$inscriptionService->addInChoriste( $nom, $prenom, $utilisateur_login, $motdepasse, $inscription_type, $titre);
			     if ($res==3) {
				header("Location:success.php");
				} else {
				  header("Location:failOfAddChoriste.php");
				  }
			     }
		}
		//valid l'inscription par le secretaire
		else if ($flag=='oui') {
			$id=$_REQUEST['id'];
			$res=$inscriptionService->isChoriste($id);
			if ($res) {
				header("success.php");
			}else {
				echo "fail informez le technicien !";
			}
		}
		//verifier si utilise le meme avec les autre
		else if ($flag=='verifier') {
			$login=$_REQUEST['login'];
			$res=$inscriptionService->findSameLogin($login);
			if ($res) {
				header('#');
			}
			else header('#');
		}
	}
?>