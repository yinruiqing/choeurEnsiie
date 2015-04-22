<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title> concert </title>
<link rel= "stylesheet" type="text/css" href= "./css/login.css">
</head>
<body>
<h1>La page de connexion:</h1>

<div id="head">
	<div class="title_logo">
		<image src="./images/Top1.jpg">
	</div>
	<div class="navi">
		<ul>
			<li><a href= "index.html">Index</a></li>
			<li><a href= "inscriptionChoriste.php">Inscription </a></li>
			<li><a href= "#">Concerts </a></li>
			<li><a href= "#">Oeuvres</a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
</br>
<div id="form">

<form action = "loginProcess.php" method= "post">
<table>

<h2>AUTHENTICATION</h2>
<tr><td>Login</td><td><input type = "text" name="login"/></td></tr>
<tr><td>Mot de passe</td><td><input type="password" name = "motdepasse"/></td></tr>
<tr>
<td><input type="submit" value="Se connecter"/></td>
<td><input type="reset" value="Supprimer"/></td>
</tr>
</table>
<?php 

	//receieve le errno et judge le cause de ce error 
	if(!empty($_GET['errno'])){
		$errno=$_GET['errno'];
		if($errno==1){
			echo "<br/><font color='red' size='3'>Your id or password is wrong</font>";
		}
	}
?>
</form>
</div>

</html>

</body>
</html>