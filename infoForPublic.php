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
require_once 'ChoService.class.php';
$login=$_REQUEST['login'];

$choService=new ChoService();
$ins=$choService->findChoristeByLogin($login);
$tauxPresence=$choService->calculTauxPresenceById($ins[0]['idchoriste']);
?>
<div id="form">
<table>
<tr><td>Nom</td><td><?php echo $ins[0]['nom']?></td></tr>
<tr><td>Prenom</td><td><?php echo $ins[0]['prenom']?></td></tr>
<tr><td>Voix</td><td><?php echo $ins[0]['voix']?></td></tr>
<tr><td>Ville</td><td><?php echo $ins[0]['ville']?></td></tr>
<tr><td>Telephone</td><td><?php echo $ins[0]['telephone']?></td></tr>
<tr><td>Type d'inscription</td><td><?php echo $ins[0]['inscription_type']?></td></tr>
<tr>
<td><a href='index.html'>Index</a></td>
</tr>
</table>
</div>
</body>
</html>
