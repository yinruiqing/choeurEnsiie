<!DOCTYPE html>

<html>

<head>
	<meta charset= "utf-8">
	<meta name= "keyword" content= "ensiie concert agora">
	
	<title> concert </title>
	
	<link rel= "stylesheet" type="text/css" href= "./css/infoChoriste.css">
</head>

<body>
<div id="head">
	<div class="title_logo">
		<image src="./images/Top1.jpg">
	</div>
	<div class="navi">
		<ul>
			<li><a href= "index.html">Index</a></li>
			<li><a href= "inscriptionChoriste.php">Inscription </a></li>
			<li><a href= "login.php">Login </a></li>
			<li><a href= "#">Concerts </a></li>
			<li><a href= "#">Oeuvres </a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>

<div id="wrapper">
<?php 
require_once 'ChoService.class.php';
	require_once 'FenyePage.class.php';
	
	$fenyePage=new FenyePage();
	
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=3;
	$fenyePage->gotoUrl="infoChoriste.php";
	
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	
	$choService=new ChoService();
	
	//on va utiliser le methode de getFenyePageForPublic pour split les pages
	$choService->getFenyePageForPublic2($fenyePage);
?>

<div class="main">
<?php

for($i=0;$i<count($fenyePage->res_array);$i++){
	$row=$fenyePage->res_array[$i];
	$poste=$choService->findPosteByTitre($row['titre']);
	echo "<div class='item'>
		<div class='item_img' alt='Unknown photo'>
			<img src= './images/person.jpg'>
		</div>
		<div class= 'item_content'>
			<h3>{$row['utilisateur_login']}</h3>
			<p class='item_info'>{$poste} </p>
			<a  href='infoForPublic.php?login={$row['utilisateur_login']}' class='item_desc'>information detail</br></a>
			<a  href='' class='item_desc'>evenement</br></a>
		</div>		
	</div>";
}
echo $fenyePage->navigate;
?>
<form action="infoChoriste.php">
	aller:<input type="text" name="pageNow" />
	<input type="submit" value="GO">
	</form>
</div>

<div class="side">
	<div class="author_info">
		<div class="author_image">
			<img src="./images/2.jpg" alt="Charlie's favourite animal">
		</div>
		<div class="author_desc">
			<h4>Ruiqinq Yin</h4>
			<p>Le president de notre entreprise </p>
		</div>
	</div>
	<div class="top_article">
		<h3>the recommend articles</h3>
		<p>
		
		</p>
	</div>
	
	<div class="site_info">
		<p>ensiie:Squaire</p>
		<p>agora:rue 1 jules valles</p>
	</div>
</div>
<div class="clear"></div>
</div>

</body>

</html>