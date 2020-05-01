<?php 
	/*
	*
	*
	*/
	class Noticia{
		private $id;
		private $title;
		private $body;
		private $datetime;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getBody(){
			return $this->body;
		}

		public function setBody($body){
			$this->body = $body;
		}

		public function getDatetime(){
			return $this->datetime;
		}

		public function setDatetime($datetime){
			$this->datetime = $datetime;
		}
	}
?>