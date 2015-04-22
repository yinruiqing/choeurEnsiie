<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel= "stylesheet" type="text/css" href= "./css/main.css">
</head>
<?php 
require_once 'common.php';
checkUserValidate();
?>
<body>
<div class="title_logo">
		<image src="./images/Top1.jpg">
</div>
<h1>Le main page de president</h1>

<ul>
			<li><a href= "informationOfChoriste.php?login=<?php echo $_REQUEST['login']?>">modifier vos informations</a></li>
			<li><a href= "readInformationOfChoriste.php?login=<?php echo $_REQUEST['login']?>">voir vos informations </a></li>
			<li><a href= "choList.php">gerer les choristes </a></li>
			<li><a href= "validInscription.php">valider les inscriptions</a></li>
			<li><a href= "index.html">sortir</a></li>
</ul>
</body>
</html>