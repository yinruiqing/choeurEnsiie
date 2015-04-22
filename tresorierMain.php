<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/main.css">
</head>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<h1>Le main page de tresorier</h1>
<ul>
<li><a href='informationOfChoriste.php?login=<?php echo $_REQUEST['login']?>'>Modifier vos informations</a></li>
<li><a href='readInformationOfChoriste.php?login=<?php echo $_REQUEST['login']?>'>Voir vos informations</a></li>
<li><a href='#'>Les evenements auquelles le choriste participe</a></li>
<li><a href='gererInscription.php'>Gerer les inscriptions</a></li>
<li><a href='#'>Indiquer les choristes inscrits</a></li>
<li><a href='index.html'>Sortir</a></li>
</ul>
</html>