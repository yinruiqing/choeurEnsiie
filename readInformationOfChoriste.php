
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/main.css">
</head>
<body>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<h1>INFORMATIONS</h1>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<?php 
require_once 'ChoService.class.php';
$login=$_REQUEST['login'];

$choService=new ChoService();
$ins=$choService->findChoristeByLogin($login);
$tauxPresence=$choService->calculTauxPresenceById($ins[0]['idchoriste']);
?>
<div id="form">
<table>
<tr><td>IDChoriste</td><td><?php echo $ins[0]['idchoriste']?></td></tr>
<tr><td>Nom</td><td><?php echo $ins[0]['nom']?></td></tr>
<tr><td>Prenom</td><td><?php echo $ins[0]['prenom']?></td></tr>
<tr><td>voix</td><td><?php echo $ins[0]['voix']?></td></tr>
<tr><td>ville</td><td><?php echo $ins[0]['ville']?></td></tr>
<tr><td>telephone</td><td><?php echo $ins[0]['telephone']?></td></tr>
<tr><td>Login</td><td><?php echo $ins[0]['utilisateur_login']?></td></tr>
<tr><td>motdepasse</td><td>*******</td></tr>
<tr><td>type d'inscription</td><td><?php echo $ins[0]['inscription_type']?></td></tr>
<tr><td>TauxPresence</td><td><?php echo $tauxPresence?></td></tr>
<tr>
</tr>
</table>
</div>
</body>
</html>
