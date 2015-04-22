<?php
   	require_once 'UtilisateurService.class.php';
   	
	$login=$_POST['login'];
	$motdepasse=$_POST['motdepasse'];
	
	//on va aller les different mainpage par le different titre
	$utilisateurService=new UtilisateurService();
	$result=$utilisateurService->chekcUtilisateur($login,$motdepasse);
	$titre=$utilisateurService->findTitre ($login);
	var_dump($titre);
	if($result){
		//on utiliste le session pour interdire quelq'un aller un site directment 
		session_start();
		$_SESSION['loginuser']=$login;
		$titre=$utilisateurService->findTitre ($login);
		switch ($titre){
		case 1:
		header("Location: presidentMain.php?login=$login");
		exit();
		break;
		case 2:
		header("Location: tresorierMain.php?login=$login");
		exit();
		break;
		case 3:
		header("Location: secretaireMain.php?login=$login");
		exit();
		break;
		case 4:
		header("Location: choeurMain.php?login=$login");
		exit();
		break;
		case 5:
		header("Location: choristeMain.php?login=$login");
		exit();
		break;
		default:
		echo "error dans database";
		header("Location:login.php?");
		exit();
		}		
	}
	else header("Location:login.php?errno=1");
?>