<?php
	function getLastTime(){
		
		
		if(!empty($_COOKIE['lastVisit'])){
			echo "le derinier fois login".$_COOKIE['lastVisit'];
			setcookie("lastVisit",date("Y-m-d  H:i:s"),time()+24*3600*30);
		}else{
			
			echo "c'est le premier vous login";

			setcookie("lastVisit",date("Y-m-d  H:i:s"),time()+24*3600*30);
		}
	}
	
	function getCookieVal($key){
		
		if(empty($_COOKIE[$key])){
			return "";
		}else{
			return $_COOKIE[$key];
		}
		
	}
	
	//test si le user is valid
	function checkUserValidate(){
		session_start();
		if(empty($_SESSION['loginuser'])){
			header("Location: login.php?errno=1");
		}
	}
	
?>