<?php

	require_once 'SqlHelper.class.php';

	class ChoService{
		
		
		function getFenyePage($fenyePage){

			$sql1="select * from choriste order by idchoriste limit "
			.$fenyePage->pageSize." offset ".($fenyePage->pageNow-1)*$fenyePage->pageSize;

			$sql2="select count(idchoriste) from choriste";

			
			$sqlHelper=new SqlHelper();
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			$sqlHelper->close_connect();
		}
		function getFenyePageForPublic($fenyePage){
			
			
			$sql1="select idchoriste,nom,prenom,voix,ville,inscription_type from choriste  limit "
					.$fenyePage->pageSize." offset ".($fenyePage->pageNow-1)*$fenyePage->pageSize;
		
			$sql2="select count(idchoriste) from choriste";
		
			
			$sqlHelper=new SqlHelper();
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			$sqlHelper->close_connect();
		}

		function getFenyePageForPublic2($fenyePage){
				
			$sql1="select * from responsabilite order by titre  limit "
					.$fenyePage->pageSize." offset ".($fenyePage->pageNow-1)*$fenyePage->pageSize;
		
			$sql2="select count(*) from responsabilite";
		
				
			$sqlHelper=new SqlHelper();
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			$sqlHelper->close_connect();
		}
		function updateChoriste($idChoriste,$nom,$prenom,$voix,$ville,$telephone,$motdepasse,$inscription_type){
			$sql="update choriste set nom='$nom' , prenom='$prenom' ,voix='$voix',ville='$ville',telephone='$telephone',inscription_type='$inscription_type' where idChoriste=$idChoriste";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		function findLoginById($idChoriste){
			 $sql="select utilisateur_login from choriste where idChoriste=$idChoriste";
			 $sqlHelper=new SqlHelper();
			 $res=$sqlHelper->execute_dql2($sql);
			 return $res;
		}
		function updateUtilisateur($login,$motdepasse,$utilisateur_login){
			 $sql="update utilisateur set login='$login',motdepasse='$motdepasse' where login='$utilisateur_login'";
			 $sqlHelper=new SqlHelper();
			 $res=$sqlHelper->execute_dml($sql);
			 $sqlHelper->close_connect();
			 return $res;
		}
		function deleteById($idChoriste){
			$sql="delete from choriste where idChoriste=$idChoriste";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			return $res;
			
		}
		function deleteByLogin($login){
			 $sql="delete from choriste where utilisateur_login='$login'";
			 $sqlHelper=new SqlHelper();
			 $res=$sqlHelper->execute_dml($sql);
			 $sql="delete from utilisateur where login='$login'";
			 $res=$sqlHelper->execute_dml($sql);
			 return $res;
		}
		function findChoristeByLogin($login){
			$sql="select * from choriste join utilisateur on utilisateur_login=login  where utilisateur_login='$login'";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql2($sql);
			return $res;
		}
		function findEvenementByLogin($idChoriste){
			
			$sql="select evenement_idEvenement from participe where chroiste_idchoriste=$idchoriste";
			
		}
		function findPosteByTitre($titre){
			switch ($titre){
				case 1:
					$res="President ";
					break;
				case 2:
					$res="Tresorier";
					break;
				case 3:
					$res="Secretaire ";
					break;
				case 4:
					$res="Chef de choeur";
					break;
				case 5:
					$res="Choriste";
					break;
				default:
					$res= "error dans database informez le technicien";
				}
			return $res;
		}
		
			function calculTauxPresenceById ($choriste_idchoriste){
			$sql="select * from participe join evenement on evenement_idevenement=idevenement where choriste_idchoriste =$choriste_idchoriste AND  type_ev='repetition'";
			$sqlHelper=new SqlHelper();
			$res1=$sqlHelper->execute_dql2($sql);
			$noPresence=count($res1);
			$sql="select * from evenement where type_ev='repetition'";
			$res2=$sqlHelper->execute_dql2($sql);		
			$noAbsent=count($res2)- $noPresence;
			$taux=$noPresence/$noAbsent;
			return $taux;
			
		}
		
		
	}
?>