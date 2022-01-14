<?php 

	//primeiro parâmetro do PDO é o dsn - data service name
	//segundo é o usuário
	//terceiro é a senha


	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
	$usuario = 'root';
	$senha = '';

	

	try {
		$conexao = new PDO($dsn, $usuario, $senha);
		
		$query = '
			SELECT * FROM tb_usuarios
		';

		$stmt = $conexao->query($query);
		/*
		echo '<pre>';
		print_r($stmt);
		echo '</pre>';
		*/
		$lista = $stmt->fetchAll();
		echo '<pre>';
		print_r($lista);
		echo '</pre>';

		echo $lista[2]['email'];

	} catch(PDOException $e) {
		//recuperar CODE e MESSAGE
		//CODE
		echo 'Erro: '.$e->getCode().' Mensagem:'.$e->getMessage();
		//final public string Exception::getMessage
	}


?>