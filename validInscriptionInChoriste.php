<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/validInscriptionInchoriste.css">
</head>
<body>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<h1>Update</h1>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<?php 
require_once 'InscriptionService.class.php';
$id=$_GET['id'];

//on va indiquer les autre informations par id
//on connect le base donne par sqlHelper
//on va aussi utiliser le variable hidden(cache) pour informer le inscriptionProcess on va ajouter un choriste
$inscriptionService=new InscriptionService();

$ins=$inscriptionService->findInscriptionById($id);
?>
<div id="form">
<form action="inscriptionProcess.php" method="post">
<table>
<tr><td>ID</td><td><input readonly="readonly" type="text" name="id" value="<?php echo $ins[0]['id']?>"/></td></tr>
<tr><td>Nom</td><td><input readonly="readonly" type="text" name="nom" value="<?php echo $ins[0]['nom']?>"/></td></tr>
<tr><td>Prenom</td><td><input readonly="readonly" type="text" name="prenom" value="<?php echo $ins[0]['prenom']?>"/></td></tr>
<tr><td>Login</td><td><input readonly="readonly" type="text" name="login" value="<?php echo $ins[0]['utilisateur_login']?>"/></td></tr>
<tr><td>type d'inscription</td><td><input  type="text" readonly="readonly" name="inscription_type" value="<?php echo $ins[0]['inscription_type']?>"/></td></tr>
<tr><td>titre</td><td><input type="text" name="titre" value=""/></td></tr>
<input type="hidden" name="motdepasse" value="<?php echo $ins[0]['motdepasse']?>" />
<input type="hidden" name="flag" value="addChoriste" />
<tr>
<td><input type="submit" value="entrer" /></td>
<td><input type="reset"  value="supprimer" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>
