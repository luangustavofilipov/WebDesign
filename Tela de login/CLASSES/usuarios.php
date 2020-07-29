<?php

	class Usuario
	{
		private $pdo;
		public $msgERRO;

		public function conectar($nome, $host, $Usuario, $senha)
		{
			global $pdo;
			try {

			$pdo = new pdo("mysql: dbname=" .$nome. "$host=" .$host, $usuario, $senha);
				
			} catch (pdoException $e) {
				$msgERRO = $e -> getMessage();
			}
		}

		public function cadastrar($nome, $telefone, $email, $senha)
		{
			global $pdo;
			//Verificar se já tem cadastro
			$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");

			$sql->bindValue(":e", $email);
			$sql->execute();
			if ($sql->rowcount() > 0)
			{
				return false;
			}
			else 
			{

			//caso não , Cadastrar
				$sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n; :t; :e; :s)")
				$sql->bindValue(":n", $nome);
				$sql->bindValue(":t", $telefone);
				$sql->bindValue(":e", $email);
				$sql->bindValue(":s", md5($senha));
				$sql->execute();
				return true;
			}

		}

		public function logar($email, $senha)
		{
			global $pdo;
			$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
			$sql->bindValue(":e", $email);
			$sql->bindValue(":s", md5($senha));
			$sql->execute();
			if($sql->rowcount() > 0)
			{
				$dado = $sql->fetch();
				session_start();
				$_SESSION['id_usuario'] = $dado['id_usuario'];
				return true;

			}
			else
			{
				return false;
			}
		}
	}









?>