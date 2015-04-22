<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>la liste des inscriptions</title>
<script type="text/javascript">
<!--
	function confirmDel(val){
		return window.confirm("if you want to delete the whose id is  "+val);
	}
//-->
</script>
<link rel= "stylesheet" type="text/css" href= "./css/cholist.css">
</head>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<body bgcolor="white">
<?php 
	require_once 'InscriptionService.class.php';
	require_once 'FenyePage.class.php';
	
	$fenyePage=new FenyePage();
	
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=3;
	$fenyePage->gotoUrl="gererInscriptionSecretaire.php";
	
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	//create un case
	$inscriptionService=new InscriptionService() ;
	
	//split les records into quelque pages
	$inscriptionService->getFenyePageForSecretaire($fenyePage);
	

	echo "<table width='900px' border='1' bordercolor='green'cellspacing='0px'>";
	echo "<tr><th>Id</th><th>Nom</th><th>Prenom</th><th>Utilisateur_login</th><th>Valider</th><th>Supprimer</th></tr>";
	
	for($i=0;$i<count($fenyePage->res_array);$i++){
		$row=$fenyePage->res_array[$i];
		echo "<tr><td>{$row['id']}</td><td>{$row['nom']}</td><td>{$row['prenom']}</td><td>{$row['utilisateur_login']}</td>".
		"<td><a href='inscriptionProcess.php?id={$row['id']}&flag=oui'>Valid</a></td><td><a onclick='return confirmDel({$row['id']})' href='inscriptionProcess.php?id={$row['id']}&flag=del'>supprimer</a></td></tr>";
	}
	echo "<h1>information d'inscription</h1>";
	echo "</table>";
	echo $fenyePage->navigate;
?>
	<form action="gererInscriptionSecretaire.php">
	aller:<input type="text" name="pageNow" />
	<input type="submit" value="GO">
	</form>
</body>
</html>
