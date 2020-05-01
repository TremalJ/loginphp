<?php 
	/*
	*
	*
	*/
	class Usuario{
		private $email;
		private $name;
		private $password;
		private $account_id;

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getAccountId(){
			return $this->account_id;
		}

		public function setAccountId($account_id){
			$this->account_id = $account_id;
		}
	}
?>