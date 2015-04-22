<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/cholist.css">
<title>la liste de choriste</title>
<script type="text/javascript">
<!--
	function confirmDel(val){
		return window.confirm("if you want to delete the choriste whose id is  "+val);
	}
//-->
</script>
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
	require_once 'ChoService.class.php';
	require_once 'FenyePage.class.php';
	
	$fenyePage=new FenyePage();
	
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=3;
	$fenyePage->gotoUrl="choList.php";
	
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	
	$choService=new ChoService();
	
	
	$choService->getFenyePage($fenyePage);
	

	echo "<table width='900px' border='1' bordercolor='green'cellspacing='0px' >";
	echo "<tr><th>Id</th><th>Nom</th><th>Prenom</th><th>Voix</th><th>Ville</th><th>Telephone</th><th>Utilisateur_login</th><th>Inscription type</th><th>Supprimer</th></tr>";
	
	for($i=0;$i<count($fenyePage->res_array);$i++){
		$row=$fenyePage->res_array[$i];
		echo "<tr><td>{$row['idchoriste']}</td><td>{$row['nom']}</td><td>{$row['prenom']}</td><td>{$row['voix']}</td><td>{$row['ville']}</td><td>{$row['telephone']}</td><td>{$row['utilisateur_login']}</td><td>{$row['inscription_type']}</td>".
		"<td><a onclick='return confirmDel({$row['idchoriste']})' href='choProcess.php?login={$row['utilisateur_login']}&flag=del'>supprimer</a></td></tr>";
	}
	echo "<h1>La liste des choristes</h1>";
	echo "</table>";
	echo $fenyePage->navigate;
?>
	<form action="choList.php">
	aller:<input type="text" name="pageNow" />
	<input type="submit" value="GO">
	</form>
</body>
</html>
