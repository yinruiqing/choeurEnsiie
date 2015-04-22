<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>la liste de choriste</title>
</head>
<?php 
	require_once 'ChoService.class.php';
	require_once 'FenyePage.class.php';
	
	$fenyePage=new FenyePage();
	
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=3;
	$fenyePage->gotoUrl="choristeListeForPublic.php";
	
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	
	$choService=new ChoService();
	
	//on va utiliser la fonction getFenyePageForPublic pour afficher les listes sur plusieurs pages
	$choService->getFenyePageForPublic($fenyePage);
	

	echo "<table width='900px' border='1' bordercolor='green'cellspacing='0px'>";
	echo "<tr><th>nom</th><th>prenom</th><th>voix</th><th>ville</th><th>type d'inscription</th></tr>";
	
	for($i=0;$i<count($fenyePage->res_array);$i++){
		$row=$fenyePage->res_array[$i];
		echo "<tr><td>{$row['nom']}</td><td>{$row['prenom']}</td><td>{$row['voix']}</td><td>{$row['ville']}</td><td>{$row['inscription_type']}</td></tr>";
	}
	echo "<h1>les informations sur les choristes</h1>";
	echo "</table>";
	echo $fenyePage->navigate;
?>
	<form action="choristeListeForPublic.php">
	aller:<input type="text" name="pageNow" />
	<input type="submit" value="GO">
	</form>

</html>
