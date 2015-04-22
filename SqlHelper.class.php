<?php

	//operations of database
	
	class SqlHelper {

		public $conn;
		public $dbname="projetwebyin";
		public $username="ruiqing.yin";
		public $password="yin19911024";
		public $host="pgsql";

		public function __construct(){

			$this->conn=pg_connect(" host=$this->host dbname=$this->dbname user=$this->username password=$this->password");
			if(!$this->conn){
				die("echec de connect".pg_result_error());
			}
		}


		//execute the command de sql
		public function execute_dql($sql){

			$res=pg_query($this->conn,$sql) or die(pg_result_error());
			return $res;

		}

		//execute the command de sql mais return un array
		public function execute_dql2($sql){

			$arr=array();
			$res=pg_query($this->conn,$sql) or die(pg_result_error());

			while($row=pg_fetch_assoc($res)){
				$arr[]=$row;
			}
			//close the result
			pg_free_result($res);
			return $arr;

		}

		//$sql1="select * from where limit 0,6";
		//$sql2="select count(id) from 
		public function exectue_dql_fenye($sql1,$sql2,$fenyePage){

			
			$res=pg_query($this->conn,$sql1) or die(pg_result_error());
			
			$arr=array();
			
			while($row=pg_fetch_assoc($res)){
				$arr[]=$row;
			}

			pg_free_result($res);

			$res2=pg_query($this->conn,$sql2) or die(pg_result_error());

			if($row=pg_fetch_row($res2)){
				$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
				$fenyePage->rowCount=$row[0];
			}

			pg_free_result($res2);

			
			$navigate="";
			if ($fenyePage->pageNow>1){
				$prePage=$fenyePage->pageNow-1;
				$navigate="<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>prepage</a>&nbsp;";
			}
			if($fenyePage->pageNow < $fenyePage->pageCount){
				$nextPage=$fenyePage->pageNow+1;
				$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>nextpage</a>&nbsp;";
			}
			
			$navigate.="present page{$fenyePage->pageNow}/sum is {$fenyePage->pageCount}";
			
			
			$fenyePage->res_array=$arr;
			$fenyePage->navigate=$navigate;


		}

		
		public  function execute_dml($sql){

			$b=pg_query($this->conn,$sql);
			if(!$b){
				return 0;
			}else{
				if(pg_affected_rows($b)>0){
					return 1;
				}else{
					return 2;
				}
			}

		}

		//close the connect
		public function close_connect(){

			if(!empty($this->conn)){
				pg_close($this->conn);
			}
		}
	}
?>