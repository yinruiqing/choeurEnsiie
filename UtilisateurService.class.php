<?php
	require_once 'SqlHelper.class.php';
	class UtilisateurService{

		//le method de juge le utilisateur
		public function  chekcUtilisateur($login,$motdepasse){
			
			$sql="select motdepasse from utilisateur where login='$login'";
			//create an objet de sqlHelper
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql($sql);
			$row=pg_fetch_assoc($res);
			var_dump($row);
			echo md5($motdepasse);
			echo $row["motdepasse"];
				if($row){
				//compare the motdepasse
				if(md5($motdepasse)==$row["motdepasse"]){
				echo "bb";
					return true;
				}
			}
			//free the result
			pg_free_result($res);
			//close the connect
			$sqlHelper->close_connect();
			return false;
		} 
		public function findTitre ($login){
			$sql="select titre from responsabilite where utilisateur_login ='$login'";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql($sql);
			$row = pg_fetch_assoc($res);
			return $row["titre"];
		}
	}
?>