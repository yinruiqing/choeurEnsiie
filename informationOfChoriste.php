<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/infoChoriste2.css">
</head>
<body>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<h1>Modification des informations</h1>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<?php 
require_once 'ChoService.class.php';
$login=$_GET['login'];

//obtenir les autre information par le id

$choService=new ChoService();
$ins=$choService->findChoristeByLogin($login);

?>
<div id="form">
<form action="choProcess.php" method="post">
<table>
<tr><td>IDChoriste</td><td><input readonly="readonly" type="text" name="idChorsite" value="<?php echo $ins[0]['idchoriste']?>"/></td></tr>
<tr><td>Nom</td><td><input  type="text" name="nom" value="<?php echo $ins[0]['nom']?>"/></td></tr>
<tr><td>Prenom</td><td><input  type="text" name="prenom" value="<?php echo $ins[0]['prenom']?>"/></td></tr>
<tr><td>voix</td><td><input  type="text" name="voix" value="<?php echo $ins[0]['voix']?>"/></td></tr>
<tr><td>ville</td><td><input  type="text" name="ville" value="<?php echo $ins[0]['ville']?>"/></td></tr>
<tr><td>telephone</td><td><input  type="text" name="telephone" value="<?php echo $ins[0]['telephone']?>"/></td></tr>
<tr><td>Login</td><td><input  type="text" name="utilisateur_login" value="<?php echo $ins[0]['utilisateur_login']?>"/></td></tr>
<tr><td>motdepasse</td><td><input  type="password" name="motdepasse" value="<?php echo $ins[0]['motdepasse']?>"/></td></tr>
<tr><td>type d'inscription</td><td><input readonly="readonly" type="text" name="inscription_type" value="<?php echo $ins[0]['inscription_type']?>"/></td></tr>

<input type="hidden" name="flag" value="update" />
<tr>
<td><input type="submit" value="modifier" /></td>
<td><input type="reset"  value="supprimer" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>
