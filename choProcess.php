<?php
	require_once 'ChoService.class.php';
	
	$choService=new choService();
	
	if (!empty($_REQUEST['flag'])) {
		$flag=$_REQUEST['flag'];
		
		if ($flag=='update') {
			$idChorsite=$_POST['idChorsite'];
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$voix=$_POST['voix'];
			$ville=$_POST['ville'];
			$telephone=$_POST['telephone'];
			$login=$_POST['utilisateur_login'];	
			$inscription_type=$_REQUEST['inscription_type'];
			$motdepasse=$_POST['motdepasse'];	
			
			$row=$choService->findLoginById($idChorsite);		
			$res=$choService->updateChoriste($idChorsite, $nom, $prenom, $voix, $ville, $telephone, $motdepasse, $inscription_type);
			
			$utilisateur_login=$row[0][utilisateur_login];
			$len=strlen($motdepasse);
			echo $len;
			if($len!=32){
				$motdepasse=md5($motdepasse);
			}

  			
			$res2=$choService->updateUtilisateur($login,$motdepasse,$utilisateur_login);
      		
			if($res)
				header("Location:success.php");
			else 
				header("Location:failOfUpdate.php"); 
			/*ajout un program de juge is it success*/
					
		}
		else if ($flag=='del') {
			$login=$_REQUEST['login'];
			echo $login;
			$res=$choService->deleteByLogin($login);
			if($res)
				header("Location:success.php");
			else 
				header ("Location:informerTechnicien");
			
		}
	}
?>
