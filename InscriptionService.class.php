<?php
	require_once 'SqlHelper.class.php';
	require_once 'Inscription.class.php';
	class InscriptionService{
		//trouve les information de  inscription personne par id 
		function findInscriptionById($id){
			$sql="select * from inscriptiontemp where id=$id";
			$sqlHelper=new SqlHelper();
			$arr=$sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();;
			
			return $arr;
		}
		//ajouter le inscription information dans le table de inscriptionTemp
		function addInscriptionTemp($nom,$prenom,$login,$motdepasse){
			
			$sql="INSERT INTO inscriptionTemp(nom,prenom,utilisateur_login,motdepasse ) VALUES('$nom','$prenom','$login',md5('$motdepasse'))";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			return $res;
		}
		//update les information (en fait seulemnet pour le tresorie de ajouter un type pour les inscription )
		function updateInscriptionTemp($id,$nom,$prenom,$login,$inscription_type){
			$sql="update inscriptionTemp set nom='$nom' , prenom='$prenom' ,utilisateur_login='$login',inscription_type='$inscription_type' where id=$id";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		
		//ajouter le inscription dans le table de choriste , utilisateur,responsablite 
		//et  supprimer dans le table de inscriptionTemp
		function addInChoriste ($nom,$prenom,$utilisateur_login,$motdepasse,$inscription_type,$titre){
			$sql="INSERT INTO utilisateur(login, motdepasse) VALUES('$utilisateur_login','$motdepasse')";
			$sqlHelper=new SqlHelper();
			$res1=$sqlHelper->execute_dml($sql);
			$sql="INSERT INTO choriste(nom, prenom, utilisateur_login,inscription_type) VALUES ('$nom', '$prenom', '$utilisateur_login','$inscription_type')";
			$res2=$sqlHelper->execute_dml($sql);
			$sql="INSERT INTO responsabilite(titre, utilisateur_login) VALUES($titre,'$utilisateur_login')";
			$res3=$sqlHelper->execute_dml($sql);
			$sql="delete from inscriptiontemp where utilisateur_login='$utilisateur_login' ";
			$res4=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res1+$res2+$res3;		
		}
		//delete le inscription (seulement le tresorie et le president ont les droits )
		function deleteById($id){
			$sql="delete from inscriptiontemp where id=$id";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			return $res;
		}
		
		//pour split les record into pages
		function getFenyePageForTresorier($fenyePage){
			$sql1="select id,nom,prenom,utilisateur_login from inscriptionTemp where inscription_type is null limit "
					.$fenyePage->pageSize." offset ".($fenyePage->pageNow-1)*$fenyePage->pageSize;
		
			$sql2="select count(id) from inscriptionTemp where inscription_type is null";
			$sqlHelper=new SqlHelper();
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			$sqlHelper->close_connect();
		}
		
		function getFenyePageForSecretaire($fenyePage){
			$sql1="select id,nom,prenom,utilisateur_login from inscriptionTemp where ischoriste is null limit "
					.$fenyePage->pageSize." offset ".($fenyePage->pageNow-1)*$fenyePage->pageSize;
		
			$sql2="select count(id) from inscriptionTemp where ischoriste is null";
			$sqlHelper=new SqlHelper();
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			$sqlHelper->close_connect();
		}
		function getFenyePageForPresident($fenyePage){
		
			$sql1="select id,nom,prenom,utilisateur_login,inscription_type from inscriptionTemp where inscription_type is not null limit "
					.$fenyePage->pageSize." offset ".($fenyePage->pageNow-1)*$fenyePage->pageSize;
		
			$sql2="select count(id) from inscriptionTemp where inscription_type is not null";
			$sqlHelper=new SqlHelper();
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			$sqlHelper->close_connect();
		}
		function isChoriste($id){
			$sql="update inscriptionTemp set isChoriste='o' where id=$id";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
			
		}
		//juge si le login a deja utilise par les autre
		function findSameLogin($login){
			$sql="select count(*) from choriste where login='$login'";
			$sqlHelper=new SqlHelper();
			$res1=$sqlHelper->execute_dql2($sql);
			$sql="select count(*) from utilisateurTemp where login='$login'";
			$res2=$sqlHelper->execute_dql2($sql);
			$res=count($res1)+count($res2);
			return $res;
		}
	}
?>