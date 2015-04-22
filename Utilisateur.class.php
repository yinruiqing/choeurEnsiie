<?php
class Utilisateur{
	private $id;
	private $password;
	/**
	 * @return unknown
	 */
	public function getId() {
		return $this->id;
	}

	
	/**
	 * @return unknown
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param unknown_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}


	/**
	 * @param unknown_type $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}


}
?>