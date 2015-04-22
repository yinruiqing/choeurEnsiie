<?php
	class Inscription{
		private $id;
		private $nom;
		private $prenom;
		private $login;
		private $motdepasse;
		private $type;
		private $montant;
		private $annee;
		/**
	 * @return the $prenom
	 */
	public function getPrenom() {
		return $this->prenom;
	}

		/**
	 * @param field_type $prenom
	 */
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

		/**
	 * @return the $nom
	 */
	public function getNom() {
		return $this->nom;
	}

		/**
	 * @return the $login
	 */
	public function getLogin() {
		return $this->login;
	}

		/**
	 * @return the $motdepasse
	 */
	public function getMotdepasse() {
		return $this->motdepasse;
	}

		/**
	 * @return the $type
	 */
	public function getType() {
		return $this->type;
	}

		/**
	 * @return the $montant
	 */
	public function getMontant() {
		return $this->montant;
	}

		/**
	 * @return the $annee
	 */
	public function getAnnee() {
		return $this->annee;
	}

		/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

		/**
	 * @param field_type $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

		/**
	 * @param field_type $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

		/**
	 * @param field_type $motdepasse
	 */
	public function setMotdepasse($motdepasse) {
		$this->motdepasse = $motdepasse;
	}

		/**
	 * @param field_type $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

		/**
	 * @param field_type $montant
	 */
	public function setMontant($montant) {
		$this->montant = $montant;
	}

		/**
	 * @param field_type $annee
	 */
	public function setAnnee($annee) {
		$this->annee = $annee;
	}

	}
	

?>