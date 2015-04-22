<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/main.css">
</head>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<h1>Le main page de secretaire</h1>
<ul>
<li><a href='informationOfChoriste.php?login=<?php echo $_REQUEST['login']?>'>Modifier vos informations</a></li>
<li><a href='readInformationOfChoriste.php?login=<?php echo $_REQUEST['login']?>'>Voir vos informations</a></li>
<li><a href='gererInscriptionSecretaire.php?login=<?php echo $_REQUEST['login']?>'>Gerer Inscription</a></li>
<li><a href='#'>Les evenements auxquels le choriste participe</a></li>
<li><a href='index.html'>Sortir</a></li>
</ul>
</html>