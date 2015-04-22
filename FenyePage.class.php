<?php
	
	//c'est une class pour split pages
	class FenyePage{
		public $pageSize; 
		public $res_array;   //le resutat (split par des pages)
		public $rowCount;    //le sum des records
		public $pageNow;     //combine records dans une page
		public $pageCount;   //le sum de pages
		public $navigate;    //??
		public $gotoUrl;     //information de records
	}

?>