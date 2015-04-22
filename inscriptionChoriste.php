<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/main.css">
</head>
<body>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<h1>INSCRIPTION</h1>
<div id="form">
<form action="inscriptionProcess.php" method="post">
<table>
	<tr><td>Nom</td><td><input type="text" name="nom"/></td></tr>
	<tr><td>Prenom</td><td><input type="text" name="prenom"/></td></tr>
	<tr><td>Login</td><td><input type="text" name="login"/></td></tr>
	<tr><td>Mot de passe</td><td><input type="password" name="motdepasse"/></td></tr>
	<input type="hidden" name="flag" value="inscription" />
	<tr>
	<td><input type="submit" value="OK" /></td>
	<td><input type="reset"  value="Supprimer" /></td>
	</tr>
</table>
</form>
</div>
</body>
</html>